const openFile = document.getElementById('openfile');
const saveFile = document.getElementById('savefile');
const contentTextArea = document.getElementById('content');
let fileHandle;

const open = async () => {
    const pickerOpts = {
        types: [
            {
            description: "Texts",
            accept: {
                "texts/*": [".php", ".dart"],
            },
            },
        ],
        excludeAcceptAllOption: true,
    };
    [fileHandle] = await window.showOpenFilePicker(pickerOpts);
    const file = await fileHandle.getFile();
    const contents = await file.text();
    contentTextArea.value = contents;
    console.log( await file.path);
}

const save = async content => {
    const writable = await fileHandle.createWritable();

    await writable.write(content);
    await writable.close();
}

openFile.addEventListener('click', () => open());
saveFile.addEventListener('click', () => save(contentTextArea.value));
