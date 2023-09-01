
const keyAdd = document.getElementById('key');
const valueAdd = document.getElementById('value');
const allTexts = document.getElementById('all-texts');

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
        // event.target.blur();
    }
});

 window.add = function() {
    var items = JSON.parse(sessionStorage.getItem('items_save')) ?? {};
    if (items == null) {
        items = {};
    }
    if (keyAdd.value != "" && valueAdd.value != "") {
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

            }else {
                alert('المفتاح المدخل موجود بالفعل');
                itemKey.value = oldKey;
            }
        }

        if(itemValue.value != items[itemKey.value] && oldValue != null) {
            if(Object.keys(items).indexOf(itemValue.value) == -1) {

                items[Object.keys(items)[index]] = itemValue.value;

                break;
            }else {
                alert('القيمة المدخلة موجودة بالفعل');
                itemValue.value = oldValue;
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

window.removeAll = function(){

    const status = confirm('هل تريد خذف جميع العناصر');
    if(status){
        sessionStorage.removeItem('items_save');
        Alpine.store('items').items = {};
        Alpine.store('items').on = false;
    }

}
