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
// Custom Cursor
document.addEventListener('DOMContentLoaded', () => {
    const cursor = document.getElementById('custom-cursor');
    const cursorDot = cursor.querySelector('.cursor-dot');
    const cursorRing = cursor.querySelector('.cursor-ring');
    const arrow = cursor.querySelector('.arrow-cursor-icon svg');
    const swiperArea = document.querySelector('.swiper-container');
    const interactiveElements = document.querySelectorAll('button, .ra-btn');

    let mouseX = 0, mouseY = 0;
    let ringX = 0, ringY = 0;
    const ringLag = 0.1;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursorDot.style.left = `${mouseX}px`;
        cursorDot.style.top = `${mouseY}px`;
    });

    function animate() {
        ringX += (mouseX - ringX) * ringLag;
        ringY += (mouseY - ringY) * ringLag;

        cursorRing.style.left = `${ringX}px`;
        cursorRing.style.top = `${ringY}px`;

        requestAnimationFrame(animate);
    }
    animate();

    if (swiperArea) {
        swiperArea.addEventListener('mouseenter', () => {
            cursor.classList.add('show-arrow');
        });

        swiperArea.addEventListener('mouseleave', () => {
            cursor.classList.remove('show-arrow');
        });

        swiperArea.addEventListener('mousemove', (e) => {
            const bounds = swiperArea.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const rotateTo = e.clientX < centerX ? 180 : 0;
            arrow.style.transition = 'transform 0.3s ease';
            arrow.style.transform = `rotate(${rotateTo}deg)`;
        });
    }

    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            if (el.classList.contains('ra-btn')) {
                cursor.classList.add('ra-btn-hover');
            }
        });

        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('ra-btn-hover');
        });
    });
});

//swiper raman step projects
const raStepWorkTop = new Swiper('.ra-step-work-top', {
    loop: false,
    spaceBetween: 0,
    slidesPerView: 3,
    centeredSlides: true,
    grabCursor: true,
    navigation: {
        nextEl: '.ra-step-work-button-next',
        prevEl: '.ra-step-work-button-prev'
    },
    pagination: {
        el: '.ra-step-work-pagination',
        clickable: true
    },
    effect: 'coverflow',
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
        scale: 0.85
    }
});
const raStepWorkBottom = new Swiper('.ra-step-work-bottom', {
    loop: false,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    allowTouchMove: false
});

raStepWorkTop.controller.control = raStepWorkBottom;
raStepWorkBottom.controller.control = raStepWorkTop;

//parallex img in cta form
document.addEventListener("DOMContentLoaded", () => {
    const leftLoop = document.querySelector(".left-column-img .img-loop");
    const rightLoop = document.querySelector(".right-column-img .img-loop");

    let leftOffset = 0;
    let rightOffset = 0;
    let targetDelta = 0;
    let scrollY = window.scrollY;

    function animate() {
        const newScrollY = window.scrollY;
        const scrollDiff = newScrollY - scrollY;
        scrollY = newScrollY;

        targetDelta = targetDelta * 0.9 + scrollDiff * 0.1;

        leftOffset -= targetDelta * 0.5;
        rightOffset += targetDelta * 0.5;

        const loopHeight = leftLoop.scrollHeight / 2;

        if (leftOffset >= loopHeight) leftOffset -= loopHeight;
        if (leftOffset <= 0) leftOffset += loopHeight;

        if (rightOffset >= loopHeight) rightOffset -= loopHeight;
        if (rightOffset <= 0) rightOffset += loopHeight;

        leftLoop.style.transform = `translateY(-${leftOffset}px)`;
        rightLoop.style.transform = `translateY(-${rightOffset}px)`;

        requestAnimationFrame(animate);
    }

    animate();
});
