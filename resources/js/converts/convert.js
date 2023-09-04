
import To from './to';
window.To = To;

const type1 = document.getElementById('type-1');
const type2 = document.getElementById('type-2');
const key = document.getElementById('key');
const value = document.getElementById('value');
var data = {};

try {
    data = JSON.parse(sessionStorage.getItem('convert_data'));
} catch (error) {
}

type1.innerText = JSON.stringify(data);

type1.addEventListener('input', ()=>{
    sessionStorage.setItem('convert_data', type1.innerText);
});

key.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    if(key.value != "") {
        value.focus();
    }
    else {
        key.setAttribute('placeholder', 'required');
    }
  }
});

value.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    if(value.value != "") {
        add();
    }
    else {
        value.setAttribute('placeholder', 'required');
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
    if(key.value != "" && value.value != "") {

        value.value = value.value.trim();

        key.value = syntaxKey(key.value);

        data[key.value] = value.value;
        type1.innerText = JSON.stringify(data);
        sessionStorage.setItem('convert_data', type1.innerText);
        convertNow();
        key.value = "";
        value.value = "";
        key.focus();
    }
}

window.delete = function() {
    sessionStorage.removeItem('convert_data');
    type1.innerText = "";
}
