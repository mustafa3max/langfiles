var idSelect = null;
var srcSelect = null;

var article = document.getElementById('article');
const title = document.getElementById('title');
const desc = document.getElementById('desc');

function addElement(type) {
    var element = null;

    element = item(type);
    const selection = window.getSelection();

    // const isAllowedContainer = selection.baseNode.parentElement?.closest?.('#article');

    // if( selection.rangeCount < 1 || !isAllowedContainer ) return;

    const range = selection.getRangeAt(0);

    const selParent = selection.anchorNode?.parentElement;
    const selectedElem = selParent?.nodeType == 1 && selParent?.children.length < 2 && selParent;

    if(selectedElem.tagName === type.toUpperCase()) {
        selectedElem.replaceWith(...selectedElem.childNodes);
    }
    else {
        element.appendChild(range.extractContents());
        range.insertNode(element);
        if(type == 'ol' || type == 'ul') {
            range.surroundContents(list(type));
        }
        return;
        try {
            range.surroundContents(element);
            if(type == 'ol' || type == 'ul') {
                range.surroundContents(list(type));
            }
        } catch (error) {
            console.log(error);
        }

        // selection.removeAllRanges();
        // selection.addRange(range);
        // range.collapse();
    }
}

function item(type) {
    if (type == 'h2' || type == 'h3') {
        return heading(type, document.createElement(type));
    }
    else if (type == 'p') {
        return paragraph(document.createElement('p'));
    }
    else if (type == 'img') {
        return image(document.createElement('img'));
    }
    else if(type == 'a') {
        return link(document.createElement('a'));
    }
    else if(type == 'ol' || type == 'ul') {
        return document.createElement('li');
    }
    else if(type == 'code') {
        return code(document.createElement('code'));
    }
    else if(type == 'blockquote') {
        return blockquote(document.createElement('blockquote'));
    }
     else if(type == 'q') {
        return document.createElement('q');
    }
    else{
        return document.createElement(type);
    }
}

function heading(type, element) {
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
    if(type=='h2' || type=='h3') {
        element.classList.add('py-2');
        element.classList.add('font-extrabold');
    }
    return element;
}

function paragraph(element) {
    element.classList.add('py-2');
    element.classList.add('text-xl');
    return element;
}

function image(img) {
    var id = "img-article" + Math.random().toString(16).slice(2);
    var src = location.origin+"/storage/blog/images/temporary_image.png";

    img.setAttribute('id', id);
    img.setAttribute('src', src);
    img.setAttribute('ondblclick', 'infoImage(src, id)');
    img.setAttribute('contenteditable', true);

    img.classList.add("border");
    img.classList.add("border-primary-light");
    img.classList.add("dark:border-primary-dark");
    img.classList.add("rounded-lg");
    img.classList.add("outline-none");
    img.classList.add("focus:outline-accent");
    img.classList.add("w-full");
    return img;
}

function link(element) {
    var id = "link-article" + Math.random().toString(16).slice(2);

    element.classList.add('text-lg');
    element.classList.add('text-accent');
    element.classList.add('hover:hover:underline');
    element.setAttribute('href', '#');
    element.setAttribute('id', id);
    element.setAttribute('ondblclick', 'infoLink(id)');

    return element;
}

function list(type) {
    const listType = document.createElement(type);
    if(type == 'ul') {
        listType.classList.add('list-disc');
    }
    else {
        listType.classList.add('list-decimal');
    }
    listType.classList.add('ps-5');

    return listType;
}

function code(element) {
    var id = "code-article" + Math.random().toString(16).slice(2);

    element.classList.add('block');
    element.classList.add('w-fit');
    element.classList.add('mx-auto');
    element.classList.add('p-4');
    element.classList.add('bg-secondary-light');
    element.classList.add('dark:bg-secondary-dark');
    element.classList.add('rounded-lg');
    element.classList.add('overflow-auto');
    element.classList.add('no-scrollbar');
    element.classList.add('whitespace-nowrap');
    element.classList.add('border');
    element.classList.add('border-primary-light');
    element.classList.add('dark:border-primary-dark');
    element.setAttribute('id', id);
    element.setAttribute('onclick', 'selectText(id)');

    return element;
}

function blockquote(element) {
    element.classList.add('block');
    element.classList.add('border-s-8');
    element.classList.add('border-s-accent');
    element.classList.add('bg-secondary-light');
    element.classList.add('p-2');
    element.classList.add('text-lg');
    element.classList.add('italic');
    element.classList.add('dark:bg-secondary-dark');
    element.classList.add('rounded-e-lg');
    element.classList.add('my-2');
    return element;
}

function infoImage(src, id) {
    if(id) {
        idSelect = id;
    }
    if(src) {
        srcSelect = src;
    }

    const imgInfo = document.getElementById('img-info');
    const img = document.getElementById(idSelect);
    const inputAlt = document.getElementById('input-alt');

    if (imgInfo.classList.contains('hidden')) {
        imgInfo.classList.remove('hidden');

        inputAlt.value = img.alt;

        if(idSelect === 'thumbnail-article') {
            inputAlt.disabled = true;
        }else {
            inputAlt.disabled = false;
        }
    }else {
        imgInfo.classList.add('hidden');

        img.setAttribute('src', srcSelect);
        img.setAttribute('alt', inputAlt.value);

        if(idSelect === 'thumbnail-article') {
            Livewire.emit('image', srcSelect);
        }
        article.innerHTML = article.innerHTML;
    }
}

function infoLink(id) {
    if(id) {
        idSelect = id;
    }
    const link = document.getElementById(idSelect);
    const addLink = document.getElementById('add-link');
    const inputLink = document.getElementById('input-link');
    const inputNofollow = document.getElementById('input-nofollow');
    const inputNewWindow = document.getElementById('input-new-window');

    if (addLink.classList.contains('hidden')) {
        inputLink.value = link.href;
        inputNofollow.checked = link.rel=='nofollow'?true:false;
        inputNewWindow.checked = link.target=='_blank'?true:false;
        addLink.classList.remove('hidden');
    }else {
        addLink.classList.add('hidden');

        link.setAttribute('href', inputLink.value);
        console.log(inputNofollow.value);

        if(inputNofollow.checked){
            link.setAttribute('rel', 'nofollow');
        }else {
            link.removeAttribute('rel');
        }

        if(inputNewWindow.checked){
            link.setAttribute('target', '_blank');
            link.classList.add('before:content-new-window');
        }else {
            link.removeAttribute('target');
            link.classList.remove('before:content-new-window');
        }
        article.innerHTML = article.innerHTML;
    }
}
