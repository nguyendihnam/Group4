let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

/* This is a function that toggles the class `fa-times` and `active` on the menu and navbar when the
user clicks on the menu button. */
menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

/* This is a function that removes the class `fa-times` and `active` from the menu and navbar when the
user scrolls. */
window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

/* This is a function that changes the main image when the user clicks on the thumbnail image. */
document.querySelectorAll('.image-slider img').forEach(images => {
    images.onclick = () => {
        var src = images.getAttribute('src');
        document.querySelector('.main-home-image').src = src;
    };
});
