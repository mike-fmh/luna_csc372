var cntTextFields = []
var cntDualImages = []

$(document).ready(function () {
    /*
        Load this page's content in the default language when the page loads.
    */
    cntTextFields.push(new DualLangTextField(`/luna/text/home/div1`, $('#div1-text')));
    cntTextFields.push(new DualLangTextField(`/luna/text/home/div2`, $('#div2-text')));
    cntTextFields.push(new DualLangTextField(`/luna/text/footer`, $('#footer-text')));
    cntTextFields.push(new DualLangTextField( `/luna/text/copyright`, $('#copyright')));
    cntTextFields.push(new DualLangTextField( `/luna/text/contact/desc`, $('#contact-desc')));
    cntDualImages.push(new DualLangImage('images/buttons/globe-white-en.webp',
        'images/buttons/globe-white-es.webp', $('#change-language-img')))
    loadContentInLang(currentLang);
})

function applyMainLanguageChange(newlang) {
    /*
        Applies language change to the page's main text, this will be overriden for each page
    */
    var $contactTitle = $('#page-title');
    var $emailTitle = $('#contact-email-header');
    var $msgTitle = $('#contact-msg-header');

    // update page title, nav text, and various titles across the page
    document.title = newlang === 'es' ? 'Luna | Contacto' : 'Luna | Contact';
    $contactTitle.html(newlang === 'es' ? 'Contacto' : 'Contact Us');
    $emailTitle.html(newlang === 'es' ? 'Tu correo electrónico:' : 'Your Email:');
    $msgTitle.html(newlang === 'es' ? 'Tu Mensaje:' : 'Your Message:');
    loadContentInLang(newlang)
}

function loadContentInLang(language) {
    /*
        This is run when the page initially loads, and whenever the language is changed.
    */
    for (let i = 0; i < cntTextFields.length; i++) {
        cntTextFields[i].getText(language);
    }
    for (let i = 0; i < cntDualImages.length; i++) {
        cntDualImages[i].getImg(language);
    }
}
