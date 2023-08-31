
import To from './to';
window.To = To;

const type1 = document.getElementById('type-1');
const type2 = document.getElementById('type-2');

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
