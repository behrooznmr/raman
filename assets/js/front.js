(function ($) {
    // Preloader
    if ($('#preloader').length) {
        const $preloader = $('#preloader');
        const $percentageText = $preloader.find('.preloader-percentage');
        let currentTargetPercent = 0;
        let displayedPercent = 0;
        let animationFrameId = null;
        const $images = $('img');
        const totalImages = $images.length;
        let loadedImages = 0;

        function updateProgressUI(percent) {
            $percentageText.text(Math.round(percent) + '%');
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

    // Counter history work
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

    // Mega Menu Logic (jQuery Version for best compatibility)
    jQuery(document).ready(function($) {
        console.log("اسکریپت منو (نسخه نهایی jQuery) اجرا شد!");

        const burger = $(".header__burger");
        const navWrapper = $(".header__navigation-wrapper");

        burger.on('click', function() {
            burger.toggleClass("active");
            navWrapper.toggleClass("open");
        });

        $(".header__list-item.has-submenu").on('click', function(e) {
            if (window.innerWidth > 1024) return;

            if ($(e.target).closest('a').is($(this).children('a'))) {
                e.preventDefault();
            }

            $(this).toggleClass("active");
            const submenuWrapper = $(this).find(".submenu-wrapper");

            // Use '0px' for comparison with jQuery's .css() method
            if (submenuWrapper.css("max-height") !== "0px" && submenuWrapper.css("max-height") !== "") {
                submenuWrapper.css("max-height", "0px");
            } else {
                submenuWrapper.css("max-height", submenuWrapper[0].scrollHeight + "px");
            }
        });

        $(window).on('resize', function() {
            if (window.innerWidth > 1024) {
                $(".submenu-wrapper").css("max-height", "");
                $(".header__list-item.has-submenu.active").removeClass("active");
                burger.removeClass("active");
                navWrapper.removeClass("open");
            }
        });

        $(".submenu-wrapper").each(function() {
            const submenuWrapper = $(this);
            const submenuItems = submenuWrapper.find(".submenu-list__item.has-submenu");
            const defaultActiveItem = submenuWrapper.find(".submenu-list__item.has-submenu.active");
            let returnTimeout;

            submenuItems.on('mouseenter', function() {
                clearTimeout(returnTimeout);
                submenuItems.removeClass("active");
                $(this).addClass("active");
            });

            submenuWrapper.on('mouseleave', function() {
                submenuItems.removeClass("active");
                returnTimeout = setTimeout(function() {
                    if (defaultActiveItem.length) {
                        defaultActiveItem.addClass("active");
                    }
                }, 300);
            });
        });
    });

})(jQuery);


document.addEventListener('DOMContentLoaded', () => {

    // Custom Cursor
    if (!document.body.classList.contains('elementor-editor-active')) {
        const cursor = document.getElementById('custom-cursor');
        if (cursor) {
            const cursorDot = cursor.querySelector('.cursor-dot');
            const cursorRing = cursor.querySelector('.cursor-ring');
            const arrow = cursor.querySelector('.arrow-cursor-icon svg');
            const swiperArea = document.querySelector('.swiper-container');
            const interactiveElements = document.querySelectorAll(
                'a, button, .ra-btn, .gform-button, .ra-step-work-button-next, .ra-step-work-button-prev'
            );

            let mouseX = 0, mouseY = 0;
            let ringX = 0, ringY = 0;
            const ringLag = 0.1;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                cursorDot.style.left = `${mouseX}px`;
                cursorDot.style.top = `${mouseY}px`;
            });

            function animateCursor() {
                ringX += (mouseX - ringX) * ringLag;
                ringY += (mouseY - ringY) * ringLag;
                cursorRing.style.left = `${ringX}px`;
                cursorRing.style.top = `${ringY}px`;
                requestAnimationFrame(animateCursor);
            }
            animateCursor();

            if (swiperArea) {
                swiperArea.addEventListener('mouseenter', () => cursor.classList.add('show-arrow'));
                swiperArea.addEventListener('mouseleave', () => cursor.classList.remove('show-arrow'));
                swiperArea.addEventListener('mousemove', (e) => {
                    const bounds = swiperArea.getBoundingClientRect();
                    const centerX = bounds.left + bounds.width / 2;
                    const rotateTo = e.clientX < centerX ? 180 : 0;
                    arrow.style.transform = `rotate(${rotateTo}deg)`;
                });
            }

            interactiveElements.forEach(el => {
                el.addEventListener('mouseenter', () => cursor.classList.add('ra-btn-hover'));
                el.addEventListener('mouseleave', () => cursor.classList.remove('ra-btn-hover'));
            });
        }
    }

    // Parallax Img in CTA Form
    const leftLoop = document.querySelector(".left-column-img .img-loop");
    const rightLoop = document.querySelector(".right-column-img .img-loop");
    if (leftLoop && rightLoop) {
        let leftOffset = 0;
        let rightOffset = 0;
        let targetDelta = 0;
        let scrollY = window.scrollY;

        function animateParallax() {
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
            requestAnimationFrame(animateParallax);
        }
        animateParallax();
    }

    // Swipers
    if (typeof Swiper !== 'undefined') {
        if (document.querySelector('.swiper-container')) {
            new Swiper('.swiper-container', { loop: true, slidesPerView: 1, navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }, pagination: { el: '.swiper-pagination' } });
        }
        if (document.querySelector('.logo-swiper')) {
            new Swiper('.logo-swiper', { loop: true, slidesPerView: 7, spaceBetween: 30, autoplay: { delay: 0, disableOnInteraction: false }, speed: 8000, allowTouchMove: false });
        }
        if (document.querySelector('.ra-step-work-top') && document.querySelector('.ra-step-work-bottom')) {
            const raStepWorkTop = new Swiper('.ra-step-work-top', { loop: false, spaceBetween: 0, slidesPerView: 3, centeredSlides: true, grabCursor: true, navigation: { nextEl: '.ra-step-work-button-next', prevEl: '.ra-step-work-button-prev' }, pagination: { el: '.ra-step-work-pagination', clickable: true }, effect: 'coverflow', coverflowEffect: { rotate: 0, stretch: 0, depth: 100, modifier: 1, slideShadows: false, scale: 0.85 } });
            const raStepWorkBottom = new Swiper('.ra-step-work-bottom', { loop: false, effect: 'fade', fadeEffect: { crossFade: true }, allowTouchMove: false });
            raStepWorkTop.controller.control = raStepWorkBottom;
            raStepWorkBottom.controller.control = raStepWorkTop;
        }
    }

    // Tel Number in Header
    const btn = document.querySelector(".header-call-btn");
    if (btn) {
        const numberEl = btn.querySelector("strong");
        if (numberEl) {
            const originalNumber = numberEl.textContent.trim();
            const digits = "0123456789";
            function scrambleEffect() {
                let iterations = 0;
                const maxIterations = 15;
                const interval = setInterval(() => {
                    numberEl.textContent = originalNumber.split("").map((char) => {
                        if (!isNaN(char) && iterations < maxIterations) {
                            return digits[Math.floor(Math.random() * 10)];
                        }
                        return char;
                    }).join("");
                    iterations++;
                    if (iterations > maxIterations) {
                        clearInterval(interval);
                        numberEl.textContent = originalNumber;
                    }
                }, 50);
            }
            btn.addEventListener("mouseenter", scrambleEffect);
        }
    }

    // Add class in header after scroll
    const header = document.querySelector('header.ra-header');
    if (header) {
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
});