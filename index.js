//hamburger toggler 
let menu = document.querySelector('#bars');
let navBar = document.querySelector('.navBar');

menu.addEventListener('click', toggleHamburger);

function toggleHamburger() {
    menu.classList.toggle('fa-times');
    navBar.classList.toggle('active');
}

//@notice:: resolve on media query
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

