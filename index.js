//hamburger toggler
let menu = document.querySelector("#bars");
let navBar = document.querySelector(".navBar");

menu.addEventListener("click", toggleHamburger);

function toggleHamburger() {
  menu.classList.toggle("fa-times");
  navBar.classList.toggle("active");
}


//Active nav link
let section = document.querySelectorAll("section");
let navLinks = document.querySelectorAll("header .navBar a");

window.addEventListener("scroll", () => {
  menu.classList.remove("fa-times");
  navBar.classList.remove("active");

  section.forEach((sec) => {
    let top = window.scrollY;
    let height = sec.offsetHeight;
    let offset = sec.offsetTop - 150;
    let id = sec.getAttribute("id");

    if (top => offset && top < offset + height) {
      navLinks.forEach((links) => {
        links.classList.remove("active");
        document
          .querySelector("header .navBar a[href*=" + id + "]")
          .classList.add("active");
      });
    }
  });
});

// search toggle
let searchBtn = document.getElementById("search-icon");
let searchForm = document.getElementById("search-form");
let closeBtn = document.querySelector("#close");

searchBtn.addEventListener("click", () => {
  searchForm.classList.toggle("active");
});

closeBtn.addEventListener("click", () => {
  searchForm.classList.remove("active");
});

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
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});


//loader 

function loader() {
  document.querySelector('.loader').classList.add('fade-out');
}

function fadeOut() {
  setInterval(loader, 2000);
}

window.onload = fadeOut;

//heart icons
let likeIcons = document.querySelectorAll('.fa-heart');

likeIcons.forEach(likeIcon => {
  likeIcon.addEventListener('click', () => {
    likeIcon.style.color = 'red';
  }) 

  /*
  likeIcon.addEventListener('click', changeColor);
  function changeColor() {
    likeIcon.style.color = 'red';
    
    likeIcon.addEventListener('click', undoColor)
    function undoColor() {
      likeIcon.style.color = '#192a56';
    }
  } */
})



// shopping cart 
let addItemId = 0;
//let item = document.querySelectorAll('.box')
//let addToCartButtons = document.querySelectorAll('#cart-btn');
//let cartCount = document.querySelector('.item-count');
//cartCount.innerHTML = cartItem 

//addToCartButtons.forEach(cartBtn => {
//  cartBtn.addEventListener('click', addToCart)

  function addToCart(item) {
    addItemId += 1;
    let selectedItem = document.createElement('div');
    selectedItem.classList.add('itemImage');
    selectedItem.setAttribute('id',addItemId);
    let img = document.createElement('img');
    img.setAttribute('src',item.children[0].currentSrc);
    let cartItem = document.getElementById('title');
    selectedItem.append(img);
    cartItem.append(selectedItem);
  }
//});

//vendor log in form
function popupLogin() {
  document.querySelector('.vendor-login').classList.add('open-login');
}




