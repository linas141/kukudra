<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kukudra | Kavinė Kretingalėje</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
    <link rel="stylesheet" href="/assets/home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/home/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/home/css/--mp---Testimonials-Slider.css">
    <link rel="stylesheet" href="/assets/home/css/best-carousel-slide.css">
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-Animated-Back-To-Top.css">
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-CSS-Image-Slider.css">
    <link rel="stylesheet" href="/assets/home/css/dh-row-text-image-right-responsive.css">
    <link rel="stylesheet" href="/assets/home/css/ebs-contact-form.css">
    <link rel="stylesheet" href="/assets/home/css/Features-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">    
    <link rel="stylesheet" href="/assets/home/css/Pretty-Footer.css">
    <link rel="stylesheet" href="/assets/home/css/Juvi---Push-Empty-Space-20px.css">
    <link rel="stylesheet" href="/assets/home/css/Live-Hours-of-Operation.css">
	<link rel="stylesheet" href="/assets/home/css/Live-Hours-of-Operation-1.css">
    <link rel="stylesheet" href="/assets/home/css/News-Cards.css">
    <link rel="stylesheet" href="/assets/home/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="/assets/home/css/Simple-Slider.css">
    <link rel="stylesheet" href="/assets/home/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="/assets/home/css/styles.css">
    <link rel="stylesheet" href="/assets/home/css/Testimonial-Slider-9.css">
</head>
	<?= $this->element('menu') ?>

<body style="background-color: rgb(255,255,255);">
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="height: 600px;">
                    <div class="jumbotron pulse animated hero-nature carousel-hero" style="height: 600px;background-image: url(&quot;/assets/home/img/1.jpeg&quot;);filter: blur(0px); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5)">
						<div class="Push-20" style="height: 100px;"></div>
						<h1 class="hero-title"  style="font-size: 48px;">kukudra</h1>
						<p class="hero-subtitle" style="text-shadow: 1px 1px 2px black;font-size: 18px;"><br>Galite užsisakyti sales ar patiekalus, pamatyti meniu ir specialius pasiūlymus bei informaciją apie restoraną<br><br></p>
						<p><a class="btn btn-primary hero-button plat" role="button" href="/reservation/addreservation">Rezervuoti</a></p>
					</div>
                </div>
                <div class="carousel-item" style="height: 600px;">
                    <div class="jumbotron pulse animated hero-photography carousel-hero" style="height: 600px;background-image: url(&quot;/assets/home/img/2.jpg&quot;);box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5);">
                        <div class="Push-20" style="height: 100px;"></div>
                        <h1 class="hero-title">aplinka</h1>
                        <p class="hero-subtitle" style="text-shadow: 1px 1px 2px black;font-size: 18px;"><br>Skoningas, jaukus interjeras bei dėmesys kiekviena kavinės lankytojui - visa tai lemia "Kukudros" populiarumą<br><br></p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="/galerija">Peržiūrėti galeriją</a></p>
                    </div>
                </div>
                <div class="carousel-item" style="height: 600px;">
                    <div class="jumbotron pulse animated hero-technology carousel-hero" style="height: 600px;background-image: url(&quot;/assets/home/img/3.jpeg&quot;);box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5);">
                        <div class="Push-20" style="height: 100px;"></div>
                        <h1 class="hero-title">patiekalų įvairovė</h1>
                        <p class="hero-subtitle" style="text-shadow: 1px 1px 2px black;font-size: 18px;"><br>Mes savo klientams siūlome gausią patiekalų įvairovę, kuri nustebins net didžiausius gurmanus<br><br></p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="/dish/meniu">Į meniu</a></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Atgal</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"
                    style="opacity: 1;"><i class="fa fa-chevron-right"></i><span class="sr-only">Toliau</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </section>
    <div class="Push-20" style="height: 30px;"></div>
    <div class="features-clean">
        <div class="container">
            <div class="intro">
                <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">kukūdra</h1>
                <p class="text-center">Kodėl mūsų klientai renkasi mus?</p>
            </div>
            <div class="row features">
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-map-marker icon" data-bs-hover-animate="rubberBand"></i>
                    <h3 class="name">Vieta</h3>
                    <p class="description">Mes esame įsikūrė&nbsp;<br>Klaipėdos g. 16, Kretingalė, Klaipėdos apskr.<br></p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-clock-o icon" data-bs-hover-animate="rubberBand"></i>
                    <h3 class="name">Darbo valandos</h3>
                    <p class="description">Kiekvieną dieną pas mus galite apsilankyti nuo 11:00 iki 22:00, penktadienį ir šeštadienį - iki 23:00!</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-list-alt icon" data-bs-hover-animate="rubberBand"></i>
                    <h3 class="name">Rezervacijos</h3>
                    <p class="description">Galite užsisakyti salę šventei, stalelį ypatingai progai, arba garuojantį maistą internetu!</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-leaf icon" data-bs-hover-animate="rubberBand"></i>
                    <h3 class="name">Šviežūs produktai</h3>
                    <p class="description">Patiekaluose naudojame tik šviežiausius produktus, kuriuos perkame iš vietinių ūkininkų.</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-list icon" data-bs-hover-animate="rubberBand"></i>
                    <h3 class="name">Platus pasirinkimas</h3>
                    <p class="description">Savo klientams siūlome platų įvairiausių patiekalų pasirinkimą, tad išsirinkti nėra sunku net patiems išrankiausiems!</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-phone icon" data-bs-hover-animate="rubberBand"></i>
                    <h3 class="name">Pagalba</h3>
                    <p class="description">Susisiekite su mumis bet kuriuo paros metu nurodytais būdais, padėsime kai galėsime!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="Push-20" style="height: 30px;"></div>
    <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">papildoma informacija apie mus</h1>
	<div class="row" style="text-align:center;width:100% " id="parentofSnip">
    <figure class="snip1527">
      <div class="image"><img src="/assets/img/brd.jpg" alt="Įtiks didžiausiems gurmanams" /></div>
      <figcaption>
        <h3>Įtiks didžiausiems gurmanams</h3>
        <p>

          Išrankiausiems šeimininkės pasiūlys įmantriausių kepsnių, pikantiškiausių salotų, kitų šalių virtuvių valgių.
        </p>
      </figcaption>
      <a href="#"></a>
    </figure>
    <figure class="snip1527">
      <div class="image"><img src="/assets/img/sand.jpg" alt="Naudojami tik šviežiausi produktai" /></div>
      <figcaption>
        <h3>Naudojami tik šviežiausi produktai</h3>
        <p>

           Daržovės superkamos iš ūkininkų, vietiniai gyventojai taip pat čia atgabena savo daržuose užaugintų daržovių, vaisių.
        </p>
      </figcaption>
      <a href="#"></a>
    </figure>
    <figure class="snip1527">
      <div class="image"><img src="/assets/img/internet.jpg" alt="Užsakantiems internetu nuolaidos" /></div>
      <figcaption>
        <div class="date"><span class="day">IKI</span><span class="month">08.31</span></div>
        <h3>Užsakantiems internetu - nuolaidos</h3>
        <p>

          Užsisakantiems internetu suteikiame 10% nuolaidą nuo užsakymo sumos! Pasiūlymas galioja iki 08.31d.
        </p>
      </figcaption>
      <a href="#"></a>
    </figure>
    <figure class="snip1527">
      <div class="image"><img src="/assets/img/coffee.jpg" alt="Specialūs pasiūlymai" /></div>
      <figcaption>
        <h3>Specialūs pasiūlymai</h3>
        <p>
<br>
          Nuolatiniams klientams siūlome specialius pasiūlymus bei kitas nuolaidas.
        </p>
      </figcaption>
      <a href="#"></a>
    </figure>
    <figure class="snip1527">
      <div class="image"><img src="/assets/home/img/k.jpeg" alt="kvapą gniaužianti aplinka" /></div>
      <figcaption>
        <h3>Kvapą gniaužianti aplinka</h3>
        <p>

          Nuostabios nuotraukos bet kokios šventės proga, tiek viduje, tiek "Kukudros" esančiame parkelyje.
        </p>
      </figcaption>
      <a href="#"></a>
    </figure>
</div>
    <div class="Push-20" style="height: 30px;"></div>
    <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">kontaktai</h1>
    <div class="row clearmargin clearpadding row-image-txt" style="background-image: url('/assets/img/menu.jpg');">
        <div class="col-xs-12 col-sm-6 col-md-6 clearmargin clearpadding col-sm-push-6" style="background-image: url(&quot;/assets/home/img/laukas.jpg&quot;);background-size: cover;height: 400px;background-position: center;">
            <div></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-sm-pull-6" style="padding:20px;">
            <h1>kukudra</h1>
            <hr>
            <p>Kavinė jau 20 metų savo lankytojus stebina siūlomų patiekalų gausa ir įvairove. <br>Sutvarkyta nuostabi aplinka, skoningas, jaukus interjeras, dėmesys <br>kiekviena kavinės lankytojui - visa tai ir lemia "Kukudros" populiarumą.<br>Išrankiausiems
                šeimininkės pasiūlys įmantriausių kepsnių, <br>pikantiškiausių salotų, kitų šalių virtuvių valgių. Kavinėje "Kukudra" <br>visi patiekalai ruošiami tik iš geriausios kokybės šviežių produktų. <br> Daržovės superkamos iš ūkininkų, vietiniai
                gyventojai taip pat<br> čia atgabena savo daržuose užaugintų daržovių, vaisių perteklių. Ne tik<br> gera virtuve garsėja ši kavinė, ne veltui įvertina <em> "penkiais kavos puodeliais".</em> <br></p>
            <div style="text-align:center"><form action="/kontaktai"><button class="btn btn-light btn-lg" type="submit">kontaktai</button></form></div>
        </div>
    </div>
	<div class="Push-20" style="height: 30px;"></div>
	<h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 39px;">pateikite rezervaciją</h1>
	<div class="container demo-bg" style="background-color:rgb(238,244,247)">
		<div class="row"style="background-color:rgb(238,244,247); box-shadow:  1px 1px #888888">
			<div class="col-sm-8" >
				<br>
				<div class="register-photo" style="padding-top:10px;background-color:transparent;">
					<h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 20px;">pateikite norimą rezervaciją <span style="color:rgb(20,133,238)">kukudroje!</color></h1>
					<div class="form-container">
						<form action="/reservation/addreservation" method="GET" style="padding-bottom:20px;">
							<div class="form-group">
								<select class="form-control" name="selectedType" id="selectedType" required>
									<optgroup label="Rezervacijos tipas">
										<option value="Table" selected>Stalelio rezervacija</option>
										<option value="Food">Maisto rezervacija</option>
										<option value="Restaurant">Salės rezervacija</option>
									</optgroup>
								</select>
							</div>
							<div id="date">
								<input type="text" name="date" data-date-format="yyyy-mm-dd" class="form-control datepicker" id="datepicker" placeholder="Data" required onInvalid="this.setCustomValidity('Pasirinkite datą!')" onchange="this.setCustomValidity('')" >
							</div>
							<div class="form-group"><button class="btn btn-primary btn-block" type="submit">Pateikti rezervaciją</button></div>
							<?php if($user = !$this->request->getSession()->read('Auth.User'))  : ?>
							<small class="form-text text-center text-muted" style="font-size: 12;color: rgb(111,122,133);opacity: 0.90;height: 18px;margin: 0px;">Tik prisijungę vartotojai gali pateikti rezervacijas. <a href="/user/login">Prisijungti</a></small>
							<?php endif;?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="business-hours" style="background-image: url('/assets/img/menu.jpg');">
					<h2 class="title">Darbo laikas</h2>
					<ul class="list-unstyled opening-hours">
					<li>Pirmadienis <span class="pull-right">11:00-22:00</span></li>
					<li>Antradienis <span class="pull-right">11:00-22:00</span></li>
					<li>Trečiadienis <span class="pull-right">11:00-22:00</span></li>
					<li>Ketvirtadienis <span class="pull-right">11:00-22:00</span></li>
					<li>Penktadienis <span class="pull-right">11:00-23:00</span></li>
					<li>Šeštadienis <span class="pull-right">11:00-23:00</span></li>
					<li>Sekmadienis <span class="pull-right">11:00-22:00</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <div class="Push-20" style="height: 40px;"></div>
    <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">klientų atsiliepimai</h1>
	<div class="col testim" id="testim" style="background-image: url('/assets/img/menu.jpg');">
    <div class="wrap"><span id="right-arrow" class="arrow right fa fa-chevron-right"></span><span id="left-arrow" class="arrow left fa fa-chevron-left"></span>
        <ul id="testim-dots" class="dots">
            <li class="dot active"></li>
            <li class="dot"></li>
            <li class="dot"></li>
            <li class="dot"></li>
            <li class="dot"></li>
        </ul>
        <div id="testim-content" class="cont">
            <div class="active">
                <h2>Kristina</h2>
                <p><strong>Labai malonus aptarnavimas ir gan greitai bei skaniai paruošiamas maistas.<br> 
                    </strong></p>
            </div>
            <div>
                <h2>Vygantas</h2>
                <p><strong>Lankausi Kukūdroje labai dažnai, ir nei karto neteko nusivilti.</strong></p>
            </div>
            <div>
                <h2>Julija</h2>
                <p><strong>Specialiai iš Klaipėdos važiuojame su šeima į Kukudrą pavalgyti cibulines ir ant žarijų keptų šonkaulių. Sėkmės ir toliau taip skaniai gaminti.</strong></p>
            </div>
            <div>
                <h2>Rasa</h2>
                <p><strong>Labai jaukus baras-restoranas, meniu labai didelis pasirinkimas. Labai malonus aptarnaujantis personalas. Pavalgėme labai skaniai...</strong></p>
            </div>
            <div>
                <h2>Dalia</h2>
                <p><strong>Geras ir skanus maistas,greitas ir labai malonus aptarnavimas. Neapsisprendžiantiems maloniai ir protingai pataria ką rinktis. Rekomenduoju!</strong></p>
            </div>
        </div>
    </div>
</div>
    <div class="Push-20" style="height: 60px;"></div>
    <section></section>
    <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">kontaktai</h1>
    <div class="container" id="info-container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6" id="contact-box">
                <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 26px;">Susisiekite šiais būdais</h1>
				<br><br><br>
                <div class="info-box"><i class="fa fa-map-marker my-info-icons"></i><span class="text-uppercase text-info">&nbsp;ADRESAS: </span><span>Klaipėdos g. 16, Kretingalė, Klaipėdos apskr.</span></div>
                <div class="info-box"><i class="fa fa-envelope my-info-icons"></i><span class="text-uppercase text-info">El. paštas: </span><span>Kukudra@Kukudra.lt </span></div>
                <div class="info-box"><i class="fa fa-phone-square my-info-icons"></i><span class="text-uppercase text-info">telefono nr.: </span><span>(8-46) 446736</span></div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 site-form"><form id="my-form">
    <div class="form-group"><label class="sr-only" for="firstname">Vardas</label><input type="text" name="firstname"  placeholder="Vardas" class="form-control" id="firstname"/></div>
    <div class="form-group"><label class="sr-only" for="lastname">Pavardė</label><input type="text" name="lastname" placeholder="Pavardė" class="form-control" id="lastname" /></div>
    <div class="form-group"><label class="sr-only" for="phonenumber">Telefono nr.</label><input type="tel" name="phonenumber"  placeholder="Telefono nr." class="form-control" id="phonenumber" /></div>
    <div class="form-group"><label class="sr-only" for="email">El. pašto adresas</label><input type="text" name="email" required placeholder="El. pašto adresas" class="form-control" id="email" oninvalid="this.setCustomValidity('Įveskite el. pašto adresą')" oninput="this.setCustomValidity('')" /></div>
    <div class="form-group"><label class="sr-only" for="messages">Žinutė</label><textarea rows="8" name="messages" required placeholder="Žinutė" class="form-control" oninvalid="this.setCustomValidity('Įveskite žinutę')" oninput="this.setCustomValidity('')" /></textarea></div><button class="btn btn-light btn-lg" type="submit" id="form-btn">SIŲSTI </button></form></div>
            <div class="clearfix"></div>
        </div>
    </div>
	<a href="#0" class="cd-top js-cd-top cd-top--fade-out cd-top--show" style="background-image: url(&quot;/assets/home/img/cd-top-arrow.svg&quot;);background-color: rgb(20,133,238);">Top</a>
	<?= $this->element('mainfoot') ?>

<script src="/assets/home/js/--mp---Testimonials-Slider.js"></script>
    <script src="/assets/home/js/Bold-BS4-Animated-Back-To-Top.js"></script>
    <script src="https://use.fontawesome.com/1744f3f671.js"></script>
    <script src="/assets/home/js/Live-Hours-of-Operation.js"></script>
    <script src="/assets/home/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="/assets/home/js/Basic-fancyBox-Gallery.js"></script>
    <script src="/assets/home/js/--mp---Testimonials-Slider.js"></script>
    <script src="/assets/home/js/Bold-BS4-Animated-Back-To-Top.js"></script>
    <script src="/assets/home/js/bs-animation.js"></script>
    <script src="/assets/home/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    <script src="/assets/home/js/datepicker-lt.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="https://use.fontawesome.com/1744f3f671.js"></script>
    <script src="/assets/home/js/Live-Hours-of-Operation.js"></script>
    <script src="/assets/home/js/Simple-Slider1.js"></script>
    <script src="/assets/home/js/Slider_Carousel_webalgustocom.js"></script>

</body>
<script>
$(document).ready(function(){
	$('#datepicker').change(function(){
		var datepicker = document.getElementById('datepicker').value;
		$.post('/reservation/addreservation', {variable: datepicker});
	});
	<?php //header("Location: http://example.com/myOtherPage.php");
	//die();
	?>
});	
</script>
</html>