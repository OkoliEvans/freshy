//hamburger toggler 
let menu = document.querySelector('#bars');
let navBar = document.querySelector('.navBar');

menu.addEventListener('click', toggleHamburger);

function toggleHamburger() {
    menu.classList.toggle('fa-times');
    navBar.classList.toggle('active');
}


window.addEventListener('scroll', () => {
    menu.classList.remove('fa-times');
    navBar.classList.remove('active');
})

// search toggle
let searchBtn = document.getElementById('search-icon');
let searchForm = document.getElementById('search-form');
let closeBtn = document.querySelector('#close');

searchBtn.addEventListener('click', () => {
    searchForm.classList.toggle('active');
})

closeBtn.addEventListener('click', () => {
    searchForm.classList.remove('active');
})

// Swiper for Review
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView:2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});


















