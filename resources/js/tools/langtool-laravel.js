const keyInput = document.getElementById('key');
const valueInput = document.getElementById('value');

let directory;
let fileHandle;
var contents = {};
let openedWindow;
var isRemoveItem = false;
var isEditItem = false;
var isAddItem = false;


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
            startIn: 'desktop'
        });

        Alpine.store('langtool').files = [];

        for await (const entryParent of directory.values()) {
            Alpine.store('langtool').languages.push(entryParent.name);
            const files = [];
            if (entryParent.kind === "directory") {
                fileHandle = await directory.getDirectoryHandle(entryParent.name, {create: true});
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
            phpToJson();
        }

    } catch(e) {
        if(!navigator.userAgent.includes('Chrome')) {
            alert('تعمل هذه الميزة على متصفح جوجل كروم ومتصفح ايدج فقط');
        }
    }

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

window.inputs = function () {
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
                    editItemNow(key.value, value.value, oldKey, true, key.title==''?null:key.title);
                    oldKey = "";
                    key.blur();
                }
            }
        });

        value.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                editItemNow(key.value, value.innerText, oldKey, false);
                value.blur();
            }
        });
    }
}

function addItem () {

    isAddItem = true;
    Alpine.store('langtool').languages.forEach(lang => {
        Alpine.store('langtool').files[lang].forEach(file => {
            if (Alpine.store('langtool').file == file) {
                const key = window.syntaxKey(keyInput.value);
                Alpine.store('langtool').contents[lang][file][key] = window.syntaxValue(valueInput.innerText);
            }
        });
    });

    keyInput.value = "";
    valueInput.innerText = "";

    keyInput.focus();
    jsonToDartAllNow();

    initInputs();
}

window.editItemNow = function (key, value, oldKey, isKey, keyParent = null) {

    if(key==''){
        return removeItem(oldKey, keyParent);
    }
    isEditItem = true;
    if(isKey) {
        key = window.syntaxKey(key);
        Alpine.store('langtool').languages.forEach(lang => {
            Alpine.store('langtool').files[lang].forEach(file => {
                if (Alpine.store('langtool').file == file) {
                    const content = Alpine.store('langtool').contents[lang][file];
                    if(keyParent != null) {
                        content[key] = content[oldKey];
                        delete content[oldKey];
                    }else {
                        content[key] = content[oldKey];
                        delete content[oldKey];
                    }
                    Alpine.store('langtool').contents[lang][file] = content;
                }
            });
        });
        jsonToDartAllNow();
    }else{
        if(keyParent != null) {
            Alpine.store('langtool').contents[Alpine.store('langtool').lang][Alpine.store('langtool').file][keyParent][key] = window.syntaxValue(value);
        }else {
            Alpine.store('langtool').contents[Alpine.store('langtool').lang][Alpine.store('langtool').file][key] = window.syntaxValue(value);
        }
        jsonToDart();
    }
}

window.jsonToDartAllNow = async function () {
    const newContents = {};
    Alpine.store('langtool').languages.forEach(async function (lang) {
        newContents[lang] = {};
        Alpine.store('langtool').files[lang].forEach(async function (file) {
            const contents = Alpine.store('langtool').contents[lang][file];

            newContents[lang][file] = '<?php return '+JSON.stringify(contents, null, 2)+';';
            newContents[lang][file] = newContents[lang][file].replace(/\{/g, '[');
            newContents[lang][file] = newContents[lang][file].replace(/\}/g, ']');
            newContents[lang][file] = newContents[lang][file].replace(/\: /g, '=> ');
        });
    });

    saveAll(newContents);
}

window.jsonToDartSelectFileAll = async function(contents) {
    var newContents = '<?php return '+JSON.stringify(contents, null, 2)+';';
    newContents = newContents.replace(/\{/g, '[');
    newContents = newContents.replace(/\}/g, ']');
    newContents = newContents.replace(/\": /g, '"=> ');

    saveSelect(newContents);
}

async function jsonToDart() {
    var file = Alpine.store('langtool').file;
    var lang = Alpine.store('langtool').lang;
    const contents = Alpine.store('langtool').contents[lang][file];

    var newContents = "";

    newContents = '<?php return '+JSON.stringify(contents, null, 2)+';';
    newContents = newContents.replace(/\{/g, '[');
    newContents = newContents.replace(/\}/g, ']');
    newContents = newContents.replace(/\": /g, '"=> ');

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
    if(isRemoveItem) {
        isRemoveItem = false;
    }else if(isEditItem) {
        isEditItem = false;
    }else if(isAddItem) {
        isAddItem = false;
    }
    else{
        phpToJson();
    }
}

window.saveSelect = async function (content) {
    try {
        fileHandle = await directory.getDirectoryHandle(Alpine.store('langtool').lang, {create: true});
        const newFile = await fileHandle.getFileHandle(Alpine.store('langtool').file, {create: true});
        const writable = await newFile.createWritable();
        await writable.write(content);
        await writable.close();
        Alpine.store('langtool').manualSaving = false;
    } catch (error) {
        alert(error);
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

function removeItem(key, keyParent) {
    isRemoveItem = true;
    if(keyParent == null) {
        Alpine.store('langtool').languages.forEach(async function (lang) {
            Alpine.store('langtool').files[lang].forEach(async function (file) {
                delete Alpine.store('langtool').contents[lang][file][key];
            });
        });
    }else {
        Alpine.store('langtool').languages.forEach(async function (lang) {
            Alpine.store('langtool').files[lang].forEach(async function (file) {
                delete Alpine.store('langtool').contents[lang][file][keyParent][key];
            });
        });
    }

    jsonToDartAllNow();
}

function phpToJson (){
    var contentNew = {};
    for (const lang in contents) {
        contentNew[lang] = {};
        for (const file in contents[lang]) {
            var data = contents[lang][file];

            let start = data.indexOf("[");
            let end = data.indexOf("];")+1;

            data = data.replace(/\=>/g, "\:");
            data = data.replace(/\;/g, "");
            data = data.trim();
            data = data.slice(start, end);
            data = data.replace(/\s+/g, " ");
            data = data.replace(/\[/g, "{");
            data = data.replace(/\]/g, "}");
            data = data.replace(/\, }/g, "}");

            data = JSON.parse(data);

            contentNew[lang][file] = data;

            Alpine.store('langtool').file = file;
        }

        Alpine.store('langtool').lang = lang;
    }

    Alpine.store('langtool').contents = contentNew;

    initInputs();
}

function initInputs(){
    setTimeout(function() {
        inputs();
    }, 200);
}

function cancellationIsFull() {
    if(document.referrer != document.URL && document.referrer != '') {
        localStorage.setItem('is_full', false);
    }
}

cancellationIsFull();
inputKeyValue();
