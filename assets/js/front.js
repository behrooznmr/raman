
// Custom Cursor
function initCustomCursor() {
    const cursor = document.getElementById('custom-cursor');
    if (!cursor) return;

    const cursorDot = cursor.querySelector('.cursor-dot');
    const cursorRing = cursor.querySelector('.cursor-ring');

    const interactiveSelector = 'button, a, .ra-btn, .gform-button, .ra-step-work-button-next, .ra-step-work-button-prev, .menu-item a, .ra-mega-list-item';

    document.body.addEventListener('mouseenter', (event) => {
        if (event.target.closest(interactiveSelector)) {
            cursor.classList.add('ra-btn-hover');
        }
    }, true);

    document.body.addEventListener('mouseleave', (event) => {
        if (event.target.closest(interactiveSelector)) {
            cursor.classList.remove('ra-btn-hover');
        }
    }, true);

    let mouseX = 0,
        mouseY = 0;
    let ringX = 0,
        ringY = 0;
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
}

// Parallax image in cta form
function parallaxImageCtaFrom() {
    const leftLoop = document.querySelector(".left-column-img .img-loop");
    const rightLoop = document.querySelector(".right-column-img .img-loop");
    if (!leftLoop || !rightLoop) return;

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
}

// Portfolio swiper
function initPortfolioSwiper() {
    var swiperEl = document.querySelector('.swiper-container');
    if (typeof Swiper !== 'undefined' && swiperEl) {
        new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    }
}

// Logo carousel swiper
function initLogoCarouselSwiper() {
    var logoSwiperEl = document.querySelector('.logo-swiper');
    if (typeof Swiper !== 'undefined' && logoSwiperEl) {
        new Swiper('.logo-swiper', {
            loop: true,
            slidesPerView: 7,
            spaceBetween: 30,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            speed: 8000,
            allowTouchMove: false,
        });
    }
}

// Step carousel
function stepCarouselSwiper() {
    var topEl = document.querySelector('.ra-step-work-top');
    var bottomEl = document.querySelector('.ra-step-work-bottom');

    if (typeof Swiper !== 'undefined' && topEl && bottomEl) {
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
    }
}

// Tel number in header effect
function telNumberHeaderEffect() {
    const btn = document.querySelector(".header-call-btn");
    if (!btn) return;

    const numberEl = btn.querySelector("strong");
    if (!numberEl) return;

    const originalNumber = numberEl.textContent.trim();
    const digits = "0123456789";

    function scrambleEffect() {
        let iterations = 0;
        const maxIterations = 15;
        const interval = setInterval(() => {
            numberEl.textContent = originalNumber
                .split("")
                .map((char) => {
                    if (!isNaN(char) && iterations < maxIterations) {
                        return digits[Math.floor(Math.random() * 10)];
                    }
                    return char;
                })
                .join("");

            iterations++;
            if (iterations > maxIterations) {
                clearInterval(interval);
                numberEl.textContent = originalNumber;
            }
        }, 50);
    }

    btn.addEventListener("mouseenter", scrambleEffect);
    btn.addEventListener("mouseleave", scrambleEffect);
}

// Add class to header after scroll
function initHeaderScrollEffect() {
    const header = document.querySelector('header.ra-header');
    if (!header) return;

    const SCROLL_THRESHOLD = 50;
    let ticking = false;

    window.addEventListener('scroll', function () {
        if (!ticking) {
            window.requestAnimationFrame(function () {
                const scrollPosition = window.scrollY || document.documentElement.scrollTop;
                if (scrollPosition > SCROLL_THRESHOLD) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
                ticking = false;
            });
            ticking = true;
        }
    });
}

// Megamenu
function addMegaMenu() {
    if (typeof raMegaData === 'undefined' || !raMegaData.menus) {
        return;
    }

    const megaMenuContainer = document.createElement('div');
    megaMenuContainer.id = 'ra-megamenu-container';
    document.body.appendChild(megaMenuContainer);

    const megaMenus = {};

    for (const menuId in raMegaData.menus) {
        const menuEl = document.createElement('div');
        menuEl.classList.add('ra-megamenu');
        menuEl.dataset.menuId = menuId;
        menuEl.innerHTML = raMegaData.menus[menuId];
        megaMenuContainer.appendChild(menuEl);
        megaMenus[menuId] = menuEl;
    }

    const triggers = document.querySelectorAll('[data-megamenu-id]');
    let hideTimeout;

    triggers.forEach(trigger => {
        const menuId = trigger.dataset.megamenuId;
        const megaMenu = megaMenus[menuId];

        if (!megaMenu) {
            return;
        }

        trigger.addEventListener('mouseenter', () => {
            clearTimeout(hideTimeout);
            document.querySelectorAll('.ra-megamenu.is-visible').forEach(m => m.classList.remove('is-visible'));
            megaMenu.classList.add('is-visible');
        });

        trigger.addEventListener('mouseleave', () => {
            hideTimeout = setTimeout(() => {
                megaMenu.classList.remove('is-visible');
            }, 200);
        });

        megaMenu.addEventListener('mouseenter', () => {
            clearTimeout(hideTimeout);
        });

        megaMenu.addEventListener('mouseleave', () => {
            megaMenu.classList.remove('is-visible');
        });
    });
}

// Preloader (jQuery)
function initPreloader($) {
    if ($('#preloader').length) {
        const $preloader = $('#preloader');
        const $percentageText = $preloader.find('.preloader-percentage');
        const $progressLine = $preloader.find('.line');

        let currentTargetPercent = 0;
        let displayedPercent = 0;
        let animationFrameId = null;

        const $images = $('img');
        const totalImages = $images.length;
        let loadedImages = 0;

        function updateProgressUI(percent) {
            $percentageText.text(Math.round(percent) + '%');
            $progressLine.css('--progress', percent + '%');
        }

        function animationLoop() {
            if (displayedPercent < currentTargetPercent) {
                displayedPercent += (currentTargetPercent - displayedPercent) * 0.05;
            }

            if (currentTargetPercent - displayedPercent < 0.1) {
                displayedPercent = currentTargetPercent;
            }

            updateProgressUI(displayedPercent);

            if (displayedPercent >= 100) {
                finalizeLoader();
                return;
            }

            animationFrameId = requestAnimationFrame(animationLoop);
        }

        function finalizeLoader() {
            updateProgressUI(100);
            cancelAnimationFrame(animationFrameId);

            setTimeout(function () {
                $preloader.addClass('preloader-hidden');
                if ($('.animated-text').length) {
                    $('.animated-text').addClass('start-animation');
                }
            }, 600);
        }

        if (totalImages === 0) {
            currentTargetPercent = 100;
        } else {
            $images.each(function () {
                $(this).on('load error', function () {
                    loadedImages++;
                    currentTargetPercent = (loadedImages / totalImages) * 100;
                });
            });
        }

        $(window).on('load', function () {
            currentTargetPercent = 100;
        });

        animationLoop();
    }
}

// Counter for history work (jQuery)
function initCounterHistoryWork($) {
    if ($('.data-num').length) {
        function animateCounter(element) {
            const target = +$(element).attr('data-target');
            const duration = 2000;
            const stepTime = 20;
            let currentNum = 0;
            const steps = duration / stepTime;
            const increment = target / steps;

            const updateCount = () => {
                currentNum += increment;
                if (currentNum >= target) {
                    $(element).text(target + ($(element).text().includes('%') ? '%' : ''));
                    return;
                }
                $(element).text(Math.ceil(currentNum) + ($(element).text().includes('%') ? '%' : ''));
                setTimeout(updateCount, stepTime);
            };
            updateCount();
        }

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        $('.data-num').each(function () {
            observer.observe(this);
        });
    }
}


// =============================================================================
// SCRIPT EXECUTION
// =============================================================================

// (Vanilla JS)
document.addEventListener('DOMContentLoaded', () => {

    // Custom Cursor
    if (!document.body.classList.contains('elementor-editor-active')) {
        initCustomCursor();
    }

    // Parallax img in cta form
    parallaxImageCtaFrom();

    // Portfolio Swiper
    initPortfolioSwiper();

    // Logo Carousel Swiper
    initLogoCarouselSwiper();

    // Add mega menu
    addMegaMenu();

    // Effect tel number in header
    telNumberHeaderEffect();

    // Step Carousel Swiper
    stepCarouselSwiper();

    // Header scroll effect
    initHeaderScrollEffect();

});

// (jQuery)
jQuery(function($) {
    // Preloader
    initPreloader($);

    // Counter history work
    initCounterHistoryWork($);
});
