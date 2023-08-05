var idSelect = null;

var articleEdit = null;
var article = document.getElementById('article');
const value = document.getElementById('value');
const imgSrc = document.getElementById('imgSrc');
const imgAlt = document.getElementById('imgAlt');
const title = document.getElementById('title');
title.value = sessionStorage.getItem("title-article");
const desc = document.getElementById('desc');
desc.value = sessionStorage.getItem("desc-article");
const thumbnail = document.getElementById('thumbnail');
const imgSave = sessionStorage.getItem("thumbnail-article");
if(imgSave) {
    thumbnail.setAttribute('src', imgSave);
}

document.addEventListener('click', function(event) {
    articleEdit = document.getElementById(event.target.id);
    idSelect = event.target.id;
});

title.addEventListener('input', function() {
    sessionStorage.setItem("title-article", title.value);
});

desc.addEventListener('input', function() {
    sessionStorage.setItem("desc-article", desc.value);
});

function addElement(type) {
    var element = null;

    if (type == 'img') {
        element = img();
    }else {
        element = item(type);
    }
    articleEdit.appendChild(element);
    sessionStorage.setItem("article", article.innerHTML);
}

function style(type, element) {
    switch (type) {
        case 'h2':
            element.classList.add('text-2xl');
            break;
        case 'h3':
            element.classList.add('text-xl');
            break;
        default:
            element.classList.add('text-lg');
            break;
    }
    if(type=='h2'||type=='h3') {
        element.classList.add('py-2');
        element.classList.add('font-bold');
    }
    return element;
}

function item(type) {
    var id = type + Math.random().toString(16).slice(2);
    const element = document.createElement(type);
    element.setAttribute('id', id);
    const textnode = document.createTextNode(type);
    element.appendChild(textnode);
    return style(type, element);
}

function img() {
    var id = "img-article" + Math.random().toString(16).slice(2);
    var url = location.origin+"/storage/blog/images/temporary_image.png";
    const img = document.createElement('img');
    img.setAttribute('id', id);
    img.setAttribute('src', url);
    img.classList.add("border");
    img.classList.add("border-primary-light");
    img.classList.add("dark:border-primary-dark");
    img.classList.add("rounded-lg");
    img.classList.add("outline-none");
    img.classList.add("focus:outline-accent");
    img.classList.add("w-full");
    img.setAttribute('ondblclick', 'addSrc()');
    img.setAttribute('contenteditable', true);
    // img.addEventListener('dblclick', function(e) {
    //     idSelect = e.target.id;
    //     addSrc("", idSelect);
    // });
    return img;
}

function addSrc(image, id) {
    if(id) {
        idSelect = id;
    }
    imgAlt.classList.add('hidden');
    if (value.classList.contains('hidden')) {
        value.classList.remove('hidden');
        value.classList.add('grid');
        imgSrc.classList.remove('hidden');
    }else {
        value.classList.add('hidden');
        imgSrc.classList.add('hidden');
        if (imgSrc.value != "") {
            const img = document.getElementById(idSelect);
            img.setAttribute('src', image);
            if(idSelect == "thumbnail") {
                sessionStorage.setItem(idSelect+"-article", image);
            }
        }
    }
    sessionStorage.setItem("article", article.innerHTML);
}

function addAlt() {
    imgSrc.classList.add('hidden');
    if (value.classList.contains('hidden')) {
            value.classList.remove('hidden');
            value.classList.add('grid');
            imgAlt.classList.remove('hidden');
    }else {
        value.classList.add('hidden');
        imgAlt.classList.add('hidden');
    }
    if (idSelect.includes('img-article')) {
        const img = document.getElementById(idSelect);
        console.log(img);
        if (imgAlt.value != "") {
            img.setAttribute('alt', imgAlt.value);
            img.setAttribute('title', imgAlt.value);
        }
        sessionStorage.setItem("article", article.innerHTML);
    }
}

function div(id) {
    const item = document.createElement('div');
    item.classList.add("outline-none");
    item.classList.add("focus:outline-primary-light");
    item.classList.add("focus:dark:outline-primary-dark");
    item.setAttribute('contenteditable', true);
    item.setAttribute('id', id);
    return item;
}

function initArticle() {
    // sessionStorage.removeItem("article");
    if(sessionStorage.getItem("article")==null) {
        for (let index = 0; index < 10; index++) {
            article.appendChild(div(index));
        }
        sessionStorage.setItem("article", article.innerHTML);
    }else {
        article.innerHTML = sessionStorage.getItem("article");
    }
}
initArticle();

function addItem() {
    article.appendChild(div(article.children.length));
    sessionStorage.setItem("article", article.innerHTML);
}
