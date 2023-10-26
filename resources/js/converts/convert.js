
import To from './to';
window.To = To;

const type1 = document.getElementById('type-1');
const type2 = document.getElementById('type-2');
const keyAdd = document.getElementById('key');
const valueAdd = document.getElementById('value');
var data = {};

try {
    data = JSON.parse(sessionStorage.getItem('convert_data'));
    setTimeout(() => {
        formatJson();
    }, 200);
} catch (error) {
}

type1.value = JSON.stringify(data);

type1.addEventListener('keyup', ()=>{
    sessionStorage.setItem('convert_data', type1.value);
    formatJson();
});

type1.addEventListener('blur', ()=>{
     formatJson();
});

keyAdd.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    if(event.target.value != "") {
        valueAdd.focus();
    }
    else {
        event.target.setAttribute('placeholder', 'required');
    }
  }
});

valueAdd.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    if(keyAdd.value != "") {
        add();
    }else{
        keyAdd.setAttribute('placeholder', 'required');
    }
  }
});

window.convertNow = function(type = "json") {
    const to = new window.To(type1.value);

    type2.innerHTML = to.convert(type);
}

window.copyContent = async function(){
    try {
        const code = type2.innerText;
        if (navigator.clipboard) {
            await navigator.clipboard.writeText(code);
        } else {
            alert(code);
        }
    } catch (err) {
        alert(code);
    }
}

window.add = function() {
    if (data == null || typeof(data) == "string") {
        data = {};
    }
    if(keyAdd.value != "") {
        valueAdd.value = valueAdd.value.trim();
        keyAdd.value = syntaxKey(keyAdd.value);

        data[keyAdd.value] = valueAdd.value;
        type1.value = JSON.stringify(data);

        sessionStorage.setItem('convert_data', type1.value);
        convertNow();
        keyAdd.value = "";
        valueAdd.value = "";
        keyAdd.focus();
    }
}

window.delete = function() {
    sessionStorage.removeItem('convert_data');
    type1.value = "";
    type2.innerHTML = "الإخراج النهائي";
    data = {};
}

//
// Syntax
//

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
    const data = window.filterSyntaxAdd(event.target.value);
    event.target.value = data;
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
    const data = window.filterSyntaxAdd(event.target.value);
    event.target.value = data;
});

function formatJson() {
    try {
        Alpine.store('syntax').error = null;
        data = JSON.stringify(JSON.parse(sessionStorage.getItem('convert_data')), null, 4);
    } catch (e) {
        if (sessionStorage.getItem('convert_data') != "") {
            Alpine.store('syntax').error = e.message;
        }
        data = sessionStorage.getItem('convert_data');
    }
    type1.value = data;
}
//constructor
