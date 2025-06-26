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
document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper", {
        // تعداد اسلایدها را 5 قرار می‌دهیم تا همیشه 5 آیتم نمایش داده شود
        slidesPerView: 5,

        // فاصله بین اسلایدها (مثلاً 20 پیکسل)
        spaceBetween: 20,

        // آیتم فعال همیشه در وسط قرار می‌گیرد
        centeredSlides: true,

        loop: true,
        simulateTouch: ('ontouchstart' in window) || (navigator.maxTouchPoints > 0),
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // تابع محاسبه ارتفاع داینامیک به طور کامل حذف شده است
});