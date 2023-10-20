window.syntaxKey = function(key) {
    key = key.split('');
    for (var i = 0; i < key.length; i++) {
        if (key[0].replace(/\d+/g, '') == '') {
            key.splice(0, 1);
        } else if (key[0].replace(/[^ا-يa-zA-Z0-9]/g, '') == '') {
            key.splice(0, 1);
        }
    }
    key = key.join('');
    key = key.trim();
    key = key.replaceAll(" ", "_");
    key = key.replaceAll("-", "_");
    key = key.replace(/_+/g, '_');
    key = key.toLowerCase();
    key = key.replace(/[^ا-يa-zA-Z0-9-_]/g, '');

    return key;
}

window.syntaxValue = function(key) {
    key = key.trim();
    key = key.replace(/\s+/g, ' ');
    key = key.replace(/"/g, '\'');
    key = key.replace(/\n/g, ' ');
    return key;
}

window.selectSyntax = function (input, syntax) {

    syntax = syntax.replaceAll(' ', '-');
    input += " " + syntax;

    var value = input.split(" ");
    value.splice(value.length - 2, 1);
    input = value.join(' ') + ' ';

    input = input.replaceAll('-', ' ');
    return input;
}

window.filterSyntax = function(input, valueSelect, syntaxesLocal, syntaxesServer) {
    const value = input.trim().replace(/\s{2,}/g, ' ');

    syntaxesLocal = [];

    for (let index = 0; index < syntaxesServer.length; index++) {
        const element = syntaxesServer[index];

        var v = '';
        var vList = input.split(' ');
        if(vList.length > 1) {
            v = vList[vList.length-1];
        }else {
            v = value;
        }
        v = v.toLowerCase();
        v = v.replaceAll('إ', 'ا');
        v = v.replaceAll('أ', 'ا');
        if(element.includes(v)) {
            syntaxesLocal.push(element);
        }
    }

    if(value == '') {
        syntaxesLocal = [];
    }

    if(input[input.length-1] == ' ') {
        syntaxesLocal = [];
        valueSelect.push(value);

        input = valueSelect[valueSelect.length-1]+' ';
    }else {
        valueSelect = [];
    }

    return [syntaxesLocal, input];
}
