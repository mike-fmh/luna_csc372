var galTextFields = []
var galDualImages = []

document.addEventListener('DOMContentLoaded', function () {
    /*
        Load this page's content in the default language when the page loads.
    */
    galTextFields.push(new DualLangTextField(`/luna/text/footer`, document.getElementById('footer-text')));
    galTextFields.push(new DualLangTextField( `/luna/text/copyright`, document.getElementById('copyright')));
    /* when we fetch the text from the server, we need a fullpath that included 'luna'.
    * when we set the image div in a duallangimage, we don't need 'luna'*/
    galDualImages.push(new DualLangImage('images/buttons/globe-white-en.webp', 'images/buttons/globe-white-es.webp', document.getElementById('change-language-img')))
    loadContentInLang(currentLang);
    loadGallery();
})

function applyMainLanguageChange(newlang) {
    /*
        Applies language change to the page's main text, this will be overriden for each page
    */

    document.title = newlang === 'es' ? 'Luna | Medios' : 'Luna | Media';
    loadContentInLang(newlang)
}

function loadContentInLang(language) {
    /*
        This is run when the page initially loads, and whenever the language is changed.
    */
    for (let i = 0; i < galTextFields.length; i++) {
        galTextFields[i].getText(language);
    }
    for (let i = 0; i < galDualImages.length; i++) {
        galDualImages[i].getImg(language);
    }
}

function loadGallery() {
    document.getElementById('gallery-placeholder').remove(); /* remove the placeholder "loading gallery" text */

    let pictures = ['068A62F9.jpeg', '468D91AF.jpeg', 'Orquidias.jpg', 'P1000427.jpg'];
    let galleryDiv = document.getElementById('main-gallery-container');
    for (let i = 0; i < pictures.length; i++) {
        let imgDiv = document.createElement('div');
        imgDiv.className = 'gallery-container';
        let img = document.createElement('img');
        img.className = 'gallery-img';
        img.src = `images/gallery/${pictures[i]}`;

        imgDiv.appendChild(img); /* put the image inside its div */
        galleryDiv.appendChild(imgDiv); /* put the div inside the gallery */
    }
}