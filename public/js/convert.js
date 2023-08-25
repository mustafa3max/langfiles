function countCode() {
    const codeAllOld = localStorage.getItem("arCodeAll") === null ? {} : JSON.parse(localStorage.getItem("arCodeAll"));
    return Object.keys(codeAllOld).length;
}

function addCode(key, values, languages) {
    values = JSON.parse(values);
    for(var index=0;index<languages.length; index++){
        const keyLocal = languages[index]+"CodeAll";
        const codeAllOld = localStorage.getItem(keyLocal) === null ? {} : JSON.parse(localStorage.getItem(keyLocal));

        codeAllOld[key] = values[index];

        const codeAllNew = JSON.stringify(codeAllOld);

        localStorage.setItem(keyLocal, codeAllNew);
    }
}

function removeCode(key, languages) {
    for (let index = 0; index < languages.length; index++) {
        const keyLocal = languages[index]+"CodeAll";
        const codeAllOld = localStorage.getItem(keyLocal) === null ? {} : JSON.parse(localStorage.getItem(keyLocal));
        delete codeAllOld[key];

        const codeAllNew = JSON.stringify(codeAllOld);

        localStorage.setItem(keyLocal, codeAllNew);
    }
}

const copyContent = async (idCode) => {
    const code = document.getElementById(idCode).innerText;
    try {
        if (navigator.clipboard) {
            await navigator.clipboard.writeText(code);
        } else {
            alert(code);
        }
    } catch (err) {
        alert(code);
    }
}

// All Functions Convert To

function jsonOrPhp(key, value, isPhp) {
    const div = document.createElement('div');
    const spanKey = document.createElement('span');
    const spanValue = document.createElement('span');
    const cut = document.createElement('span');
    const comma = document.createElement('span');

    spanKey.classList.add('text-code-1-light');
    spanKey.classList.add('dark:text-code-1-dark');

    spanValue.classList.add('text-code-2-light');
    spanValue.classList.add('dark:text-code-2-dark');

    spanKey.innerText = '"'+key+'"';
    cut.innerText = isPhp?'=> ':': ';
    spanValue.innerText = '"'+value+'"';
    comma.innerText = ',';

    div.appendChild(spanKey);
    div.appendChild(cut);
    div.appendChild(spanValue);
    div.appendChild(comma);

    return div.innerHTML;
}

function android(key, value) {
    const div = document.createElement('div');
    const spanKey = document.createElement('span');
    const spanValue = document.createElement('span');
    const stringFirst = document.createElement('span');
    const stringMid = document.createElement('span');
    const stringLast = document.createElement('span');

    spanKey.classList.add('text-code-1-light');
    spanKey.classList.add('dark:text-code-1-dark');

    stringFirst.classList.add('text-code-2-light');
    stringFirst.classList.add('dark:text-code-2-dark');
    stringMid.classList.add('text-code-2-light');
    stringMid.classList.add('dark:text-code-2-dark');
    stringLast.classList.add('text-code-2-light');
    stringLast.classList.add('dark:text-code-2-dark');

    stringFirst.innerText = '<string ';
    stringMid.innerText = '> ';
    stringLast.innerText = '</string>';
    spanKey.innerText = 'name="'+key+'"';
    spanValue.innerText = value;

    div.appendChild(stringFirst);
    div.appendChild(spanKey);
    div.appendChild(stringMid);
    div.appendChild(spanValue);
    div.appendChild(stringLast);

    return div.innerHTML;
}

function ios(key, value) {
    const div = document.createElement('div');
    const spanKey = document.createElement('span');
    const spanValue = document.createElement('span');
    const cut = document.createElement('span');
    const comma = document.createElement('span');

    spanKey.classList.add('text-code-1-light');
    spanKey.classList.add('dark:text-code-1-dark');

    spanValue.classList.add('text-code-2-light');
    spanValue.classList.add('dark:text-code-2-dark');

    spanKey.innerText = '"'+key+'"';
    cut.innerText = ' = ';
    spanValue.innerText = '"'+value+'"';
    comma.innerText = ';';

    div.appendChild(spanKey);
    div.appendChild(cut);
    div.appendChild(spanValue);
    div.appendChild(comma);

    return div.innerHTML;
}

function django(key, value) {
    const div = document.createElement('div');
    const divId = document.createElement('div');
    const divStr = document.createElement('div');
    const msgId = document.createElement('span');
    const msgStr = document.createElement('span');
    const spanKey = document.createElement('span');
    const spanValue = document.createElement('span');
    const br = document.createElement('br');

    msgId.classList.add('text-code-2-light');
    msgId.classList.add('dark:text-code-2-dark');
    msgStr.classList.add('text-code-2-light');
    msgStr.classList.add('dark:text-code-2-dark');

    spanKey.classList.add('text-code-1-light');
    spanKey.classList.add('dark:text-code-1-dark');
    spanValue.classList.add('text-code-1-light');
    spanValue.classList.add('dark:text-code-1-dark');

    msgId.innerText = 'msgid ';
    msgStr.innerText = 'msgstr ';
    spanKey.innerText = '"'+key+'"';
    spanValue.innerText = '"'+value+'"';


    divId.appendChild(msgId);
    divId.appendChild(spanKey);

    divStr.appendChild(msgStr);
    divStr.appendChild(spanValue);

    div.appendChild(divId);
    div.appendChild(divStr);
    div.appendChild(br);

    return div.innerHTML;
}

function xlf(key, value) {
    const div = document.createElement('div');
    const spanKey = document.createElement('span');
    const spanValue = document.createElement('span');
    const transFirst = document.createElement('span');
    const transMid = document.createElement('span');
    const transLast = document.createElement('span');
    const divS = document.createElement('div');
    const divT = document.createElement('div');
    const sourceFirst = document.createElement('span');
    const sourceLast = document.createElement('span');
    const targetFirst = document.createElement('span');
    const targetLast = document.createElement('span');
    const id = document.createElement('span');

    divS.classList.add('ps-6');
    divT.classList.add('ps-6');

    transFirst.classList.add('text-code-2-light');
    transFirst.classList.add('dark:text-code-2-dark');
    transMid.classList.add('text-code-2-light');
    transMid.classList.add('dark:text-code-2-dark');
    transLast.classList.add('text-code-2-light');
    transLast.classList.add('dark:text-code-2-dark');

    sourceFirst.classList.add('text-code-1-light');
    sourceFirst.classList.add('dark:text-code-1-dark');
    sourceLast.classList.add('text-code-1-light');
    sourceLast.classList.add('dark:text-code-1-dark');

    targetFirst.classList.add('text-code-1-light');
    targetFirst.classList.add('dark:text-code-1-dark');
    targetLast.classList.add('text-code-1-light');
    targetLast.classList.add('dark:text-code-1-dark');

    id.classList.add('text-code-1-light');
    id.classList.add('dark:text-code-1-dark');

    transFirst.innerText = '<trans-unit ';
    transMid.innerText = '> ';
    id.innerText = 'id="'+key+'"';

    sourceFirst.innerText = '<source>';
    spanKey.innerText = key;
    sourceLast.innerText = '</source>';

    targetFirst.innerText = '<target>';
    spanValue.innerText = value;
    targetLast.innerText = '</target>';

    spanValue.innerText = value;

    transLast.innerText = '</trans-unit>';

    divS.appendChild(sourceFirst);
    divS.appendChild(spanKey);
    divS.appendChild(sourceLast);

    divT.appendChild(targetFirst);
    divT.appendChild(spanValue);
    divT.appendChild(targetLast);

    div.appendChild(transFirst);
    div.appendChild(id);
    div.appendChild(transMid);
    div.appendChild(divS);
    div.appendChild(divT);
    div.appendChild(transLast);

    return div.innerHTML;
}

function csv(key, valueAr, valueEn) {
    const div = document.createElement('div');
    const spanKey = document.createElement('span');
    const spanValue1 = document.createElement('span');
    const spanValue2 = document.createElement('span');
    const comma1 = document.createElement('span');
    const comma2 = document.createElement('span');

    spanKey.classList.add('text-code-2-light');
    spanKey.classList.add('dark:text-code-2-dark');

    spanValue1.classList.add('text-code-1-light');
    spanValue1.classList.add('dark:text-code-1-dark');
    spanValue2.classList.add('text-code-1-light');
    spanValue2.classList.add('dark:text-code-1-dark');

    spanKey.innerText = key.toUpperCase();
    comma1.innerText = ', ';
    spanValue1.innerText = '"'+valueAr+'"';
    comma2.innerText = ', ';
    spanValue2.innerText = '"'+valueEn+'"';

    div.appendChild(spanKey);
    div.appendChild(comma1);
    div.appendChild(spanValue1);
    div.appendChild(comma2);
    div.appendChild(spanValue2);

    return div.innerHTML;
}

