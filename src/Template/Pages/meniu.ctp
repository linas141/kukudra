<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Galerija » Kukudra | Kavinė Kretingalėje</title>
    <link rel="stylesheet" href="/assets/home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/home/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-Animated-Back-To-Top.css">
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-CSS-Image-Slider.css">
    <link rel="stylesheet" href="/assets/home/css/dh-row-text-image-right-responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="/assets/home/css/Pretty-Footer.css">   
    <link rel="stylesheet" href="/assets/home/css/News-Cards.css">
    <link rel="stylesheet" href="/assets/home/css/Juvi---Push-Empty-Space-20px.css">
    <link rel="stylesheet" href="/assets/home/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="/assets/home/css/styles.css">
</head>

<body>
	<?= $this->element('menu') ?>
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox"></div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"
                    style="opacity: 1;"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators"></ol>
        </div>
    </section>
    <div class="Push-20" style="height: 30px;"></div>
    <div class="Push-20" style="height: 30px;"></div>
    <div class="Push-20" style="height: 60px;"></div>
    <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">galerija</h1>
    <div class="container">
        <div class="row flex-box flex-wrap-wrap">
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a href="/assets/home/img/hero-background-nature.jpg" class="fancybox" rel="gallery1" title="Hero Image Nature"><img class="img-fluid" src="/assets/home/img/hero-background-nature.jpg"></a></div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a href="/assets/home/img/hero-background-technology.jpg" class="fancybox" rel="gallery1" title="Hero Image Technology"><img class="img-fluid" src="/assets/home/img/hero-background-technology.jpg"></a></div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a href="/assets/home/img/hero-background-travel.jpg" class="fancybox" rel="gallery1" title="Hero Image Travel"><img class="img-fluid" src="/assets/home/img/hero-background-travel.jpg"></a></div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a href="/assets/home/img/hero-background-food.jpg" class="fancybox" rel="gallery1" title="Hero Image Food"><img class="img-fluid" src="/assets/home/img/hero-background-food.jpg"></a></div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a href="/assets/home/img/hero-background-music.jpg" class="fancybox" rel="gallery1" title="Hero Image Music"><img class="img-fluid" src="/assets/home/img/hero-background-music.jpg"></a></div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center"><a href="/assets/home/img/hero-background-photography.jpg" class="fancybox" rel="gallery1" title="Hero Image Photography"><img class="img-fluid" src="/assets/home/img/hero-background-photography.jpg"></a></div>
        </div>
    </div><a href="#0" class="cd-top js-cd-top cd-top--fade-out cd-top--show" style="background-image: url(&quot;/assets/home/img/cd-top-arrow.svg&quot;);background-color: rgb(20,133,238);">Top</a><footer>
    <div class="row">
        <div class="col-sm-6 col-md-4 footer-navigation">
            <h3><a href="#">kukudra</a></h3>
            <p class="links"><a href="/">Pradžia</a><strong> · </strong><a href="/reservation/addreservation">Rezervacijos</a><strong> · </strong><a href="/pages/kontaktai">Kontaktai</a><strong> · </strong><a href="/special-offers/offers">Specialūs pasiūlymai</a><strong> · </strong>
                <a
                    href="/user/profile">Vartotojas</a>
            </p>
            <p class="company-name">UAB Kukudra</p>
        </div>
        <div class="col-sm-6 col-md-4 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"></span>
                <p><span class="new-line-span">Klaipėdos g. 16</span> Kretingalė, Klaipėdos apskr.</p>
            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-info email text-left"><a href="callto:846446736">(8-46) 446736</a></p>
            </div>
            <div><i class="fa fa-envelope footer-contacts-icon" style></i>
                <p><a href="mailto:Kukudra@Kukudra.lt" target="_blank"><br />Kukudra@Kukudra.lt<br /></a></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4 footer-about">
            <h4>Apie mus</h4>
            <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet. </p>
            <div class="social-links social-icons"><a href="https://www.facebook.com/kukudra"><i class="fa fa-facebook"></i></a><a href="https://www.instagram.com/kukudrakretingale/"><i class="fa fa-instagram"></i></a></div>
        </div>
    </div>
</footer>    
	<script src="/assets/home/js/jquery.min.js"></script>
    <script src="/assets/home/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="/assets/home/js/Basic-fancyBox-Gallery.js"></script>
    <script src="/assets/home/js/Bold-BS4-Animated-Back-To-Top.js"></script>
    <script src="/assets/home/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="https://use.fontawesome.com/1744f3f671.js"></script>
    <script src="/assets/home/js/Simple-Slider1.js"></script>
    <script src="/assets/home/js/Slider_Carousel_webalgustocom.js"></script>
</body>

</html>