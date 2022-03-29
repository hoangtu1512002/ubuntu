window.addEventListener("load", function() {
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$('.content__tab-link');
    const panes = $$('.content__tab-items');

    tabs.forEach((tab, index) => {
        const pane = panes[index];

        tab.onclick = function(e) {
            e.preventDefault();

            $('.content__tab-link.active').classList.remove('active');
            $('.content__tab-items.active').classList.remove('active');

            this.classList.add('active');
            pane.classList.add('active');
        }
    });
});

window.addEventListener("load", function() {
    const $ = document.querySelector.bind(document);

    const slideTrack = $('.content__slide-range');
    const bar = $('.content__progess-bar');
    const thumb = $('.content__slide-thumb');
    const price = $('.content__value');

    price.textContent = slideTrack.value + '$';
    slideTrack.oninput = function() {
        let value = slideTrack.value;
        thumb.style.left = value + '%'
        bar.style.width = value + '%';
        price.textContent = value + '$';

    };
});

window.addEventListener("load", function() {
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const navLinks = $$('.admin__nav-link');
    const menuChilds = $$('.admin__menu-child');

    navLinks.forEach((navLink, index) => {

        const menuChild = menuChilds[index];

        navLink.onclick = function(e) {
            e.preventDefault();

            $('.admin__nav-link.active').classList.remove('active');
            $('.admin__menu-child.active').classList.remove('active');

            this.classList.add('active');
            menuChild.classList.add('active');
        }
    });

});


window.addEventListener("load", function() {
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
})


function del(name) {
    return confirm('bạn có muốn xóa ' + name + ' này không?');
}