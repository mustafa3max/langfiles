
const keyAdd = document.getElementById('key');
const valueAdd = document.getElementById('value');
const allTexts = document.getElementById('all-texts');
const groupName = document.getElementById('group-name');
const saveDone = document.getElementById('save-done');

if (sessionStorage.getItem('items_save')!=null) {
    groupName.value = sessionStorage.getItem('group_name');
}

groupName.addEventListener("blur", function() {
    sessionStorage.setItem('group_name', groupName.value);
},false);

keyAdd.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        if (keyAdd.value != "") {
            value.focus();
        } else {
            keyAdd.setAttribute('placeholder', 'required');
        }
    }
});

valueAdd.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        if (valueAdd.value != "") {
            window.add();
        } else {
            valueAdd.setAttribute('placeholder', 'required');
        }
    }
});

allTexts.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        if(event.target.id.includes("key")) {
            save(event.target.name, null);
        }
        else if(event.target.id.includes("value")) {
            save(null, event.target.name);
        }
    }
});

 window.add = function() {
    var items = JSON.parse(sessionStorage.getItem('items_save')) ?? {};
    if (items == null) {
        items = {};
    }
    if (keyAdd.value != "" && valueAdd.value != "") {
        keyAdd.value = syntaxKey(keyAdd.value);
        items[keyAdd.value] = valueAdd.value;
        sessionStorage.setItem('items_save', JSON.stringify(items));
        keyAdd.value = "";
        valueAdd.value = "";
        keyAdd.focus();

        Alpine.store('items').items = JSON.parse(sessionStorage.getItem('items_save'));
        Alpine.store('items').on = Object.keys(items).length > 0;
    }
}

window.save = function(oldKey, oldValue){
    var items = JSON.parse(sessionStorage.getItem('items_save'));

    let itemKey;
    let itemValue;

    for(let index = 0; index < Object.keys(items).length; index++) {

        itemKey = document.getElementById('key-'+index);
        itemValue = document.getElementById('value-'+index);

        if(Object.keys(items)[index] != itemKey.value && oldKey != null) {

            if(!items.hasOwnProperty(itemKey.value)) {

                Object.defineProperty(items, itemKey.value, Object.getOwnPropertyDescriptor(items, oldKey));

                delete items[oldKey];

                done();
                break;
            }else {
                alert('المفتاح المدخل موجود بالفعل');
                itemKey.value = oldKey;
                break;
            }
        }

        if(itemValue.value != items[itemKey.value] && oldValue != null) {
            if(Object.values(items).indexOf(itemValue.value) == -1) {

                items[Object.keys(items)[index]] = itemValue.value;

                done();
                break;
            }else {
                alert('القيمة المدخلة موجودة بالفعل');
                itemValue.value = oldValue;
                break;
            }
        }

    }

    itemKey.blur();
    itemValue.blur();

    sessionStorage.setItem('items_save', JSON.stringify(items));
    Alpine.store('items').items = JSON.parse(sessionStorage.getItem('items_save'));
}

window.remove = function(key){
    var items = JSON.parse(sessionStorage.getItem('items_save'));

    const status = confirm('هل تريد خذف هذا العنصر');
    if(status){
        delete items[key];
        sessionStorage.setItem('items_save', JSON.stringify(items));
        Alpine.store('items').items = JSON.parse(sessionStorage.getItem('items_save'));
        Alpine.store('items').on = Object.keys(items).length > 0;
    }
}

window.removeAll =  function(msg = null){

    if(msg == null){
        const status = confirm(msg==null?'هل تريد خذف جميع العناصر':msg);
        if(status){
            removeNow();
        }
    }else{
        removeNow();
    }

}

window.changeInputMeGroup = function(group) {
    groupName.value = group;
    sessionStorage.removeItem('items_save');
    Alpine.store('items').items = {};
    Alpine.store('items').on = false;
    sessionStorage.setItem('group_name', group);

    Livewire.dispatch('isOldGroup');
}

window.removeNow = () => {
    sessionStorage.removeItem('items_save');
    sessionStorage.removeItem('group_name');

    Alpine.store('items').items = {};
    Alpine.store('items').on = false;
    groupName.value = "";
}

window.done = function(){
    saveDone.classList.remove('hidden');
    saveDone.classList.add('flex');

    setTimeout(() => {
         saveDone.classList.add('hidden');
        saveDone.classList.remove('flex');
    }, 800);
}
Math.random();

//
// Syntax
//

var valueSelect = [];

keyAdd.addEventListener("focus", function() {
    Alpine.store('syntax').syntaxesLocal = [];
    Alpine.store('syntax').isSyntaxKey = true;
});

keyAdd.addEventListener("blur", function() {
    setTimeout(() => {
        Alpine.store('syntax').isSyntaxKey = false;
    }, 200);
});

keyAdd.addEventListener("keyup", function(event) {
    const data = window.filterSyntax(event.target.value, valueSelect, syntaxesLocal, JSON.parse(sessionStorage.getItem('syntaxes') ?? '[]'));
    Alpine.store('syntax').syntaxesLocal = data[0];
    event.target.value = data[1];
});

valueAdd.addEventListener("focus", function() {
    Alpine.store('syntax').syntaxesLocal = [];
    Alpine.store('syntax').isSyntaxValue = true;
});

valueAdd.addEventListener("blur", function() {
    setTimeout(() => {
        Alpine.store('syntax').isSyntaxValue = false;
    }, 200);
});

valueAdd.addEventListener("keyup", function(event) {
    const data = window.filterSyntax(event.target.value, valueSelect, syntaxesLocal, JSON.parse(sessionStorage.getItem('syntaxes') ?? '[]'));
    Alpine.store('syntax').syntaxesLocal = data[0];
    event.target.value = data[1];
});
