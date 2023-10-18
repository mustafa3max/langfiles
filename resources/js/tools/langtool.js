const keyInput = document.getElementById('key');
const valueInput = document.getElementById('value');

let directory;
let fileHandle;
var contents = {};
let openedWindow;


window.is_full = function (full) {
    localStorage.setItem('is_full', full);
}

window.select_dir_lang = async function(){
    if(directory) {
        alert('The page will reload again');
        location.reload();
    }

    try {
        directory = await window.showDirectoryPicker({
            startIn: 'desktop',
            writable: true
        });

        Alpine.store('langtool').files = [];

        for await (const entry of directory.values()) {
            Alpine.store('langtool').files.push(entry.name);

            fileHandle = await directory.getFileHandle(entry.name, {create: true});
            const file = await fileHandle.getFile();

            contents[entry.name] = await file.text();
        }

        Alpine.store('langtool').isDir =  Alpine.store('langtool').files.length > 0;
        if(Object.keys(contents).length > 0) {
            dartToJson();
        }

    } catch(e) {
        if(!navigator.userAgent.includes('Chrome')) {
            alert('تعمل هذه الميزة على متصفح جوجل كروم ومتصفح ايدج فقط');
        }
    }

}

window.dartToJson = function (){
    for (const key in contents) {
        var value = contents[key];

        let start = value.indexOf("{");
        let end = value.indexOf("}")+1;

        value = value.trim();
        value = value.slice(start, end);
        value = value.replace(/\s+/g, " ");
        value = value.replace(", }", "}");

        value = JSON.parse(value);

        contents[key] = value;
    }

    Alpine.store('langtool').contents = contents;
    Alpine.store('langtool').lang = (Object.keys(contents)[0]).split('.')[0];
    Alpine.store('langtool').file = Object.keys(contents)[0];

    setTimeout(function() {
        inputs();
    }, 1000);
}


function inputKeyValue() {
    keyInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            if(keyInput.value.length > 0) {
                valueInput.focus();
            }
        }
    });

    valueInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            addItem();
        }
    });
}

function inputs() {
    var oldKey = "";
    const inputsKey = document.getElementsByClassName('inputKey');
    const inputsValue = document.getElementsByClassName('inputValue');

    for (let index = 0; index < inputsKey.length; index++) {
        const key = inputsKey[index];
        const value = inputsValue[index];

        key.addEventListener("focus", function() {
            oldKey = key.value;
        });

        key.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                if (oldKey !== key.value) {
                    editItem(key.value, value.value, oldKey, true);
                    oldKey = "";
                    key.blur();
                }
            }
        });

        value.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                editItem(key.value, value.innerText, oldKey, false);
                value.blur();
            }
        });

    }
}

function addItem () {

    Alpine.store('langtool').files.forEach(file => {
        const key = window.syntaxKey(keyInput.value);
        Alpine.store('langtool').contents[file][key] = valueInput.innerText;
    });

    keyInput.value = "";
    valueInput.innerText = "";

    keyInput.focus();
    jsonToDartAll();

    setTimeout(function() {
        inputs();
    }, 200);
}

window.editItem = function (key, value, oldKey, isKey) {

    if(key==''){
        return removeItem(oldKey);
    }
    if(isKey) {
        Alpine.store('langtool').files.forEach(file => {
            delete Object.assign(Alpine.store('langtool').contents[file], {[window.syntaxKey(key)]: Alpine.store('langtool').contents[file][oldKey] })[oldKey];
        });
        jsonToDartAll();
    }else{
        key = window.syntaxKey(key);
        Alpine.store('langtool').contents[Alpine.store('langtool').file][key] = value;
        jsonToDart();
    }
}

window.jsonToDartAll = async function () {
    const newContents = {};
    Alpine.store('langtool').files.forEach(async function (file) {
        const contents = Alpine.store('langtool').contents[file];

        if(file.includes('.dart')) {
            newContents[file] = 'const Map<String, String> '+file.replace('.dart', '')+' = '+JSON.stringify(contents, null, 2)+';';
        }else {
            newContents[file] = JSON.stringify(contents, null, 2);
        }

    });

    saveAll(newContents);
}

async function jsonToDart() {
    var file = Alpine.store('langtool').file;
    const contents = Alpine.store('langtool').contents[file];

        if(file.includes('.dart')) {
            var newContents = 'const Map<String, String> '+file.replace('.dart', '')+' = '+JSON.stringify(contents, null, 2)+';';
        }else {
            var newContents = JSON.stringify(contents, null, 2);
        }
    save(newContents);
}

async function saveAll(content) {
    for await (const entry of directory.values()) {
        fileHandle = await directory.getFileHandle(entry.name, {create: true});

        const writable = await fileHandle.createWritable();

        await writable.write(content[entry.name]);
        await writable.close();
    }
}

async function save(content) {
    fileHandle = await directory.getFileHandle(Alpine.store('langtool').file, {create: true});

    const writable = await fileHandle.createWritable();

    await writable.write(content);
    await writable.close();
}

async function removeItem(key) {
    Alpine.store('langtool').files.forEach(async function (file) {
        delete Alpine.store('langtool').contents[file][key];
    });

    jsonToDartAll();
}

inputKeyValue();

// constructor

//
// window.setting = function(isFull, route) {
//     if (isFull) {
//         openedWindow = window.open(route, '_blank', 'popup=yes,top=0, left=0,width=4000,height=4000,titlebar=no,location=no,status=no,menubar=no,');
//     }else {
//         try {
//              close();
//             openedWindow.close();
//         } catch (error) {

//         }
//     }
// }
