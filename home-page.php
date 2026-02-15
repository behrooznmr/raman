<?php
defined( 'ABSPATH' ) || exit;
/**
 * Template Name: Home page
 *
 * @package WordPress
 * @subpackage Raman Theme
 * @since Raman Theme v1.0
 */

get_header();
?>

    <div style="direction:rtl" class="raman-home-page container-fluid p-0">
        <div class="main-wrapper d-flex flex-column">
            <div style="background-color:#030303" class="raman-container flex-grow-1 p-0">
                <!--hero section-->
                <div class="ra-hero-section-wrapper w-100 row p-0">
                    <div class="background-hero-sec col-12 p-0">
                        <div class="projects-gradient-top"></div>
                        <div class="bc__video">
                            <video autoplay="" muted="" loop="" playsinline="" preload="auto"><source src='<?php echo get_template_directory_uri(); ?>/assets/videos/hero-video.webm' type="video/webm"></video>
                        </div>
                        <svg width="100%" height="80vh" class="vertical-line" style="background-color: transparent;">
                            <line x1="50%" y1="0" x2="50%" y2="100%" class="faint-line"></line>
                            <line x1="35%" y1="0" x2="35%" y2="100%" class="faint-line only-desk"></line>
                            <line x1="65%" y1="0" x2="65%" y2="100%" class="faint-line   only-desk"></line>
                            <line x1="20%" y1="0" x2="20%" y2="100%" class="faint-line"></line>
                            <line x1="80%" y1="0" x2="80%" y2="100%" class="faint-line"></line>
                            <line x1="5%" y1="0" x2="5%" y2="100%" class="faint-line only-desk"></line>
                            <line x1="95%" y1="0" x2="95%" y2="100%" class="faint-line only-desk"></line>
                        </svg>
                        <div class="content-wrapper custom-w-1250">
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
                                <a href="#raCtaFrom" class="ra-btn glow-button">
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
                            <div class="scroll-down-anim">
                                <img width="60px" height="60px"
                                     src="<?php echo get_template_directory_uri(); ?>/assets/videos/scroll-down.gif"
                                     alt="scroll down">
                                به پایین اسکرول کنید
                            </div>
                        </div>
                        <div class="projects-gradient-bottom"></div>
                        <div class="raman-scroller-wrap">
                            <div class="raman-scroller-list" id="ramanScroller">
			                    <?php
			                    $logo_numbers = range(2, 8);
			                    foreach ($logo_numbers as $num): ?>
                                    <div class="raman-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tools-logo/<?php echo $num; ?>.png"
                                             alt="tools-logo">
                                    </div>
			                    <?php endforeach; ?>
                            </div>
                        </div>
                </div>

                <div class="row-background row">
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
                                            <a class="ra-btn services-btn general-btn" href="https://raman.agency/dev/web-design/">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">افزایش سرعت سایت</h2>
                                                <p class="services-desc">بهینه‌سازی زمان بارگذاری و عملکرد سایت</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="https://raman.agency/dev/web-design/increase-site-speed/">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">افزایش امنیت سایت</h2>
                                                <p class="services-desc">محافظت از داده‌ها و جلوگیری از نفوذ</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="https://raman.agency/dev/increase-website-security/">مشاهده جزئیات</a>

                                        </div>
                                    </div>
                                    <div class="left-service-box">
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">پشتیبانی سایت</h2>
                                                <p class="services-desc">پشتیبانی روزانه، رفع خطا و نگهداری مداوم</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="https://raman.agency/dev/web-design/site-support-services/">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-sm-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">طراحی UI/UX</h2>
                                                <p class="services-desc">طراحی رابط کاربری جذاب و حرفه‌ای</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="https://raman.agency/dev/web-design/single-page-site-design/">مشاهده جزئیات</a>

                                        </div>
                                        <div class="service-box service-box-lg-height">
                                            <div class="services-overlay"></div>
                                            <div class="services-content">
                                                <h2 class="service-title">سئو و بهینه سازی سایت</h2>
                                                <p class="services-desc">بهبود رتبه در گوگل و جذب ترافیک هدفمند</p>
                                            </div>
                                            <a class="ra-btn services-btn general-btn" href="https://raman.agency/dev/what-is-seo-and-what-does-it-do/website-seo-services-in-mashhad/">مشاهده جزئیات</a>


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
                                            <a href="https://raman.agency/dev/about-us/" class="ra-btn glow-button">
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
                                                <strong>6. تحویل نهایی و انتقال سایت</strong>
                                                <p>انتقال پروژه نهایی‌شده به هاست و دامنه اصلی، و تحویل کامل سایت همراه
                                                    با
                                                    سورس کد، دسترسی ادمین در داشبورد و پشتیبانی اولیه</p>
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
                            <div class="ra-idea-work step-box background-effect col-12 col-md-6">
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
                        </div>

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

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/asoo.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/mond.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/ahanresan.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/soodup.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/peyvandtel.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/ultima.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/spares.png'
                                     alt="">
                            </div>
                            <div class="brands-logo-item">
                                <div class="background-gradient-circle"></div>

                                <img class="img-fluid"
                                     src='<?php echo get_template_directory_uri(); ?>/assets/images/brands-logo/exir.png'
                                     alt="">
                            </div>
                            <div class="brands-show-more">
                                <div>+50</div>
                                <div>برند دیگر</div>
                                <div class="glow-button-wrapper">
                                    <a href="https://raman.agency/dev/portfolio/" class="ra-btn glow-button">
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

                                <div class="data-report-item ">
                                    <div class="background-gradient-circle"></div>
                                    <p class="data-pre-text">بیش از</p>
                                    <div class="data-num text-gr" data-target="100">0</div>
                                    <p class="data-title">پروژه موفق</p>
                                    <p class="data-desc">مغتخریم بابت میزبانی بیش از 100 برند و کسب و کار مختلف و نوسعه
                                        حضورشان در بازار آنلاین و جهانی</p>
                                </div>

                                <div class="data-report-item">
                                    <div class="background-gradient-circle"></div>
                                    <p class="data-pre-text">بیش از</p>
                                    <div class="data-num text-gr" data-target="6">0</div>
                                    <p class="data-title">سال سابقه فعالیت</p>
                                    <p class="data-desc">با بیش از ۶ سال تجربه حضور و رقابت در حوزه خدمات آنلاین در
                                        دنیای دیجیتال</p>
                                </div>

                                <div class="data-report-item">
                                    <div class="background-gradient-circle"></div>
                                    <p class="data-pre-text">بیش از</p>
                                    <div class="data-num text-gr" data-target="95">0%</div>
                                    <p class="data-title">رضایت مشتری</p>
                                    <p class="data-desc">با بیش از 95% رضایت از انجام پروژه و همکاری با همکاران و
                                        مشتریان گرامی</p>
                                </div>


                            </div>

                        </div>
                        <!--CTA Form-->
                       <?php echo do_shortcode('[raman_cta_form]')?>
                        <!--Blog-->
                        <div class="ra-blog-sec row row-mt">
                            <div class="col-12 p-0">
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
            </div>
        </div>
    </div>


<?php
get_footer();
