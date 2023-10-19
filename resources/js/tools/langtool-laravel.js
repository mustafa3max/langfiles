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
            id:"laravel",
            startIn: 'desktop',
            writable: true
        });

        Alpine.store('langtool').files = [];

        for await (const entryParent of directory.values()) {
            Alpine.store('langtool').languages.push(entryParent.name);
            const files = [];
            if (entryParent.kind === "directory") {
                fileHandle = await directory.getDirectoryHandle(entryParent.name);
                contents[entryParent.name] = {};
                for await (const file of fileHandle.values()) {
                    files.push(file.name);

                    var newFile = await file.getFile();

                    contents[entryParent.name][file.name] = await newFile.text();
                }
            }

            Alpine.store('langtool').files[entryParent.name] = files;
        }

        if(Object.keys(contents).length > 0) {
            Alpine.store('langtool').isDir =  true;
            dartToJson();
        }

    } catch(e) {
        console.log(e);

        if(!navigator.userAgent.includes('Chrome')) {
            alert('تعمل هذه الميزة على متصفح جوجل كروم ومتصفح ايدج فقط');
        }
    }

}

window.dartToJson = function (){
    var contentNew = {};
    for (const lang in contents) {
        contentNew[lang] = {};
        for (const file in contents[lang]) {
            var data = contents[lang][file];

            let start = data.indexOf("[");
            let end = data.indexOf("]")+1;

            data = data.replace(/\=>/g, ":");
            data = data.replace(/\;/g, "");
            data = data.trim();
            data = data.slice(start, end);
            data = data.replace(/\s+/g, " ");
            data = data.replace("[", "{");
            data = data.replace("]", "}");
            data = data.replace(", }", "}");

            data = JSON.parse(data);

            contentNew[lang][file] = data;

            Alpine.store('langtool').file = file;
        }

        Alpine.store('langtool').lang = lang;
    }

    Alpine.store('langtool').contents = contentNew;

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

    Alpine.store('langtool').languages.forEach(lang => {
        Alpine.store('langtool').files[lang].forEach(file => {
            if (Alpine.store('langtool').file == file) {
                const key = window.syntaxKey(keyInput.value);
                Alpine.store('langtool').contents[lang][file][key] = valueInput.innerText;
            }
        });
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
        Alpine.store('langtool').languages.forEach(lang => {
            Alpine.store('langtool').files[lang].forEach(file => {
                if (Alpine.store('langtool').file == file) {
                    delete Object.assign(Alpine.store('langtool').contents[lang][file], {[window.syntaxKey(key)]: Alpine.store('langtool').contents[lang][file][oldKey] })[oldKey];
                }
            });
        });
        jsonToDartAll();
    }else{
        key = window.syntaxKey(key);
        Alpine.store('langtool').contents[Alpine.store('langtool').lang][Alpine.store('langtool').file][key] = value;
        jsonToDart();
    }
}

window.jsonToDartAll = async function () {
    const newContents = {};
    Alpine.store('langtool').languages.forEach(async function (lang) {
        newContents[lang] = {};
        Alpine.store('langtool').files[lang].forEach(async function (file) {
            const contents = Alpine.store('langtool').contents[lang][file];

            newContents[lang][file] = '<?php return '+JSON.stringify(contents, null, 2)+';';
            newContents[lang][file] = newContents[lang][file].replace('{', '[');
            newContents[lang][file] = newContents[lang][file].replace('}', ']');
            newContents[lang][file] = newContents[lang][file].replace(': ', '=> ');
        });
    });

    saveAll(newContents);
}

async function jsonToDart() {
    var file = Alpine.store('langtool').file;
    var lang = Alpine.store('langtool').lang;
    const contents = Alpine.store('langtool').contents[lang][file];

    var newContents = "";

    newContents = '<?php return '+JSON.stringify(contents, null, 2)+';';
    newContents = newContents.replace('{', '[');
    newContents = newContents.replace('}', ']');
    newContents = newContents.replace(': ', '=> ');

    save(newContents);
}

async function saveAll(content) {
    for await (const entry of directory.values()) {
        fileHandle = await directory.getDirectoryHandle(entry.name);

        for await (const file of fileHandle.values()) {
            if (Alpine.store('langtool').file == file.name) {
                const newFile = await fileHandle.getFileHandle(file.name, {create: true});
                const writable = await newFile.createWritable();
                await writable.write(content[entry.name][file.name]);
                await writable.close();
            }
        }
    }
}

async function save(content) {
    for await (const entry of directory.values()) {

        if(entry.name == Alpine.store('langtool').lang) {
            fileHandle = await entry.getFileHandle(Alpine.store('langtool').file, {create: true});
            const writable = await fileHandle.createWritable();
            await writable.write(content);
            await writable.close();
        }
    }
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
