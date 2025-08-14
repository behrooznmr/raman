<?php
/**
 * Template Name: Home page
 *
 * @package WordPress
 * @subpackage Raman Theme
 * @since Raman Theme v1.0
 */
wp_head();
get_header();
?>

    <div style="direction:rtl" class="raman-home-page container-fluid p-0">
        <section class="ra-header row">
            <div class="ra-header-wrapper">
                <div class="site-logo">
                    <a href="<?php home_url(); ?>">
                        <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.png"
                                alt="raman-logo">
                    </a>
                </div>
                <div class="menu-wrapper">
					<?php
					wp_nav_menu( array(
						'theme_location'  => 'main-menu',
						'depth'           => 2,
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'mainNav',
						'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
						'fallback_cb'     => '__return_false',
						'walker'          => new WP_Bootstrap_Navwalker(),
					) );
					?>

                </div>
                <div class="header-call">
                    <a class="ra-btn" href="tel:09306625562">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2376 3.43749C17.3136 3.43749 17.7899 3.43844 18.1827 3.4736C22.5493 3.86456 26.0099 7.3252 26.4009 11.6918C26.4361 12.0846 26.437 12.5608 26.437 13.6369V14.8744C26.437 15.3921 26.8567 15.8119 27.3745 15.8119C27.8923 15.8119 28.312 15.3921 28.312 14.8744V13.5739C28.312 12.5778 28.312 12.0117 28.2684 11.5246C27.7966 6.25456 23.6199 2.07791 18.3499 1.60607C17.8628 1.56246 17.2967 1.56247 16.3005 1.56249H15.0001C14.4824 1.56249 14.0626 1.98223 14.0626 2.49999C14.0626 3.01776 14.4824 3.4375 15.0001 3.4375L16.2376 3.43749Z"
                                  fill="#10B358"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.88979 5.03162C7.57468 3.8232 5.55324 3.8232 4.23813 5.03162C4.18427 5.0811 4.12678 5.13861 4.05213 5.21328L2.93024 6.33516C1.80135 7.46405 1.32745 9.09145 1.67378 10.6499C3.63874 19.4923 10.5444 26.3979 19.3867 28.3629C20.9452 28.7092 22.5726 28.2353 23.7015 27.1064L24.8233 25.9847C24.898 25.9099 24.9555 25.8524 25.005 25.7985C26.2135 24.4834 26.2135 22.462 25.005 21.1469C24.9555 21.093 24.898 21.0355 24.8233 20.9608L22.9867 19.1242C21.7116 17.8491 19.7859 17.4844 18.1328 18.2049C17.1864 18.6175 16.084 18.4087 15.354 17.6787L12.358 14.6827C11.628 13.9527 11.4192 12.8502 11.8317 11.9038C12.5523 10.2508 12.1876 8.3251 10.9125 7.04998L9.07582 5.21331C9.00115 5.13862 8.94365 5.08111 8.88979 5.03162ZM5.50676 6.41227C6.10454 5.86299 7.02338 5.86299 7.62115 6.41227C7.64179 6.43123 7.66883 6.45797 7.76392 6.55306L9.58666 8.3758C10.3167 9.10581 10.5254 10.2082 10.1129 11.1546C9.39235 12.8077 9.75704 14.7334 11.0322 16.0085L14.0282 19.0045C15.3033 20.2796 17.229 20.6443 18.882 19.9237C19.8284 19.5112 20.9309 19.72 21.6609 20.45L23.4836 22.2727C23.5787 22.3678 23.6054 22.3949 23.6244 22.4155C24.1737 23.0133 24.1737 23.9321 23.6244 24.5299C23.6054 24.5505 23.5787 24.5776 23.4836 24.6727L22.3757 25.7806C21.7001 26.4562 20.7262 26.7398 19.7935 26.5325C11.6618 24.7255 5.31117 18.3748 3.50413 10.2432C3.29687 9.3105 3.58048 8.33658 4.25607 7.66099L5.364 6.55306C5.45908 6.45797 5.48613 6.43123 5.50676 6.41227Z"
                                  fill="#10B358"/>
                            <path d="M15.8839 5.98191C15.3661 5.98191 14.9464 6.40164 14.9464 6.91941C14.9464 7.43718 15.3661 7.85691 15.8839 7.85691H16.591C16.6046 7.85691 16.6172 7.85691 16.629 7.85691C16.7111 7.85692 16.7492 7.857 16.781 7.85746C19.6555 7.89862 21.9757 10.2189 22.0169 13.0933C22.0174 13.1297 22.0174 13.1743 22.0174 13.2834V13.9905C22.0174 14.5082 22.4372 14.928 22.9549 14.928C23.4727 14.928 23.8924 14.5082 23.8924 13.9905V13.2743C23.8924 13.2622 23.8924 13.2506 23.8924 13.2396C23.8924 13.1625 23.8924 13.1116 23.8917 13.0665C23.836 9.17749 20.6969 6.03835 16.8079 5.98265C16.7563 5.98191 16.6972 5.98191 16.6 5.98191H15.8839Z"
                                  fill="#10B358"/>
                        </svg>
                        <span>
                         <div>
                            مشاوره رایگان
                        </div>
                        <strong>
                              09306625562
                        </strong>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <script>
            window.addEventListener('scroll', function () {
                const header = document.querySelector('section.ra-header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        </script>
        <div class="main-wrapper d-flex flex-column">
            <div style="background-color:#030303" class="raman-container flex-grow-1 p-0">

                <div class="ra-hero-section row p-0">
                    <!--hero section-->
                    <div class="col-12 p-0">
                        <div class="min-vh-100 w-100 hero-section-bc-img hero-section-overlay">
                            <h1>
                                آژانــس خلاقــیت <span>رامـــان</span>
                            </h1>
                            <div style="direction:ltr" class="en-title animated-text">
                                <span>R</span><span>A</span><span>M</span><span>A</span><span>N</span>
                                <span class="space"> </span>
                                <span>C</span><span>R</span><span>E</span><span>A</span><span>T</span><span>I</span><span>V</span><span>E</span>
                                <span class="space"> </span>
                                <span>A</span><span>G</span><span>E</span><span>N</span><span>C</span><span>Y</span>
                            </div>
                            <p>ارائه دهنده خدمات طراحی سایت، سئو و بهینه سازی سایت، طراحی لندینگ پیج، افزایش امنیت
                                سایت، افزایش سرعت سایت و مشاوره کسب و کار</p>
                            <div class="glow-button-wrapper">
                                <a href="#" class="ra-btn glow-button">
                                    دریافت مشاوره رایگان
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="#010101" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-arrow-up-right">
                                        <path d="M7 7h10v10"/>
                                        <path d="M7 17 17 7"/>
                                    </svg>

                                    <span class="animated-border-box-glow"></span>
                                    <span class="animated-border-box"></span>
                                </a>
                            </div>
                            <!--</div>-->
                            <div class="logo-carousel">
                                <div class="carousel-track">
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/1.png"
                                                alt="Logo 1"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/2.png"
                                                alt="Logo 2"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/3.png"
                                                alt="Logo 3"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/4.png"
                                                alt="Logo 4"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/5.png"
                                                alt="Logo 5"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/6.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/7.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/8.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/9.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/10.png"
                                                alt="Logo 6"></div>

                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/1.png"
                                                alt="Logo 1"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/2.png"
                                                alt="Logo 2"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/3.png"
                                                alt="Logo 3"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/4.png"
                                                alt="Logo 4"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/5.png"
                                                alt="Logo 5"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/6.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/7.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/8.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/9.png"
                                                alt="Logo 6"></div>
                                    <div class="ra-logo-carousel-item"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/10.png"
                                                alt="Logo 6"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row-background row-mt row">
                    <div class="services-gradient-top"></div>
                    <div class="ra-serv-sec row">
                        <div class="custom-w-1250 section-title-wrapper">
                            <div class="section-en-title glass-bc">
                                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                     alt="">
                                Services
                            </div>
                            <div class="section-title">
                                خدمات رامان
                            </div>
                            <p class="section-title-desc">
                                ما ترکیب مطلوبی از خلاقیت و تکنولوژی را برای توسعه کسب‌وکارهای دیجیتال خلق کرده‌ایم. به
                                شما
                                کمک می‌کنیم تا فرصت‌های جدیدی را لمس کنید و همگام با دنیا، تجربه رشد، توسعه و شکوفایی را
                                برای کسب‌وکار خود رقم بزنید. </p>

                        </div>
                        <div class="services-item-wrapper">
                            <div class="row">
                                <div class="custom-w-1250">
                                    <div class="right-service-box">
                                        <div class="service-box service-box-lg-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">طراحی سایت فروشگاهی و شرکتی</h2>
                                                <p class="services-desc">راه‌اندازی سایت اختصاصی متناسب با نیاز
                                                    کسب‌وکار</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="#">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">افزایش سرعت سایت</h2>
                                                <p class="services-desc">بهینه‌سازی زمان بارگذاری و عملکرد سایت</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="#">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">افزایش امنیت سایت</h2>
                                                <p class="services-desc">محافظت از داده‌ها و جلوگیری از نفوذ</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="#">مشاهده جزئیات</a>

                                        </div>
                                    </div>
                                    <div class="left-service-box">
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">پشتیبانی سایت</h2>
                                                <p class="services-desc">پشتیبانی روزانه، رفع خطا و نگهداری مداوم</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="#">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">طراحی UI/UX</h2>
                                                <p class="services-desc">طراحی رابط کاربری جذاب و حرفه‌ای</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="#">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-lg-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">سئو و بهینه سازی سایت</h2>
                                                <p class="services-desc">بهبود رتبه در گوگل و جذب ترافیک هدفمند</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="#">مشاهده جزئیات</a>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ra-about-sec row-mt row">
                        <!--about-->
                        <div class="col-12">
                            <div class="about-content">
                                <div class="section-en-title glass-bc">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                         alt="">
                                    About Raman
                                </div>
                                <div class="section-title">
                                    درباره ما بیشتر بدانید
                                </div>
                            </div>
                            <div class="custom-w-1250 background-effect about-sec-wrapper">
                                <div class="video-sec-content-wrapper">
                                    <div class="video-sec-content">
                                        <h3 class="about-title section-title">درباره آژانس خلاقیت رامان</h3>
                                        <p>آژانس خلاقیت رامان با هدف توسعه بازار دیجیتال برای کسب‌وکارها تأسیس
                                            شده
                                            و با تیمی از متخصصان، خدمات کامل دیجیتال مارکتینگ را ارائه می‌دهد. تمرکز ما
                                            ترکیب خلاقیت با تجربه برای افزایش سهم بازار برندهاست.

                                        </p>
                                        <div class="glow-button-wrapper">
                                            <a href="#" class="ra-btn glow-button">
                                                درباره رامان
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24"
                                                     fill="none" stroke="#010101" stroke-width="2"
                                                     stroke-linecap="round"
                                                     stroke-linejoin="round" class="lucide lucide-arrow-up-right">
                                                    <path d="M7 7h10v10"/>
                                                    <path d="M7 17 17 7"/>
                                                </svg>

                                                <span class="animated-border-box-glow"></span>
                                                <span class="animated-border-box"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <video src="<?php echo get_template_directory_uri(); ?>/assets/videos/logos.mp4"
                                       class="services-content-video" muted="" playsinline=""
                                       data-wf-ignore="true" preload="metadata"></video>

                            </div>
                        </div>
                    </div>
                    <div class="ra-step-sec row">
                        <div class="custom-w-1250 d-flex">

                            <div class="ra-step-work step-box background-effect col-12 col-md-6">
                                <div class="step-3-col-title section-title">
                                    مراحل اجرای پروژه
                                </div>
                                <p>تبدیل ایده اولیه به یک وب‌سایت کامل، حرفه‌ای و آماده بهره‌برداری در یک مسیر
                                    هدفمند</p>
                                <div class="ra-step-work-swiper-wrapper">
                                    <div class="swiper ra-step-work-top">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/cons-g.svg"
                                                        alt=""></div>
                                            <div class="swiper-slide"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/wireframe-g.svg"
                                                        alt=""></div>
                                            <div class="swiper-slide"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/ui-g.svg"
                                                        alt=""></div>
                                            <div class="swiper-slide"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/programming-g.svg"
                                                        alt=""></div>
                                            <div class="swiper-slide"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/test-g.svg"
                                                        alt=""></div>
                                            <div class="swiper-slide"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/run-g.svg"
                                                        alt=""></div>
                                        </div>
                                    </div>
                                    <div class="swiper ra-step-work-bottom">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <strong>1. مشاوره اولیه</strong>
                                                <p>برگزاری جلسه مشاوره با مشتری جهت تحلیل نیازها، اهداف کسب‌وکار و تعیین
                                                    مسیر کلی پروژه.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <strong>2. طراحی وایرفریم</strong>
                                                <p>تهیه وایرفریم اولیه براساس نتایج جلسه مشاوره و ساختار پیشنهادی صفحات،
                                                    به‌منظور تایید قبل از ورود به فاز طراحی.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <strong>3. طراحی رابط کاربری (UI)</strong>
                                                <p>طراحی رابط کاربری بر پایه وایرفریم‌های تاییدشده، با تمرکز بر تجربه
                                                    کاربری، هویت بصری برند و استانداردهای روز طراحی.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <strong>4. توسعه فنی و برنامه‌نویسی</strong>
                                                <p>پیاده‌سازی و توسعه کامل وب‌سایت بر اساس رابط کاربری نهایی، با استفاده
                                                    از
                                                    تکنولوژی‌های مدرن و اصول بهینه‌سازی.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <strong>5. تست و بررسی نهایی</strong>
                                                <p>بارگذاری نسخه آزمایشی روی دامنه تست و انجام بررسی‌های فنی، عملکردی و
                                                    تجربه‌کاربری توسط تیم ما و مشتری.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <strong>6. تحویل نهایی و استقرار سایت</strong>
                                                <p>انتقال پروژه نهایی‌شده به هاست و دامنه اصلی، و تحویل کامل سایت همراه
                                                    با
                                                    مستندات، پشتیبانی اولیه و آموزش مدیریت محتوا.</p>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="ra-step-work-navigation">
                                        <div class="ra-step-work-button-prev swiper-button-prev">قبلی</div>
                                        <div class="ra-step-work-pagination swiper-pagination"></div>
                                        <div class="ra-step-work-button-next swiper-button-next">بعدی</div>
                                    </div>

                                </div>
                            </div>
                            <div class="step-box background-effect col-12 col-md-6">
                                <div class="step-3-col-title section-title">
                                    از ایده تا اجرا
                                </div>
                                <p>تبدیل ایده اولیه به یک وب‌سایت کامل، حرفه‌ای و آماده بهره‌برداری در یک مسیر
                                    هدفمند</p>
                                <div class="card-stack">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/cons-2-g.svg"
                                                 alt="Slack">

                                            <div class="title">مشاوره</div>
                                        </div>
                                        <div class="text">تحلیل دقیق نیازها و اهداف کسب‌وکار برای ارائه بهترین مسیر ورود
                                            به
                                            دنیای دیجیتال
                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/strategy-g.svg"
                                                 alt="Gmail">

                                            <div class="title">تدوین استراژی</div>
                                        </div>
                                        <div class="text">طراحی یک نقشه راه حرفه‌ای برای کسب و کار آنلاین شما، طراحی
                                            سایت،
                                            سئو و بازاریابی دیجیتال با تمرکز بر رشد پایدار
                                        </div>

                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/step-logo/run-2-g.svg"
                                                 alt="">

                                            <div class="title">اجرا</div>
                                        </div>
                                        <div class="text">پیاده‌سازی دقیق و حرفه‌ای طراحی، برنامه‌نویسی و بهینه‌سازی
                                            کسب‌وکار دیجیتال شما، بر اساس استراتژی تدوین ‌شده
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ra-project-sec row-mt row">
                    <div class="projects-gradient-top"></div>
                    <div class="title-wrapper col-12">
                        <div class="section-en-title glass-bc">
                            <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                 alt="">
                            Portfolio
                        </div>
                        <div class="section-title">
                            نمونه کارهای طراحی سایت رامان
                        </div>
                        <p class="section-title-desc">
                            برای ما نتیجه مهم است! و همه نتایج برای ما افتخارآفرینند، همه تجربه‌ها، همه موفقیت‌ها
                        </p>
                    </div>
                    <div class="col-12 projects-loop-wrapper">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-fluid"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio/heave.webp"/>
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio/heavemax.webp"/>
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio/kinimatic.webp"/>
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid"
                                         src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio/portfolio.png"/>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var Swipes = new Swiper('.swiper-container', {
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
                            });
                        </script>


                    </div>
                    <div class="projects-gradient-bottom"></div>
                </div>

                <div class="ra-work-history row row-pt">
                    <div class="services-gradient-top"></div>
                    <div class="custom-w-1250 p-0">
                        <!--brands logo-->
                        <div class="brands-content-wrapper row">
                            <div class="brands-logo-title">
                                <div class="section-en-title glass-bc">
                                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                         alt="">
                                    Brands
                                </div>
                                <div class="section-title">
                                    برندهایی که همراه ما بودند
                                </div>
                                <p>به اعتماد شما افتخار می‌کنیم</p>
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/asoo.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/mond.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/ahanresan.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/soodup.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/peyvandtel.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/ultima.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/spares.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>
                                <div class="background-gradient-circle-2"></div>
                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/exir.png'
                                     alt="">
                            </div>
                            <div class="brands-show-more">
                                <div>+50</div>
                                <div>برند دیگر</div>
                                <div class="glow-button-wrapper">
                                    <a href="#" class="ra-btn glow-button">
                                        برندهای دیگر
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="#010101" stroke-width="2"
                                             stroke-linecap="round"
                                             stroke-linejoin="round" class="lucide lucide-arrow-up-right">
                                            <path d="M7 7h10v10"/>
                                            <path d="M7 17 17 7"/>
                                        </svg>

                                        <span class="animated-border-box-glow"></span>
                                        <span class="animated-border-box"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--records-->
                        <div class="ra-records-sec row row-mt ">
                            <div class="col-12">
                                <div class="data-report-sec-title">
                                    <div class="section-en-title glass-bc">
                                        <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                             alt="">
                                        Reports
                                    </div>
                                    <div class="section-title">
                                        آمار و ارقام معرف ما هستند
                                    </div>
                                    <p>افتخاری که از همراهی با شما بدست آمده</p>
                                </div>
                            </div>
                            <div class="ra-data-report row p-0">
                                <div class="data-report-item background-effect">
                                    <p class="data-pre-text">بیش از</p>
                                    <div class="data-num text-gr">100</div>
                                    <p class="data-title">پروژه موفق</p>
                                    <p class="data-desc">مغتخریم بابت میزبانی بیش از 100 برند و کسب و کار مختلف و نوسعه
                                        حضورشان در بازار آنلاین و جهانی</p>
                                </div>
                                <div class="data-report-item background-effect">
                                    <p class="data-pre-text">بیش از</p>
                                    <div class="data-num text-gr">6</div>
                                    <p class="data-title">سال سابقه فعالیت</p>
                                    <p class="data-desc">با بیش از ۶ سال تجربه حضور و رقابت در حوزه خدمات آنلاین در
                                        دنیای دیجیتال</p>
                                </div>
                                <div class="data-report-item background-effect">
                                    <p class="data-pre-text">بیش از</p>
                                    <div class="data-num text-gr">95٪</div>
                                    <p class="data-title">رضایت مشتری</p>
                                    <p class="data-desc">با بیش از 95% رضایت از انجام پروژه و همکاری با همکاران و
                                        مشتریان گرامی</p>
                                </div>


                            </div>

                        </div>
                        <!--CTA Form-->
                        <div class="ra-cta-form-sec row row-mt ">
                            <div class="ra-form-wrapper background-effect">
                                <div class="left-column-img">
                                    <div class="img-loop">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-5.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-6.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-7.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-8.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-5.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-6.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-7.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-8.jpg'
                                             alt="">
                                    </div>
                                </div>

                                <div class="cta-form">
                                    <div class="cta-form-sec-title">
                                        <div class="section-en-title glass-bc">
                                            <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                                 alt="">
                                            Consulting
                                        </div>
                                        <div class="section-title">
                                            مشاوره
                                            رایگان
                                        </div>
                                        <p>
                                            برای انتخاب مسیر مناسب در شروع کسب‌وکار دیجیتال، کافیست فرم زیر را تکمیل
                                            کنید تا کارشناسان ما با بررسی دقیق نیازهای شما، بهترین راهکارها را در حوزه
                                            طراحی سایت، استراتژی دیجیتال یا سئو ارائه دهند </p>
                                    </div>
                                    <div class="ra-gform-wrapper">
										<?php echo do_shortcode( '[gravityform id="10" title="false" description="false" ajax="true" ]' ); ?>
                                    </div>

                                    <div class="contact-info-wrapper">

                                        <span class="contact-info-item address">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12 6.25C9.92893 6.25 8.25 7.92893 8.25 10C8.25 12.0711 9.92893 13.75 12 13.75C14.0711 13.75 15.75 12.0711 15.75 10C15.75 7.92893 14.0711 6.25 12 6.25ZM9.75 10C9.75 8.75736 10.7574 7.75 12 7.75C13.2426 7.75 14.25 8.75736 14.25 10C14.25 11.2426 13.2426 12.25 12 12.25C10.7574 12.25 9.75 11.2426 9.75 10Z"
                                                  fill="#10B358"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12 0.25C7.11666 0.25 3.25 4.49277 3.25 9.6087C3.25 11.2494 4.06511 13.1814 5.09064 14.9945C6.13277 16.837 7.46288 18.6762 8.62903 20.1633L8.66793 20.2129C9.23714 20.9388 9.72203 21.5573 10.1922 21.9844C10.7052 22.4504 11.2709 22.7555 12 22.7555C12.7291 22.7555 13.2948 22.4504 13.8078 21.9844C14.278 21.5572 14.7629 20.9388 15.3321 20.2129L15.371 20.1633C16.5371 18.6762 17.8672 16.837 18.9094 14.9945C19.9349 13.1814 20.75 11.2494 20.75 9.6087C20.75 4.49277 16.8833 0.25 12 0.25ZM4.75 9.6087C4.75 5.21571 8.04678 1.75 12 1.75C15.9532 1.75 19.25 5.21571 19.25 9.6087C19.25 10.8352 18.6104 12.4764 17.6037 14.256C16.6137 16.0063 15.3342 17.7794 14.1906 19.2377C13.5717 20.027 13.1641 20.5426 12.7992 20.8741C12.4664 21.1764 12.2442 21.2555 12 21.2555C11.7558 21.2555 11.5336 21.1764 11.2008 20.8741C10.8359 20.5426 10.4283 20.027 9.80938 19.2377C8.66578 17.7794 7.38628 16.0063 6.39625 14.256C5.38962 12.4764 4.75 10.8352 4.75 9.6087Z"
                                                  fill="#10B358"/>
                                            </svg>
                                            مشهد بلوار کوثر میدان پژوهش کارخانه نوآوری مشهد
                                        </span>
                                        <span class="contact-info-item call-num"><svg width="24" height="24"
                                                                                      viewBox="0 0 24 24"
                                                                                      fill="none"
                                                                                      xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.9901 2.75C13.8509 2.75 14.2319 2.75076 14.5461 2.77889C18.0394 3.09165 20.808 5.86017 21.1207 9.35348C21.1489 9.66768 21.1496 10.0487 21.1496 10.9095V11.8995C21.1496 12.3137 21.4854 12.6495 21.8996 12.6495C22.3138 12.6495 22.6496 12.3137 22.6496 11.8995V10.8591C22.6496 10.0622 22.6496 9.60934 22.6147 9.21971C22.2373 5.00365 18.896 1.66234 14.6799 1.28486C14.2902 1.24998 13.8374 1.24999 13.0404 1.25H12.0001C11.5859 1.25 11.2501 1.58579 11.2501 2C11.2501 2.41422 11.5859 2.75 12.0001 2.75L12.9901 2.75Z"
                                                      fill="#10B358"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M7.11183 4.0253C6.05974 3.05857 4.44259 3.05857 3.3905 4.0253C3.34742 4.06489 3.30142 4.11089 3.2417 4.17063L2.34419 5.06813C1.44108 5.97125 1.06196 7.27317 1.33902 8.51995C2.91099 15.5938 8.43553 21.1183 15.5094 22.6903C16.7562 22.9674 18.0581 22.5883 18.9612 21.6851L19.8586 20.7877C19.9184 20.728 19.9644 20.6819 20.004 20.6388C20.9708 19.5867 20.9708 17.9696 20.004 16.9175C19.9644 16.8744 19.9184 16.8284 19.8586 16.7686L18.3894 15.2993C17.3693 14.2792 15.8287 13.9875 14.5063 14.564C13.7492 14.894 12.8672 14.7269 12.2832 14.1429L9.88639 11.7461C9.30239 11.1621 9.13536 10.2802 9.46538 9.52308C10.0418 8.20062 9.75009 6.66009 8.72999 5.63999L7.26066 4.17065C7.20092 4.1109 7.15492 4.06489 7.11183 4.0253ZM4.40541 5.12982C4.88363 4.69039 5.6187 4.69039 6.09692 5.12982C6.11343 5.14499 6.13507 5.16638 6.21114 5.24245L7.66933 6.70065C8.25333 7.28465 8.42036 8.1666 8.09034 8.9237C7.51388 10.2462 7.80563 11.7867 8.82573 12.8068L11.2225 15.2036C12.2426 16.2237 13.7832 16.5155 15.1056 15.939C15.8627 15.609 16.7447 15.776 17.3287 16.36L18.7869 17.8182C18.8629 17.8943 18.8843 17.9159 18.8995 17.9324C19.3389 18.4106 19.3389 19.1457 18.8995 19.6239C18.8843 19.6404 18.8629 19.6621 18.7869 19.7381L17.9005 20.6245C17.3601 21.165 16.5809 21.3918 15.8348 21.226C9.32946 19.7804 4.24893 14.6999 2.8033 8.19455C2.6375 7.44841 2.86438 6.66927 3.40485 6.12879L4.2912 5.24245C4.36726 5.16639 4.3889 5.14499 4.40541 5.12982Z"
                                                      fill="#10B358"/>
                                                <path d="M12.7071 4.78554C12.2929 4.78554 11.9571 5.12132 11.9571 5.53553C11.9571 5.94975 12.2929 6.28553 12.7071 6.28553H13.2728C13.2837 6.28553 13.2938 6.28553 13.3032 6.28554C13.3689 6.28555 13.3994 6.28561 13.4248 6.28597C15.7244 6.3189 17.5806 8.1751 17.6135 10.4747C17.6139 10.5037 17.614 10.5395 17.614 10.6267V11.1924C17.614 11.6066 17.9497 11.9424 18.364 11.9424C18.7782 11.9424 19.114 11.6066 19.114 11.1924V10.6194C19.114 10.6097 19.114 10.6005 19.114 10.5917C19.1139 10.53 19.1139 10.4893 19.1134 10.4532C19.0688 7.342 16.5575 4.83068 13.4463 4.78612C13.405 4.78553 13.3577 4.78553 13.28 4.78554H12.7071Z"
                                                      fill="#10B358"/>
                                                </svg>
                                            09306625562
                                        </span>
                                        <span class="contact-info-item email">
                                            <svg width="24"
                                                 height="25"
                                                 viewBox="0 0 24 25"
                                                 fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.009 2.75726C14.4033 2.75 13.7362 2.75 13.0032 2.75H10.9548C9.11821 2.74999 7.67861 2.74999 6.53648 2.87373C5.37094 3.00001 4.42656 3.26232 3.62024 3.84815C3.13209 4.20281 2.70281 4.63209 2.34815 5.12024C2.19354 5.33304 2.06012 5.55734 1.94538 5.79546C1.57515 6.56379 1.41014 7.45506 1.32976 8.51904C1.25 9.57487 1.25 10.8707 1.25 12.4709V12.5452C1.24999 14.3818 1.24999 15.8214 1.37373 16.9635C1.50001 18.1291 1.76232 19.0734 2.34815 19.8798C2.70281 20.3679 3.13209 20.7972 3.62024 21.1518C4.42656 21.7377 5.37094 22 6.53648 22.1263C7.67859 22.25 9.11817 22.25 10.9547 22.25H13.0453C14.8818 22.25 16.3214 22.25 17.4635 22.1263C18.6291 22 19.5734 21.7377 20.3798 21.1518C20.8679 20.7972 21.2972 20.3679 21.6518 19.8798C22.2377 19.0734 22.5 18.1291 22.6263 16.9635C22.75 15.8214 22.75 14.3818 22.75 12.5453V12.4966C22.75 11.7532 22.75 11.0776 22.7424 10.4651C22.7373 10.0509 22.3974 9.71931 21.9832 9.72443C21.569 9.72956 21.2374 10.0695 21.2425 10.4837C21.25 11.086 21.25 11.7528 21.25 12.5C21.25 14.3916 21.249 15.75 21.135 16.802C21.0225 17.8399 20.8074 18.4901 20.4383 18.9981C20.1762 19.3589 19.8589 19.6762 19.4981 19.9383C18.9901 20.3074 18.3399 20.5225 17.302 20.635C16.25 20.749 14.8916 20.75 13 20.75H11C9.10843 20.75 7.74999 20.749 6.69804 20.635C5.66013 20.5225 5.00992 20.3074 4.50191 19.9383C4.14111 19.6762 3.82382 19.3589 3.56168 18.9981C3.19259 18.4901 2.97745 17.8399 2.865 16.802C2.75103 15.75 2.75 14.3916 2.75 12.5C2.75 10.8648 2.75049 9.62493 2.8255 8.63204C2.85746 8.20891 2.9023 7.84361 2.96271 7.52337L4.43916 8.99982C6.07143 10.6321 7.35062 11.9113 8.48288 12.7752C9.64181 13.6594 10.7345 14.1789 12 14.1789C13.9309 14.1789 15.4872 12.9633 17.519 11.0158C17.818 10.7292 17.8281 10.2544 17.5414 9.95538C17.2548 9.65636 16.78 9.64631 16.481 9.93294C14.403 11.9248 13.2532 12.6789 12 12.6789C11.1944 12.6789 10.4183 12.3651 9.39275 11.5827C8.34994 10.787 7.14092 9.58026 5.45926 7.8986L3.56205 6.00139C3.82412 5.64081 4.14128 5.32369 4.50191 5.06168C5.00992 4.69259 5.66013 4.47745 6.69804 4.365C7.74999 4.25103 9.10843 4.25 11 4.25H13C13.7367 4.25 14.3952 4.25001 14.991 4.25715C15.4052 4.26212 15.745 3.93038 15.7499 3.5162C15.7549 3.10201 15.4232 2.76223 15.009 2.75726Z"
                                                  fill="#10B358"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M20 2.75C18.4812 2.75 17.25 3.98122 17.25 5.5C17.25 7.01878 18.4812 8.25 20 8.25C21.5188 8.25 22.75 7.01878 22.75 5.5C22.75 3.98122 21.5188 2.75 20 2.75ZM18.75 5.5C18.75 4.80964 19.3096 4.25 20 4.25C20.6904 4.25 21.25 4.80964 21.25 5.5C21.25 6.19036 20.6904 6.75 20 6.75C19.3096 6.75 18.75 6.19036 18.75 5.5Z"
                                                  fill="#10B358"/>
                                            </svg>
                                            info@raman.agency
                                        </span>
                                        <span class="contact-info-item social">
                                            <a class="social-icon instagram" href=""><img
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg'
                                                        alt=""></a>
                                            <a class="social-icon telegram" href=""><img
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/telegram.svg'
                                                        alt=""></a>
                                            <a class="social-icon whatsapp" href=""><img
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg'
                                                        alt=""></a>
                                        </span>


                                    </div>
                                </div>
                                <div class="right-column-img">
                                    <div class="img-loop">

                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-1.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-2.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-3.png'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-4.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-1.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-2.jpg'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-3.png'
                                             alt="">
                                        <img class="img-fluid"
                                             src='<?php echo get_template_directory_uri(); ?>/assets/images/consulting/consult-4.jpg'
                                             alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Blog-->
                        <div class="ra-blog-sec row row-mt">
                            <div class="col-12">
                                <div class="data-report-sec-title">
                                    <div class="section-en-title glass-bc">
                                        <img src='<?php echo get_template_directory_uri(); ?>/assets/images/green-light.png.webp'
                                             alt="">
                                        Blog
                                    </div>
                                    <div class="section-title">
                                        جدیدترین مقالات
                                    </div>
                                </div>
                                <div class="last-posts-wrapper">
									<?php
									$args  = [
										'post_type'      => 'post',
										'posts_per_page' => 3,
										'post_status'    => 'publish',
									];
									$query = new WP_Query( $args );

									if ( $query->have_posts() ) :
										echo '<div class="latest-posts">';

										while ( $query->have_posts() ) : $query->the_post();

											echo '<div class="latest-post-item">';
											echo '<a href="' . esc_url( get_permalink() ) . '">';
											echo '<div class="post-thumbnail-container">';

											if ( has_post_thumbnail() ) {
												the_post_thumbnail( 'raman-post-thumb', [
													'class' => 'img-post-thumb'
												] );
											}
											echo '<div class="animated-border-box-glow"></div>';
											echo '<div class="animated-border-box"></div>';
											echo '</div>';
											echo '</a>';

											echo '<a href="' . esc_url( get_permalink() ) . '">';
											echo '<div class="blog-post-title">' . esc_html( get_the_title() ) . '</div>';
											echo '</a>';

											echo '</div>'; // .latest-post-item

										endwhile;

										echo '</div>'; // .latest-posts
										wp_reset_postdata();
									endif;
									?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <section class="ra-footer row">
                    <div class="footer-wrapper col-12 background-footer">
                        <div class="footer-gradient-top"></div>
                        <div class="footer-content-wrapper row custom-w-1250">
                            <div class="background-gradient-circle">

                            </div>
                            <div class="footer-menu-wrapper col-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="footer-col-title">
                                            خدمات وبسایت رامان
                                        </div>
										<?php
										if ( has_nav_menu( 'footer-column-1' ) ) {
											wp_nav_menu( array(
												'theme_location' => 'footer-column-1',
												'menu_class'     => 'footer-menu footer-column-1 ',
												'container'      => false,
											) );
										}
										?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="footer-col-title">
                                            خدمات فنی رامان
                                        </div>
										<?php
										if ( has_nav_menu( 'footer-column-3' ) ) {
											wp_nav_menu( array(
												'theme_location' => 'footer-column-2',
												'menu_class'     => 'footer-menu footer-column-2 ',
												'container'      => false,
											) );
										}
										?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="footer-col-title">
                                            سایر صفحات
                                        </div>
										<?php
										if ( has_nav_menu( 'footer-column-3' ) ) {
											wp_nav_menu( array(
												'theme_location' => 'footer-column-2',
												'menu_class'     => 'footer-menu footer-column-3 ',
												'container'      => false,
											) );
										}
										?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="footer-col-title">
                                            نمونه کار ها
                                        </div>
										<?php
										if ( has_nav_menu( 'footer-column-4' ) ) {
											wp_nav_menu( array(
												'theme_location' => 'footer-column-4',
												'menu_class'     => 'footer-menu footer-column-4 ',
												'container'      => false,
											) );
										}
										?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="footer-info-wrapper col-12">
                                <div class="row">
                                    <div class="col-lg-4 contact p-0">
                                        <div class="footer-contact-info-wrapper">

                                            <div class="contact-info-item address">
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M12 6.25C9.92893 6.25 8.25 7.92893 8.25 10C8.25 12.0711 9.92893 13.75 12 13.75C14.0711 13.75 15.75 12.0711 15.75 10C15.75 7.92893 14.0711 6.25 12 6.25ZM9.75 10C9.75 8.75736 10.7574 7.75 12 7.75C13.2426 7.75 14.25 8.75736 14.25 10C14.25 11.2426 13.2426 12.25 12 12.25C10.7574 12.25 9.75 11.2426 9.75 10Z"
                                                          fill="#10B358"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M12 0.25C7.11666 0.25 3.25 4.49277 3.25 9.6087C3.25 11.2494 4.06511 13.1814 5.09064 14.9945C6.13277 16.837 7.46288 18.6762 8.62903 20.1633L8.66793 20.2129C9.23714 20.9388 9.72203 21.5573 10.1922 21.9844C10.7052 22.4504 11.2709 22.7555 12 22.7555C12.7291 22.7555 13.2948 22.4504 13.8078 21.9844C14.278 21.5572 14.7629 20.9388 15.3321 20.2129L15.371 20.1633C16.5371 18.6762 17.8672 16.837 18.9094 14.9945C19.9349 13.1814 20.75 11.2494 20.75 9.6087C20.75 4.49277 16.8833 0.25 12 0.25ZM4.75 9.6087C4.75 5.21571 8.04678 1.75 12 1.75C15.9532 1.75 19.25 5.21571 19.25 9.6087C19.25 10.8352 18.6104 12.4764 17.6037 14.256C16.6137 16.0063 15.3342 17.7794 14.1906 19.2377C13.5717 20.027 13.1641 20.5426 12.7992 20.8741C12.4664 21.1764 12.2442 21.2555 12 21.2555C11.7558 21.2555 11.5336 21.1764 11.2008 20.8741C10.8359 20.5426 10.4283 20.027 9.80938 19.2377C8.66578 17.7794 7.38628 16.0063 6.39625 14.256C5.38962 12.4764 4.75 10.8352 4.75 9.6087Z"
                                                          fill="#10B358"/>
                                                </svg>
                                                مشهد بلوار کوثر میدان پژوهش کارخانه نوآوری مشهد
                                            </div>
                                            <div class="contact-info-item call-num">
                                                <a class="ra-btn" href="tel:09306625562">
                                                    <svg width="15" height="15"
                                                         viewBox="0 0 24 24"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.9901 2.75C13.8509 2.75 14.2319 2.75076 14.5461 2.77889C18.0394 3.09165 20.808 5.86017 21.1207 9.35348C21.1489 9.66768 21.1496 10.0487 21.1496 10.9095V11.8995C21.1496 12.3137 21.4854 12.6495 21.8996 12.6495C22.3138 12.6495 22.6496 12.3137 22.6496 11.8995V10.8591C22.6496 10.0622 22.6496 9.60934 22.6147 9.21971C22.2373 5.00365 18.896 1.66234 14.6799 1.28486C14.2902 1.24998 13.8374 1.24999 13.0404 1.25H12.0001C11.5859 1.25 11.2501 1.58579 11.2501 2C11.2501 2.41422 11.5859 2.75 12.0001 2.75L12.9901 2.75Z"
                                                              fill="#10B358"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M7.11183 4.0253C6.05974 3.05857 4.44259 3.05857 3.3905 4.0253C3.34742 4.06489 3.30142 4.11089 3.2417 4.17063L2.34419 5.06813C1.44108 5.97125 1.06196 7.27317 1.33902 8.51995C2.91099 15.5938 8.43553 21.1183 15.5094 22.6903C16.7562 22.9674 18.0581 22.5883 18.9612 21.6851L19.8586 20.7877C19.9184 20.728 19.9644 20.6819 20.004 20.6388C20.9708 19.5867 20.9708 17.9696 20.004 16.9175C19.9644 16.8744 19.9184 16.8284 19.8586 16.7686L18.3894 15.2993C17.3693 14.2792 15.8287 13.9875 14.5063 14.564C13.7492 14.894 12.8672 14.7269 12.2832 14.1429L9.88639 11.7461C9.30239 11.1621 9.13536 10.2802 9.46538 9.52308C10.0418 8.20062 9.75009 6.66009 8.72999 5.63999L7.26066 4.17065C7.20092 4.1109 7.15492 4.06489 7.11183 4.0253ZM4.40541 5.12982C4.88363 4.69039 5.6187 4.69039 6.09692 5.12982C6.11343 5.14499 6.13507 5.16638 6.21114 5.24245L7.66933 6.70065C8.25333 7.28465 8.42036 8.1666 8.09034 8.9237C7.51388 10.2462 7.80563 11.7867 8.82573 12.8068L11.2225 15.2036C12.2426 16.2237 13.7832 16.5155 15.1056 15.939C15.8627 15.609 16.7447 15.776 17.3287 16.36L18.7869 17.8182C18.8629 17.8943 18.8843 17.9159 18.8995 17.9324C19.3389 18.4106 19.3389 19.1457 18.8995 19.6239C18.8843 19.6404 18.8629 19.6621 18.7869 19.7381L17.9005 20.6245C17.3601 21.165 16.5809 21.3918 15.8348 21.226C9.32946 19.7804 4.24893 14.6999 2.8033 8.19455C2.6375 7.44841 2.86438 6.66927 3.40485 6.12879L4.2912 5.24245C4.36726 5.16639 4.3889 5.14499 4.40541 5.12982Z"
                                                              fill="#10B358"/>
                                                        <path d="M12.7071 4.78554C12.2929 4.78554 11.9571 5.12132 11.9571 5.53553C11.9571 5.94975 12.2929 6.28553 12.7071 6.28553H13.2728C13.2837 6.28553 13.2938 6.28553 13.3032 6.28554C13.3689 6.28555 13.3994 6.28561 13.4248 6.28597C15.7244 6.3189 17.5806 8.1751 17.6135 10.4747C17.6139 10.5037 17.614 10.5395 17.614 10.6267V11.1924C17.614 11.6066 17.9497 11.9424 18.364 11.9424C18.7782 11.9424 19.114 11.6066 19.114 11.1924V10.6194C19.114 10.6097 19.114 10.6005 19.114 10.5917C19.1139 10.53 19.1139 10.4893 19.1134 10.4532C19.0688 7.342 16.5575 4.83068 13.4463 4.78612C13.405 4.78553 13.3577 4.78553 13.28 4.78554H12.7071Z"
                                                              fill="#10B358"/>
                                                    </svg>
                                                    09306625562
                                                </a>
                                            </div>
                                            <div class="contact-info-item email">
                                                <svg width="15"
                                                     height="15"
                                                     viewBox="0 0 24 25"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.009 2.75726C14.4033 2.75 13.7362 2.75 13.0032 2.75H10.9548C9.11821 2.74999 7.67861 2.74999 6.53648 2.87373C5.37094 3.00001 4.42656 3.26232 3.62024 3.84815C3.13209 4.20281 2.70281 4.63209 2.34815 5.12024C2.19354 5.33304 2.06012 5.55734 1.94538 5.79546C1.57515 6.56379 1.41014 7.45506 1.32976 8.51904C1.25 9.57487 1.25 10.8707 1.25 12.4709V12.5452C1.24999 14.3818 1.24999 15.8214 1.37373 16.9635C1.50001 18.1291 1.76232 19.0734 2.34815 19.8798C2.70281 20.3679 3.13209 20.7972 3.62024 21.1518C4.42656 21.7377 5.37094 22 6.53648 22.1263C7.67859 22.25 9.11817 22.25 10.9547 22.25H13.0453C14.8818 22.25 16.3214 22.25 17.4635 22.1263C18.6291 22 19.5734 21.7377 20.3798 21.1518C20.8679 20.7972 21.2972 20.3679 21.6518 19.8798C22.2377 19.0734 22.5 18.1291 22.6263 16.9635C22.75 15.8214 22.75 14.3818 22.75 12.5453V12.4966C22.75 11.7532 22.75 11.0776 22.7424 10.4651C22.7373 10.0509 22.3974 9.71931 21.9832 9.72443C21.569 9.72956 21.2374 10.0695 21.2425 10.4837C21.25 11.086 21.25 11.7528 21.25 12.5C21.25 14.3916 21.249 15.75 21.135 16.802C21.0225 17.8399 20.8074 18.4901 20.4383 18.9981C20.1762 19.3589 19.8589 19.6762 19.4981 19.9383C18.9901 20.3074 18.3399 20.5225 17.302 20.635C16.25 20.749 14.8916 20.75 13 20.75H11C9.10843 20.75 7.74999 20.749 6.69804 20.635C5.66013 20.5225 5.00992 20.3074 4.50191 19.9383C4.14111 19.6762 3.82382 19.3589 3.56168 18.9981C3.19259 18.4901 2.97745 17.8399 2.865 16.802C2.75103 15.75 2.75 14.3916 2.75 12.5C2.75 10.8648 2.75049 9.62493 2.8255 8.63204C2.85746 8.20891 2.9023 7.84361 2.96271 7.52337L4.43916 8.99982C6.07143 10.6321 7.35062 11.9113 8.48288 12.7752C9.64181 13.6594 10.7345 14.1789 12 14.1789C13.9309 14.1789 15.4872 12.9633 17.519 11.0158C17.818 10.7292 17.8281 10.2544 17.5414 9.95538C17.2548 9.65636 16.78 9.64631 16.481 9.93294C14.403 11.9248 13.2532 12.6789 12 12.6789C11.1944 12.6789 10.4183 12.3651 9.39275 11.5827C8.34994 10.787 7.14092 9.58026 5.45926 7.8986L3.56205 6.00139C3.82412 5.64081 4.14128 5.32369 4.50191 5.06168C5.00992 4.69259 5.66013 4.47745 6.69804 4.365C7.74999 4.25103 9.10843 4.25 11 4.25H13C13.7367 4.25 14.3952 4.25001 14.991 4.25715C15.4052 4.26212 15.745 3.93038 15.7499 3.5162C15.7549 3.10201 15.4232 2.76223 15.009 2.75726Z"
                                                          fill="#10B358"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M20 2.75C18.4812 2.75 17.25 3.98122 17.25 5.5C17.25 7.01878 18.4812 8.25 20 8.25C21.5188 8.25 22.75 7.01878 22.75 5.5C22.75 3.98122 21.5188 2.75 20 2.75ZM18.75 5.5C18.75 4.80964 19.3096 4.25 20 4.25C20.6904 4.25 21.25 4.80964 21.25 5.5C21.25 6.19036 20.6904 6.75 20 6.75C19.3096 6.75 18.75 6.19036 18.75 5.5Z"
                                                          fill="#10B358"/>
                                                </svg>
                                                info@raman.agency
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 logo-wrapper p-0">
                                        <a href="https://raman.agency/">
                                            <img class="ra-btn" src='<?php echo get_template_directory_uri(); ?>/assets/images/logo.png'
                                                 alt="">
                                        </a>
                                        <div class="contact-info-item social">
                                            <a class="ra-btn social-icon instagram" href="#"><img
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg'
                                                        alt="">
                                            </a>
                                            <a class="ra-btn social-icon telegram" href="#"><img
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/telegram.svg'
                                                        alt="">
                                            </a>
                                            <a class="ra-btn social-icon whatsapp" href="#"><img
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg'
                                                        alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 cert-wrapper p-0">
                                        <div>
                                            <a target="_blank"
                                               href="https://trustseal.enamad.ir/?id=240404&Code=0Ajw0EyjMnbJEsvAp7co">
                                                <img width="88px"
                                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/enamd.png'
                                                     alt="">
                                            </a>
                                            <a target="_blank"
                                               href="https://logo.samandehi.ir/Verify.aspx?id=275328&p=uiwkjyoedshwxlaouiwkmcsi"><img
                                                        width="93px"
                                                        src='<?php echo get_template_directory_uri(); ?>/assets/images/sam.webp'
                                                        alt="">
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="background-gradient-circle-2">

                            </div>
                        </div>
                        <div class="copyright-wrapper row">
                            <div class="col-12 text-center">تمامی حقوق این وبسایت متعلق به آژانس دیجیتال مارکتینگ رامان
                                می باشد
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>

    <div id="custom-cursor">
        <div class="cursor-dot"></div>
        <div class="cursor-ring">
            <div class="arrow-cursor-icon right">
                <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#fff" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
<?php
get_footer();
