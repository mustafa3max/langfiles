export default class To {
    static charsets = {
        ">": "&#x3e;",
        "<": "&#x3C;",
        "tab": "&nbsp;&nbsp;&nbsp;&nbsp;",
    };

    constructor(data) {
        To.data = data;

        this.convert = function(type){
            var fullData = "";
            const data = To.handling();
            for(const item in data) {
                if(type == "json") {
                    fullData += To.json(item, data[item]);
                }
                else if(type == "php") {
                    fullData += To.php(item, data[item]);
                }
                else if(type == "django") {
                    fullData += To.django(item, data[item]);
                }
                else if(type == "android") {
                    fullData += To.android(item, data[item]);
                }
                else if(type == "ios") {
                    fullData += To.ios(item, data[item]);
                }
                else if(type == "xlf") {
                    fullData += To.xlf(item, data[item]);
                }
                else if(type == "csv") {
                    fullData += To.csv(item, data[item]);
                }
            }

            return To.parentType(fullData, type);
        }
    }

    static handling() {
        const data = JSON.parse(To.data);

        return data;
    }

    static json(key, value) {
        return '<div>'+
        To.charsets["tab"]+
        '"'+key+
        '": "'+
        value+'",</div>';
    }

    static php(key, value) {
        return '<div>'+
        To.charsets["tab"]+
        '"'+key+'"=> "'+
        value+'",</div>';
    }

    static django(key, value) {
        return '<div>msgid "'+key+'"</div>'+
            '<div>msgstr "'+value+'"</div>'+
            '<br>';
    }

    static android(key, value) {
        return '<div>'+
        To.charsets["tab"]+
        To.charsets["<"]+
        'string name="'+
        key+
        '"'+
        To.charsets[">"]+
        value+
        To.charsets["<"]+
        '/string>'+
        '</div>';
    }

    static ios(key, value) {
        return '<div>'+
        To.charsets["tab"]+
        '"'+key+'"= "'+
        value+'";</div>';
    }

    static xlf(key, value) {
        return '<div>'+
        this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'trans-unit id="'+key+'"></div>'+
        '<div>'+
        this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'source>'+key+this.charsets["<"]+'/source>'+
        '</div>'+
        '<div>'+
        this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'target>'+value+this.charsets["<"]+'/target>'+
        '</div>'+
        '<div>'+
        this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'/trans-unit>'+
        '</div>';
    }

    static csv(key, value) {
        return '<div>'+
        key+', "'+value+'",'+
        '</div>';
    }

    static parentType(fullData, type) {
        if(type == "json") {
            return '<div>{</div>'+
            fullData+
            '<div>}</div>';
        }
        else if(type == "php") {
            return '<div>'+To.charsets["<"]+'?php</div>' +
            '<div>return [</div>'+
            '<div>'+
            fullData+
            '</div>'+
            '<div>];</div>';
        }
        else if(type == "django") {
            return fullData;
        }
        else if(type == "android") {
            return '<div>'+this.charsets['<']+'?xml version="1.0" encoding="utf-8"?></div>'+
            '<div>'+this.charsets['<']+'resources></div>'+
            fullData+
            '<div>'+this.charsets['<']+'/resources></div>';
        }
        else if(type == "ios") {
            return fullData;
        }
        else if(type == "xlf") {
            return '<div>'+this.charsets['<']+'?xml version="1.0" encoding="UTF-8" ?></div>'+
            '<div>'+this.charsets['<']+'xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2"></div>'+
            '<div>'+this.charsets["tab"]+this.charsets['<']+'file source-language="en" datatype="plaintext" original="file.ext"></div>'+
            '<div>'+this.charsets["tab"]+this.charsets["tab"]+this.charsets['<']+'body></div>'+
            fullData+
            '<div>'+this.charsets["tab"]+this.charsets["tab"]+this.charsets['<']+'/body></div>'+
            '<div>'+this.charsets["tab"]+this.charsets['<']+'/file></div>'+
            '<div>'+this.charsets['<']+'/xliff></div>'+
            '';
        }
        else if(type == "csv") {
            return 'keys,lang_1'+
            fullData;
        }
    }

    static capitalize(string)
    {
        return string[0].toUpperCase() + string.slice(1);
    }
}
