<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{ url('backend/css/styles.css') }}">

        <title>Syariahrooms Hospotality</title>
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
                    <a href="#" class="nav__logo">Syariahrooms <br> Hospotality</a>
                </div>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active-link">HOME</a></li>
                        <li class="nav__item"><a href="#promo" class="nav__link">PROGRAM AND PROMO</a></li>
                        <li class="nav__item"><a href="#travel" class="nav__link">TOUR AND TRAVEL</a></li>
                        <li class="nav__item"><a href="#investment" class="nav__link">PROPERTY INVESMENT INFO</a></li>
                        <li class="nav__item"><a href="#reach" class="nav__link">TELL US</a>
                        </li>
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
                    @foreach($promo as $promo)
                    <?php
                        $datestr=$promo->expired;
                        $date=strtotime($datestr);//Converted to a PHP date (a second count)

                        //Calculate difference
                        $diff=$date-time();//time returns current time in seconds
                        $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                        $hours=round(($diff-$days*60*60*24)/(60*60));
                    ?>
                    <div class="promo__data">
                        <img src="{{ url('/asset/img') . '/' . $promo->image }}" alt="" class="promo__img">
                        <h3 class="promo__title" style="margin-bottom: 40px">{{$promo->title}}</h3>
                        <div href="#" class="button promo__deadline">{{ $days . 'hari ' . $hours. 'jam' }}</i></div>
                        <a href="#" class="button promo__button"><i class='bx bxs-cart'></i></a>
                    </div>
                    @endforeach
                </div>
            </section>
             <!--========== TRAVEL ==========-->
             <section class="promo section bd-container" id="travel">
                <h2 class="section-title">Tour and Travel</h2>
                <div class="promo__container bd-grid">
                    @foreach($travel as $travel)
                    <div class="promo__data">
                        <img src="{{ url('/asset/img') . '/' . $travel->image }}" alt="" class="promo__img">
                        <h3 class="travel__title">{{$travel->title}}</h3>
                        <span class="travel__category">travel</span><br>
                        <span class="travel__preci">
                            {{ $travel->price }}
                            <span style="font-size: 10px;font-weight:400">
                                IDR
                            </span>
                        </span>
                        <a href="#" class="button travel__button"><i class='bx bxs-plane-alt'></i></a>
                    </div>
                    @endforeach
                </div>
            </section>



            <!--========== INVESTMENT ==========-->
            <section class="invest section bd-container" id="invest">
                <h2 class="section-title">Investment Info</h2>
                    <div class="slideshow-container promo__container">

                        <!-- Full-width images with number and caption text -->
                        @foreach ($investment as $invest)
                        <div class="mySlides fade">
                            <div class="slide-control">
                              <img
                              src="{{ url('/asset/img') . '/' . $invest->image }}"
                              style="width:100%">
                              <div class="image-darken"></div>
                              <div id="text">
                                <h2 class="invest__title">{{$invest->title}}</h2>
                                <p class="invest_description">{{$invest->description}}</p>
                              </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                      </div>
            </section>

            <!--========== INVESTMENT ==========-->
            <section class="promo section bd-container form-container hideForm" id="reach">
                <div class="screen " id="screen">
                    <div class="screen-header">
                      <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                        <div class="screen-header-button maximize"></div>
                        <div class="screen-header-button minimize"></div>
                      </div>
                      <div class="screen-header-right" onclick="toogleClick()">
                        <i class='bx bxs-chevron-down-square'></i>
                      </div>
                    </div>
                    <div class="screen-body">
                      <div class="screen-body-item left">
                        <div class="app-title">
                          <span>Tell Us</span>
                          <span>Your Thought</span>
                        </div>
                      </div>
                      <div class="screen-body-item">
                        <form  id="sendMessage" class="app-form" action="{{route('kirim')}}" method="POST">         
                            @csrf                  
                          <div class="app-form-group">
                            <input 
                            type="text" 
                            class="app-form-control" 
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="NAME">
                          </div>
                          <div class="app-form-group">
                            <div class="disabled">+62</div>
                            <input 
                            type="tel" 
                            pattern="{0-9}"
                            class="app-form-control disabled-place"
                            name="phoneNumber" 
                            value="{{ old('phoneNumber') }}"
                            placeholder="PHONE NUMBER" >
                          </div>
                          <div class="app-form-group message">
                            <input 
                            type="text"
                            class="app-form-control"
                            name="message" 
                            value="{{ old('message') }}" 
                            placeholder="message"
                            style="text-transform: unset"
                            >
                          </div>
                          <div></div>
                          </div>
                          <div class="app-form-group buttons">
                            <button class="app-form-button" 
                            type="submit" 
                            >SEND</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </section>
                <div class="button toggle-button" id="toggle-button"onclick="toogleClick()">
                    <div class="inside-fixed">
                        <i class='bx bxs-like'></i>
                        <span style="margin-left: .5rem;">Review Kami</span>
                    </div>
                </div>
            </main>
        <!--========== FOOTER ==========-->
        <footer class="footer section">
            <div class="footer__container bd-container bd-grid">
                <div class="footer__content">
                    <h3 class="footer__title">
                        <a href="#" class="footer__logo">Syariahrooms</a>
                    </h3>
                    <p class="footer__description">Find the convenience as your sweet home has with #staysyariah</p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Pricing </a></li>
                        <li><a href="#" class="footer__link">Discounts</a></li>
                        <li><a href="#" class="footer__link">Hospotality</a></li>
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
        <script>

        </script>
        <!--========== MAIN JS ==========-->
        <script src="{{ url('backend/js/main.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session()->has('user'))
            <div class="alert alert-success">
                <script>
                    swal(`Thankyou {{ session()->get('user') }}!`,"Your message is sent to us","success");
                </script>   
            </div>
       @endif
       @if(session()->has('errorMessage'))
           <div class="alert alert-fail">
               <script>
                   swal(`{{ session()->get('errorMessage') }}!`,"","error");
               </script>   
           </div>         
       @endif
    </body>
</html>
