// =============================================================================
// HELPER FUNCTIONS & MODULES
// =============================================================================

// Custom Cursor
function initCustomCursor() {
    const cursor = document.getElementById('custom-cursor');
    if (!cursor) return;

    const cursorDot = cursor.querySelector('.cursor-dot');
    const cursorRing = cursor.querySelector('.cursor-ring');
    const arrow = cursor.querySelector('.arrow-cursor-icon svg');
    const swiperArea = document.querySelector('.swiper-container');

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

    if (swiperArea) {
        swiperArea.addEventListener('mouseenter', () => cursor.classList.add('show-arrow'));
        swiperArea.addEventListener('mouseleave', () => cursor.classList.remove('show-arrow'));

        if (arrow) {
            swiperArea.addEventListener('mousemove', (e) => {
                const bounds = swiperArea.getBoundingClientRect();
                const centerX = bounds.left + bounds.width / 2;
                const rotateTo = e.clientX < centerX ? 180 : 0;
                arrow.style.transform = `rotate(${rotateTo}deg)`;
            });
        }
    }
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
            allowTouchMove: true,
            grabCursor: true,
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

// Logo carousel swiper (Standard Swiper)
function initLogoCarouselSwiper() {
    var logoSwiperEl = document.querySelector('.logo-swiper');
    if (typeof Swiper !== 'undefined' && logoSwiperEl) {
        new Swiper('.logo-swiper', {
            loop: true,
            spaceBetween: 30,
            allowTouchMove: false,
            speed: 8000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    speed: 5000,
                },
            }
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

// Mobile Drill Down Menu
function initMobileDrillDown() {
    const menuWrapper = document.querySelector('.mobile-menu-items-wrapper');
    const backBtnHeader = document.getElementById('mobileHeaderBack');
    const defaultHeader = document.getElementById('mobileHeaderDefault');
    const backBtn = document.getElementById('mobileMenuBackBtn');
    const currentTitle = document.getElementById('currentMenuTitle');
    const closeBtn = document.getElementById('closeMobileMenu');
    const overlay = document.getElementById('mobileMenuOverlay');

    if (!menuWrapper) return;

    // 1. Click to open submenu
    menuWrapper.addEventListener('click', function(e) {
        const clickedLink = e.target.closest('a');
        if (!clickedLink || !clickedLink.parentElement.classList.contains('menu-item-has-children')) return;

        const parentLi = clickedLink.parentElement;
        const subMenu = parentLi.querySelector('.sub-menu');
        const currentUl = parentLi.closest('ul');

        if (subMenu && currentUl) {
            e.preventDefault();

            // --- Remove duplicate links inside submenu ---
            const linkHref = clickedLink.getAttribute('href');
            subMenu.querySelectorAll('li > a').forEach(link => {
                if(link.getAttribute('href') === linkHref) link.parentElement.style.display = 'none';
            });
            // ---------------------------------------

            // A) Tell parent to slide out
            currentUl.classList.add('menu-slid-out');

            // B) Mark this item as "active branch"
            parentLi.classList.add('active-branch');

            // C) Show the submenu
            subMenu.classList.add('is-active');

            // D) Adjust header
            if(defaultHeader) defaultHeader.style.display = 'none';
            if(backBtnHeader) backBtnHeader.style.display = 'flex';
            if(currentTitle) currentTitle.textContent = clickedLink.textContent.trim();
        }
    });

    // 2. Back Button Logic
    if(backBtn) {
        backBtn.addEventListener('click', function() {
            const activeSubMenus = menuWrapper.querySelectorAll('.sub-menu.is-active');
            if (activeSubMenus.length > 0) {
                const lastSubMenu = activeSubMenus[activeSubMenus.length - 1];

                // Close submenu
                lastSubMenu.classList.remove('is-active');

                // Find parent to revert state
                const parentLi = lastSubMenu.parentElement;
                const parentUl = parentLi.closest('ul');

                if (parentUl) parentUl.classList.remove('menu-slid-out');
                if (parentLi) parentLi.classList.remove('active-branch');

                // Reshow hidden duplicate links
                lastSubMenu.querySelectorAll('li').forEach(li => li.style.display = '');

                // Manage Title
                if (activeSubMenus.length > 1) {
                    const prevMenu = activeSubMenus[activeSubMenus.length - 2];
                    const prevLink = prevMenu.parentElement.querySelector('a');
                    if(currentTitle) currentTitle.textContent = prevLink ? prevLink.textContent.trim() : '';
                } else {
                    if(defaultHeader) defaultHeader.style.display = 'block';
                    if(backBtnHeader) backBtnHeader.style.display = 'none';
                    if(currentTitle) currentTitle.textContent = '';
                }
            }
        });
    }

    // 3. Full Reset
    function resetMenu() {
        menuWrapper.querySelectorAll('.is-active').forEach(el => el.classList.remove('is-active'));
        menuWrapper.querySelectorAll('.menu-slid-out').forEach(el => el.classList.remove('menu-slid-out'));
        menuWrapper.querySelectorAll('.active-branch').forEach(el => el.classList.remove('active-branch'));

        // Reset Display
        menuWrapper.querySelectorAll('li').forEach(li => li.style.display = '');

        if(defaultHeader) defaultHeader.style.display = 'block';
        if(backBtnHeader) backBtnHeader.style.display = 'none';
        if(currentTitle) currentTitle.textContent = '';
    }

    if(closeBtn) closeBtn.addEventListener('click', () => setTimeout(resetMenu, 300));
    if(overlay) overlay.addEventListener('click', (e) => { if(e.target === overlay) setTimeout(resetMenu, 300); });
}

// Mobile Menu Toggler & Overlay
function initMobileMenuToggler() {
    const menuToggler = document.getElementById('customMenuToggler');
    const closeButton = document.getElementById('closeMobileMenu');
    const menuOverlay = document.getElementById('mobileMenuOverlay');
    const body = document.body;

    if (menuToggler && menuOverlay && closeButton) {
        function openMenu() {
            menuOverlay.classList.add('active');
            body.style.overflow = 'hidden'; // Prevent body scroll
        }

        function closeMenu() {
            menuOverlay.classList.remove('active');
            body.style.overflow = '';
        }

        menuToggler.addEventListener('click', openMenu);
        closeButton.addEventListener('click', closeMenu);
        menuOverlay.addEventListener('click', function (event) {
            if (event.target === menuOverlay) {
                closeMenu();
            }
        });
    }
}

// Infinite Logo Scroller (JS Based)
function initInfiniteLogoScroller() {
    const scroller = document.getElementById('ramanScroller');

    if (!scroller) return;

    // 1. Clone content for infinite effect
    const originalContent = scroller.innerHTML;
    scroller.innerHTML += originalContent;

    // 2. Control variables
    const speed = 0.5;
    let currentPos = 0;

    // 3. Calculate width of single set (before cloning)
    // We use scrollWidth which gives total width, then divide by 2
    let totalWidth = scroller.scrollWidth;
    let resetPoint = totalWidth / 2;

    // Update widths on resize
    window.addEventListener('resize', () => {
        totalWidth = scroller.scrollWidth;
        resetPoint = totalWidth / 2;
    });

    function animate() {
        currentPos += speed;

        // 4. Loop Condition
        // If position exceeds the single set width, reset to 0
        if (currentPos >= resetPoint) {
            currentPos -= resetPoint;
        }

        // Apply movement
        scroller.style.transform = `translateX(-${currentPos}px)`;

        requestAnimationFrame(animate);
    }

    // Start animation
    animate();
}

//Read more box in elementor text widget
function readMoreBoxElementor($) {
    setTimeout(function() {
        $('.raman-read-more-box').each(function() {
            var $widgetScope = $(this);
            var $contentBox = $widgetScope.find('.elementor-widget-container');
            if ($contentBox.length === 0) { $contentBox = $widgetScope; }

            $contentBox.css({
                'height': '200px',
                'overflow': 'hidden',
                'position': 'relative',
                'transition': 'all 0.4s ease-in-out'
            });

            var $btn = $('<button class="raman-btn-action elementor-button" style="margin-top: 15px; cursor: pointer; position: relative; z-index: 9999;">مشاهده بیشتر</button>');
            $contentBox.after($btn);
        });
    }, 500);

    $(document).on('click', '.raman-btn-action', function(e) {
        e.preventDefault();
        var $prevBox = $(this).prev();
        $prevBox.css({'height': 'auto', 'overflow': 'visible'});
        $(this).fadeOut(300, function(){ $(this).remove(); });
    });
}



// 1. Vanilla JS - DOM Ready
document.addEventListener('DOMContentLoaded', () => {

    // Custom Cursor
    if (!document.body.classList.contains('elementor-editor-active')) {
        initCustomCursor();
    }

    // Parallax img in cta form
    parallaxImageCtaFrom();

    // Portfolio Swiper
    initPortfolioSwiper();

    // Logo Carousel Swiper (Standard)
    initLogoCarouselSwiper();

    // Add mega menu
    addMegaMenu();

    // Effect tel number in header
    telNumberHeaderEffect();

    // Step Carousel Swiper
    stepCarouselSwiper();

    // Header scroll effect
    initHeaderScrollEffect();

    // Mobile Menu
    initMobileDrillDown();
    initMobileMenuToggler();

});

// 2. Vanilla JS - Window Load (For precise dimension calculations)
window.addEventListener('load', function() {
    // Infinite Scroller requires fully loaded images for width calculation
    initInfiniteLogoScroller();
});

// 3. jQuery
jQuery(function($) {
    // Preloader
    initPreloader($);

    // Counter history work
    initCounterHistoryWork($);

    //Read more box in elementor text widget
    readMoreBoxElementor($);
});

jQuery(document).ready(function($) {

    // متغیرهای سراسری
    var currentTermId = 'all';
    var currentPage = 1;

    function fetch_portfolio_posts(append = false) {
        var $loadMoreBtn = $('#raman-load-more');
        var $spinner = $loadMoreBtn.find('.spinner-border');

        $spinner.removeClass('d-none');
        $loadMoreBtn.prop('disabled', true);

        if (!append) {
            $('#portfolio-results').css('opacity', '0.5');
        }

        console.log('Sending AJAX Request with:', {
            page: currentPage,
            term_id: currentTermId
        });

        $.ajax({
            url: ra_object.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'filter_portfolio',
                nonce: ra_object.nonce,
                page: currentPage,
                // اطمینان از اینکه مقدار خالی ارسال نمی‌شود
                term_id: currentTermId || 'all'
            },
            success: function(response) {
                if (response.success) {
                    var data = response.data;
                    console.log('Response Found:', data.found); // لاگ تعداد پیدا شده

                    if (append) {
                        $('#portfolio-results').append(data.html);
                    } else {
                        $('#portfolio-results').html(data.html);
                        $('#portfolio-results').css('opacity', '1');
                    }

                    $loadMoreBtn.data('page', currentPage);

                    // مدیریت نمایش دکمه
                    if (currentPage >= data.max_page || data.max_page === 0) {
                        $('.portfolio-pagination').hide();
                    } else {
                        $('.portfolio-pagination').show();
                    }

                    if(data.found === 0 && !append) {
                        $('#portfolio-results').html('<div class="col-12"><p class="text-center alert alert-warning">در این دسته‌بندی نمونه‌کاری یافت نشد.</p></div>');
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            },
            complete: function() {
                $spinner.addClass('d-none');
                $loadMoreBtn.prop('disabled', false);
            }
        });
    }

    // رویداد کلیک روی تب‌های فیلتر
    $('.filter-btn').on('click', function(e) {
        e.preventDefault();

        $('.filter-btn').removeClass('active');
        $(this).addClass('active');

        // استفاده از attr برای اطمینان بیشتر در خواندن DOM
        var clickedId = $(this).attr('data-id');

        // لاگ برای اینکه ببینیم چی خونده میشه
        console.log('Button Clicked. Raw Data-ID:', clickedId);

        if (typeof clickedId === 'undefined' || clickedId === false) {
            console.warn('Warning: data-id attribute is missing on this button! Defaulting to "all". Check your PHP shortcode.');
            currentTermId = 'all';
        } else {
            currentTermId = clickedId;
        }

        currentPage = 1;
        fetch_portfolio_posts(false);
    });

    // رویداد کلیک روی دکمه لود مور
    $(document).on('click', '#raman-load-more', function(e) {
        e.preventDefault();
        currentPage++;
        fetch_portfolio_posts(true);
    });

});