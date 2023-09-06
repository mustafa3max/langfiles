
import To from './to';
window.To = To;

const type1 = document.getElementById('type-1');
const type2 = document.getElementById('type-2');
const keyAdd = document.getElementById('key');
const valueAdd = document.getElementById('value');
var data = {};

try {
    data = JSON.parse(sessionStorage.getItem('convert_data'));
} catch (error) {
}

type1.innerText = JSON.stringify(data);

type1.addEventListener('input', ()=>{
    sessionStorage.setItem('convert_data', type1.innerText);
    try {
        data = JSON.parse(sessionStorage.getItem('convert_data'));
    } catch (error) {

    }
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
    if(event.target.value != "") {
        add();
    }
    else {
        event.target.setAttribute('placeholder', 'required');
    }
  }
});

window.convertNow = function(type = "json") {
    const to = new window.To(type1.innerText);

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
    if (data == null) {
        data = {};
    }
    if(keyAdd.value != "" && valueAdd.value != "") {

        valueAdd.value = valueAdd.value.trim();

        keyAdd.value = syntaxKey(keyAdd.value);

        data[keyAdd.value] = valueAdd.value;
        type1.innerText = JSON.stringify(data);
        sessionStorage.setItem('convert_data', type1.innerText);
        convertNow();
        keyAdd.value = "";
        valueAdd.value = "";
        keyAdd.focus();
    }
}

window.delete = function() {
    sessionStorage.removeItem('convert_data');
    type1.innerText = "";
}

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

//constructor
