<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ url('backend/css/styles.css') }}">

    <title>Syariahrooms Hospitality</title>
</head>

<body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-up-arrow-alt scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__brand">
                <img src="{{ url('backend/img/logo.png') }}" alt="" class="logo-img">
                <a href="#" class="nav__logo">Syariahrooms <br> Hospitality</a>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">HOME</a></li>
                    <li class="nav__item"><a href="#promo" class="nav__link">PROGRAM AND PROMO</a></li>
                    <li class="nav__item"><a href="#travel" class="nav__link">TOUR AND TRAVEL</a></li>
                    <li class="nav__item"><a href="#investment" class="nav__link">PROPERTY INVESMENT INFO</a></li>
                    <li class="nav__item"><a href="#travel" class="nav__link">PRODUCT</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid bd-grid__home">
                <div class="home__img">
                    <img src="{{ url('backend/img/home.png') }}" alt="">
                </div>

                <div class="home__data">
                    <h1 class="home__title">Hello Fulan! Thank you for coming</h1>
                    <p class="home__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut, doloribus!</p>
                    <a href="#" class="button ">Get Started</a>
                </div>
            </div>
        </section>

        <!--========== PROMO ==========-->
        <section class="promo section bd-container" id="promo">
            <h2 class="section-title">Program & Promo</h2>
            <div class="promo__container bd-grid">
                <div class="promo__data">
                    <img src="{{ url('backend/img/promo.jpg' }}" alt="" class="promo__img">
                    <h3 class="promo__title">Stay 2 Nights Pay 1 Night</h3>
                    <div href="#" class="button promo__deadline">2 Days Left</i></div>
                    <a href="#" class="button promo__button"><i class='bx bxs-cart'></i></a>
                </div>

                <div class="promo__data">
                    <img src="{{ url('backend/img/promo.jpg') }}" alt="" class="promo__img">
                    <h3 class="promo__title">Stay 2 Nights Pay 1 Night</h3>
                    <div href="#" class="button promo__deadline">2 Days Left</i></div>
                    <a href="#" class="button promo__button"><i class='bx bxs-cart'></i></a>
                </div>

                <div class="promo__data">
                    <img src="{{ url('backend/img/promo.jpg') }}" alt="" class="promo__img">
                    <h3 class="promo__title">Stay 2 Nights Pay 1 Night</h3>
                    <div href="#" class="button promo__deadline">2 Days Left</i></div>
                    <a href="#" class="button promo__button"><i class='bx bxs-cart'></i></a>
                </div>
                <div class="promo__data">
                    <img src="{{ url('backend/img/promo.jpg') }}" alt="" class="promo__img">
                    <h3 class="promo__title">Stay 2 Nights Pay 1 Night</h3>
                    <div href="#" class="button promo__deadline">2 Days Left</i></div>
                    <a href="#" class="button promo__button"><i class='bx bxs-cart'></i></a>
                </div>
            </div>
        </section>

        <!--========== TRAVEL ==========-->
        <section class="promo section bd-container" id="travel">
            <h2 class="section-title">Tour and Travel</h2>
            <div class="promo__container bd-grid">
                <div class="promo__data">
                    <img src="{{ url('backend/img/travel.png') }}" alt="" class="promo__img">
                    <h3 class="travel__title">Solo Travel</h3>
                    <span class="travel__category">travel</span><br>
                    <span class="travel__preci">$9.45</span>
                    <a href="#" class="button travel__button"><i class='bx bxs-plane-alt'></i></a>
                </div>

                <div class="promo__data">
                    <img src="{{ url('backend/img/travel.png') }}" alt="" class="promo__img">
                    <h3 class="travel__title">Solo Travel</h3>
                    <span class="travel__category">travel</span><br>
                    <span class="travel__preci">$9.45</span>
                    <a href="#" class="button travel__button"><i class='bx bxs-plane-alt'></i></a>
                </div>

                <div class="promo__data">
                    <img src="{{ url('backend/img/travel.png') }}" alt="" class="promo__img">
                    <h3 class="travel__title">Solo Travel</h3>
                    <span class="travel__category">travel</span><br>
                    <span class="travel__preci">$9.45</span>
                    <a href="#" class="button travel__button"><i class='bx bxs-plane-alt'></i></a>
                </div>
                <div class="promo__data">
                    <img src="{{ url('backend/img/travel.png') }}" alt="" class="promo__img">
                    <h3 class="travel__title">Solo Travel</h3>
                    <span class="travel__category">travel</span><br>
                    <span class="travel__preci">$9.45</span>
                    <a href="#" class="button travel__button"><i class='bx bxs-plane-alt'></i></a>
                </div>
                <div class="promo__data">
                    <img src="{{ url('backend/img/travel.png') }}" alt="" class="promo__img">
                    <h3 class="travel__title">Solo Travel</h3>
                    <span class="travel__category">travel</span><br>
                    <span class="travel__preci">$9.45</span>
                    <a href="#" class="button travel__button"><i class='bx bxs-plane-alt'></i></a>
                </div>
            </div>
        </section>



        <!--========== INVESTMENT ==========-->
        <section class="invest section" id="investment">
            <div class="invest__container bd-container bd-grid">
                <div class="invest__content">
                    <h2 class="section-title-center invest__title">Investment</h2>
                    <p class="invest__description">Drop your email and get the best investment information</p>
                    <form action="">
                        <div class="invest__direction">
                            <input type="text" placeholder="Email address" class="invest__input">
                            <a href="#" class="button">Gas</a>
                        </div>
                    </form>
                </div>

                <div class="invest__img">
                    <img src="{{ url('backend/img/investment.png') }}" alt="">
                </div>
            </div>
        </section>
    </main>

    <!--========== FOOTER ==========-->
    <footer class="footer section">
        <div class="footer__container bd-container bd-grid">
            <div class="footer__content">
                <h3 class="footer__title">
                    <a href="#" class="footer__logo">Syariahrooms</a>
                </h3>
                <p class="footer__description">Temukan kenyamanan menginap seperti rumah sendiri dengan #staywithsyariah </p>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Services</h3>
                <ul>
                    <li><a href="#" class="footer__link">Pricing </a></li>
                    <li><a href="#" class="footer__link">Discounts</a></li>
                    <li><a href="#" class="footer__link">Hospitality</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Company</h3>
                <ul>
                    <li><a href="#" class="footer__link">Blog</a></li>
                    <li><a href="#" class="footer__link">About us</a></li>
                    <li><a href="#" class="footer__link">Our mision</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Social</h3>
                <a href="#" class="footer__social"><i class='bx bxl-facebook-circle '></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#" class="footer__social" title="whatsapp"><i class='bx bxl-whatsapp'></i></a>
            </div>
        </div>

        <p class="footer__copy">&#169; <span id="years" onload="yearsUpdate()"></span> Alfath Academy. All right reserved</p>
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
    <!--========== MAIN JS ==========-->
    <script src="{{ url('backend/js/main.js') }}"></script>
    @yield('script')
</body>

</html>