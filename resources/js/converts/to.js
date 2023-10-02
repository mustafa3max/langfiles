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
                else if(type == "html") {
                    fullData += To.html(item, data[item]);
                }
            }

            return To.parentType(fullData, type);
        }
    }

    static handling() {
        var data = {};

        try {
            data = JSON.parse(To.data);
        } catch (error) {

        }

        return data;
    }

    static json(key, value) {
        return '<div class="ps-4">'+
        '<span class="text-code-1-light dark:text-code-1-dark">"'+key+'"</span>'+
        ': '+
        '<span class="text-code-2-light dark:text-code-2-dark">"'+value+'"</span>'+
        ',</div>';
    }

    static php(key, value) {
        return '<div>'+
        To.charsets["tab"]+
        '<span class="text-code-1-light dark:text-code-1-dark">"'+key+'"</span>'+
        '=> '+
        '<span class="text-code-2-light dark:text-code-2-dark">"'+value+'"</span>'+
        ',</div>';
    }

    static django(key, value) {
        return '<div><span class="text-code-1-light dark:text-code-1-dark">msgid</span>'+
            '<span class="text-code-2-light dark:text-code-2-dark"> "'+key+'</sapn>'+
            '"</div>'+
            '<div><span class="text-code-1-light dark:text-code-1-dark">msgstr</span>'+
            '<span class="text-code-2-light dark:text-code-2-dark"> "'+value+'</sapn>'+
            '"</div>'+
            '<br>';
    }

    static android(key, value) {
        return '<div>'+
        To.charsets["tab"]+
        '<span class="text-code-2-light dark:text-code-2-dark">'+To.charsets["<"]+'string</span> '+
        '<span class="text-code-1-light dark:text-code-1-dark">'+'name="'+key+'"</span>'+
        '<span class="text-code-2-light dark:text-code-2-dark">'+To.charsets[">"]+'</span>'+
        value+
        '<span class="text-code-2-light dark:text-code-2-dark">'+To.charsets["<"]+'/string></span>'+
        '</div>';
    }

    static ios(key, value) {
         return '<div>'+
        '<span class="text-code-1-light dark:text-code-1-dark">"'+key+'"</span>'+
        ' = '+
        '<span class="text-code-2-light dark:text-code-2-dark">"'+value+'"</span>'+
        ';</div>';
    }

    static xlf(key, value) {
        return '<div>'+
        '<span class="text-code-2-light dark:text-code-2-dark">'+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'trans-unit</span> <span class="text-code-1-light dark:text-code-1-dark">id="'+key+'"</span><span class="text-code-2-light dark:text-code-2-dark">></sapn></div>'+
        '<div>'+
        '<span class="text-code-1-light dark:text-code-1-dark">'+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'source></span>'+key+'<span class="text-code-1-light dark:text-code-1-dark">'+this.charsets["<"]+'/source></span>'+
        '</div>'+
        '<div>'+
        '<span class="text-code-1-light dark:text-code-1-dark">'+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'source></span>'+value+'<span class="text-code-1-light dark:text-code-1-dark">'+this.charsets["<"]+'/source></span>'+
        '</div>'+
        '<div>'+
        '<span class="text-code-2-light dark:text-code-2-dark">'+this.charsets["tab"]+this.charsets["tab"]+this.charsets["tab"]+this.charsets["<"]+'/trans-unit></sapn>'+
        '</div>';
    }

    static csv(key, value) {
        return '<div>'+
        '<span class="text-code-1-light dark:text-code-1-dark">'+key+'</span>'+
        ', '+
        '<span class="text-code-2-light dark:text-code-2-dark">"'+value+'"'+'</span>'+
        ',</div>';
    }

     static html(key, value) {
         return "<div>" +

                "<span class=\"text-code-2-light dark:text-code-2-dark\">" +
                "&#x3c;li" +
                '</span>' +

                "<span class=\"text-code-1-light dark:text-code-1-dark\">" +
                " id" +
                '</span>' +

                "<span class=\"text-primary-dark dark:text-primary-light\">" +
                "=" +
                '</span>' +

                "<span class=\"text-code-1-light dark:text-code-1-dark\">" +
                "\"" + key + "\"" +
                '</span>' +

                "<span class=\"text-code-2-light dark:text-code-2-dark\">" +
                ">" +
                '</span>' +

                "<span class=\"text-primary-dark dark:text-primary-light\">" +
                value +
                '</span>' +

                "<span class=\"text-code-2-light dark:text-code-2-dark\">" +
                "&#x3c;/li>" +
                '</span>' +

                "</div>";
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
        else if(type == "csv") {
             return '<div>'+this.charsets['<']+'ul></div>'+
            fullData+
            '<div>'+this.charsets['<']+'/ul></div>';
        }
        else if(type == "html") {
            return '<div>'+this.charsets['<']+'ul></div>'+
            fullData+
            '<div>'+this.charsets['<']+'/ul></div>';
        }
    }

    static capitalize(string)
    {
        return string[0].toUpperCase() + string.slice(1);
    }
}
