/*
document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper", {
        slidesPerView: 5,
        spaceBetween: 0,
        centeredSlides: true,
        loop: true,
        simulateTouch: ('ontouchstart' in window) || (navigator.maxTouchPoints > 0),
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const calculateHeight = () => {
        const swiperSlideElements = Array.from(document.querySelectorAll('.swiper .swiper-slide'));
        if (!swiperSlideElements.length) return;
        const width = swiperSlideElements[0].getBoundingClientRect().width;
        const height = Math.round(width / (16 / 9));
        swiperSlideElements.forEach(element => element.style.height = `${height}px`);
    };

    calculateHeight();
    window.addEventListener('resize', calculateHeight);
});
*/
/*
document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper", {
        slidesPerView: 5,
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        simulateTouch: ('ontouchstart' in window) || (navigator.maxTouchPoints > 0),
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});
*/
document.addEventListener("DOMContentLoaded", function () {
    new Swiper('.my-swiper', {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1.2,
        spaceBetween: 16,

        breakpoints: {
            768: {
                slidesPerView: 4,
                spaceBetween: 24,
                centeredSlides: false
            }
        }
    });
});

