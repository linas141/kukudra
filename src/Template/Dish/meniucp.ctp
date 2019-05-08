<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Meniu » Kukudra | Kavinė Kretingalėje</title>
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

  
  <!-- Dish section -->
<br>  <section id="dish-menu-section">
    <div class="content">
        <div class="container" style="background: rgba(25, 25, 25, .6); border-radius:15px;"><br><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <div class="mu-title">
              <span class="mu-subtitle" style="color:#fff">Mes Jums siūlome šiuos patiekalus</span>
              <h2 style="color:#fff">Restorano meniu</h2><br><br>
            </div>
                </div>
            </div><br>
            <div class="row">
                <!-- Užkandžiai -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title" style="font-size:30px;">Užkandžiai</h3>            
						<?php foreach ($uzkandziai as $uzkandis): ?>

                        <div class="menu-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><?= h($uzkandis->Name) ?></h5>
                                        <span class="dish-meta"><?= h($uzkandis->Contains_products) ?></span>
                                        <div class="dish-price">
                                        <p><?= $this->Number->format($uzkandis->Price) ?>€</p>
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>            
						<?php endforeach; ?>
                    </div>
                </div>
                <!-- Užkandžiai -->
                <!-- sriubos -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title" style="font-size:30px;">Sriubos</h3>
						<?php foreach ($sriubos as $sriuba): ?>
                        <div class="menu-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><?= h($sriuba->Name) ?></h5>
                                        <span class="dish-meta"><?= h($sriuba->Contains_products) ?></span>
                                        <div class="dish-price">
                                        <p><?= $this->Number->format($sriuba->Price) ?>€</p>
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>            
						<?php endforeach; ?>
                    </div>
                </div>
                <!-- sriubos -->
                <!-- Salotos -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title" style="font-size:30px;">Salotos</h3>
						<?php foreach ($salotos as $salota): ?>
                        <div class="menu-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><?= h($salota->Name) ?></h5>
                                        <span class="dish-meta"><?= h($salota->Contains_products) ?></span>
                                        <div class="dish-price">
                                        <p><?= $this->Number->format($salota->Price) ?>€</p>
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>            
						<?php endforeach; ?>
                    </div>
                </div>
                <!-- Salotos -->
            </div><br><br>
			<div class="row">
                <!-- Dienos pietūs -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title" style="font-size:30px;">Dienos pietūs</h3>            
						<?php foreach ($dienos as $diena): ?>

                        <div class="menu-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><?= h($diena->Name) ?></h5>
                                        <span class="dish-meta"><?= h($diena->Contains_products) ?></span>
                                        <div class="dish-price">
                                        <p><?= $this->Number->format($diena->Price) ?>€</p>
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>            
						<?php endforeach; ?>
                    </div>
                </div>
                <!-- Dienos pietūs -->
                <!-- Pagrindiniai patiekalai -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title" style="font-size:30px;">Pagrindiniai patiekalai</h3>
						<?php foreach ($pagrindiniai as $pagrindinis): ?>
                        <div class="menu-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><?= h($pagrindinis->Name) ?></h5>
                                        <span class="dish-meta"><?= h($pagrindinis->Contains_products) ?></span>
                                        <div class="dish-price">
                                        <p><?= $this->Number->format($pagrindinis->Price) ?>€</p>
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>            
						<?php endforeach; ?>
                    </div>
                </div>
                <!-- Pagrindiniai patiekalai -->
                <!-- desertai -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb40">
                    <div class="menu-block">
                        <h3 class="menu-title" style="font-size:30px;">Desertai</h3>
						<?php foreach ($desertai as $desertas): ?>
                        <div class="menu-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dish-content">
                                        <h5 class="dish-title"><?= h($desertas->Name) ?></h5>
                                        <span class="dish-meta"><?= h($desertas->Contains_products) ?></span>
                                        <div class="dish-price">
                                        <p><?= $this->Number->format($desertas->Price) ?>€</p>
                                    </div>
                                    </div>
                                 </div>
                            </div>
                        </div>            
						<?php endforeach; ?>
                    </div>
                </div>
                <!-- desertai -->
            </div><br><br>
        </div>
    </div>
</section>  

  <!-- End Contact section -->


	<?= $this->element('mainfoot') ?>
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