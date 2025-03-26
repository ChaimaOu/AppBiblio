
/*=============== PROFILE PHOTO SHOW BAR ===============*/
const profile = document.querySelector('nav .profile');
const imgProfile = document.querySelector('.profile-img');
const dropdownProfile = document.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
    dropdownProfile.classList.toggle('show'); 
})

window.addEventListener('click', function (e) {
    if(e.target !== imgProfile){
        if(e.target !== dropdownProfile){
            if(dropdownProfile.classList.contains('show')) {
                dropdownProfile.classList.remove('show');
            }
        }
    }
})



/*=============== notification show ===============*/
const notification = document.querySelector('nav .notification');
const iconNotification = document.querySelector('.notification-button');
const dropdownNotification = document.querySelector('.notification-link');

iconNotification.addEventListener('click', function () {
    dropdownNotification.classList.toggle('show'); 
})

window.addEventListener('click', function (e) {
    if(e.target !== iconNotification){
        if(e.target !== dropdownNotification){
            if(dropdownNotification.classList.contains('show')) {
                dropdownNotification.classList.remove('show');
            }
        }
    }
})




/*=============== ADD SHADOW HEADER ===============*/
const shadowHeader = () => {
    const header = document.getElementById('header')
    this.scrollY >= 50 ? header.classList.add('shadow-header')
                       : header.classList.remove('shadow-header')
}
window.addEventListener('scroll', shadowHeader)

/*=============== HOME SWIPER ===============*/


let swiperHome = new Swiper('.home_swiper', {
    loop: true,
    spaceBetween: -24,
    grabCursor: true,
    slidesPerView: 'auto',
    centeredSlides: 'auto',

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    breakpoints: {
        1220: {
            spaceBetween: -32,
        }
    }

  })

/*=============== FEATURED SWIPER ===============*/
let swiperFeatured = new Swiper('.featured_swiper', {
    loop: true,
    spaceBetween: 16,
    grabCursor: true,
    slidesPerView: 'auto',
    centeredSlides: 'auto',

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },


    breakpoints: {
        1150: {
            slidesPerView: 4,
            centeredSlides: false,
        }
    }

  })

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () => {
    const scrollUp = document.getElementById('scroll-up')
    this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
                        : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)


/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 200,
   // reset: true //this one is for animation repeat
})

sr.reveal('.home_data, .featured_container, footer')
sr.reveal('.home_images', {delay: 600})