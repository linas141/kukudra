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
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-Animated-Back-To-Top.css">
    <link rel="stylesheet" href="/assets/home/css/ebs-contact-form.css">    
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/assets/home/css/Pretty-Footer.css">
    <link rel="stylesheet" href="/assets/home/css/Juvi---Push-Empty-Space-20px.css">
    <link rel="stylesheet" href="/assets/home/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="/assets/home/css/styles.css">
	<link rel="stylesheet" href="/assets/css/menu.css"/>
	<style>
	footer{
		margin-top:0px;
	}
	.owl-carousel.home-slider .slider-item .overlay{
		position: absolute;
top: 0;
bottom: 0;
left: 0;
right: 0;
background: #000;
opacity: .5;
	}
	.owl-carousel.home-slider .slider-item{
	background-size: cover;
background-repeat: no-repeat;
background-position: center center;
height: 750px;
position: relative;
z-index: 0;	
	}.owl-carousel.home-slider .slider-item .slider-text h1 {
    text-transform: uppercase;
    font-size: 40px;
    color: #fff;
    line-height: 1.5;
    font-weight: normal;
    letter-spacing: 1px;
}.mt-5, .my-5 {
    margin-top: 3rem !important;
}
	</style>
</head>

<body>
	<?= $this->element('menu') ?>
	   <div class="Push-20" style="height: 40px;"></div>
	   <section class="home-slider owl-carousel img" style="height: 40%;">

      <div class="slider-item" style="background-image: url(/assets/img/bg_3.jpg); height: 100%;"">
      	<div class="overlay"></div>
        <div class="container" style="height: 40%;">
          <div class="row slider-text justify-content-center align-items-center" style="height: 40%;">

            <div class="col-md-7 col-sm-12 text-center ftco-animate" style="height: 40% !important;"><div class="Push-20" style="height: 40px;"></div>
            	<h1 class="mb-3 mt-5 bread">Meniu</h1><br>
	            <p class="breadcrumbs"><span class="mr-2" style="color:#fff">Kukudros siūlomi patiekalai, pritrenkiantys savo išvaizda ir skoniu!</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

	<section class="menu-section spad set-bg" data-setbg="/assets/img/menu.jpg">
		<div class="container">
			<div class="section-title text-white">
				<h2>Patiekalų tipai</h2>
			</div>
			<!-- menu tab nav -->
			<ul class="menu-tab-nav nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Užkandžiai</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Salotos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Pagrindiniai patiekalai</a>
				</li>
	<!--			<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">--</a>
				</li>
	-->		</ul>
			<div class="tab-content menu-tab-content">
				<!-- single tab content -->
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
					<div class="row"><?php $i=0;?>
						<?php foreach ($uzkandziai as $uzkandis): ?>
							<?php if($i % 2 == 0):?>
								<div class="col-lg-6">
									<div class="menu-item">
										<h5><?= h($uzkandis->Name) ?></h5>
										<div class="mi-meta">
											<p><?= h($uzkandis->Contains_products) ?></p>
											<div class="menu-price"><?= $this->Number->format($uzkandis->Price) ?>€</div>
										</div>
									</div>
								</div>
							<?php else:?>
								<div class="col-lg-6">
									<div class="menu-item">
										<h5><?= h($uzkandis->Name) ?></h5>
										<div class="mi-meta">
											<p><?= h($uzkandis->Contains_products) ?></p>
											<div class="menu-price"><?= $this->Number->format($uzkandis->Price) ?>€</div>
										</div>
									</div>
								</div>
							<?php endif; $i++?>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- single tab content -->
				<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
					<div class="row"><?php $y=0;?>
						<?php foreach ($salotos as $salota): ?>
							<?php if($y % 2 == 0):?>
								<div class="col-lg-6">
									<!-- menu item -->
									<div class="menu-item">
										<h5><?= h($salota->Name) ?></h5>
										<div class="mi-meta">
											<p><?= h($salota->Contains_products) ?></p>
											<div class="menu-price"><?= $this->Number->format($salota->Price) ?>€</div>
										</div>
									</div>
								</div>
							<?php else:?>
								<div class="col-lg-6">
									<div class="menu-item">
										<h5><?= h($salota->Name) ?></h5>
										<div class="mi-meta">
											<p><?= h($salota->Contains_products) ?></p>
											<div class="menu-price"><?= $this->Number->format($salota->Price) ?>€</div>
										</div>
									</div>
								</div>
							<?php endif; $y++?>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- single tab content -->
				<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
					<div class="row">
						<div class="col-lg-6">
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs with ham</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$9.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs in Puff Pastry</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$11.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Eggs Benedict</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$6.00</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs with ham</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$9.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs in Puff Pastry</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$11.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Eggs Benedict</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$6.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Soft-Boiled Organic Egg</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$8.00</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- single tab content -->
				<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
					<div class="row">
						<div class="col-lg-6">
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs with ham</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$9.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs in Puff Pastry</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$11.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Eggs Benedict</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$6.00</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs with ham</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$9.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Scrambled Eggs in Puff Pastry</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$11.00</div>
								</div>
							</div>
							<!-- menu item -->
							<div class="menu-item">
								<h5>Eggs Benedict</h5>
								<div class="mi-meta">
									<p>with wild mushrooms and asparagus</p>
									<div class="menu-price">$6.00</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?= $this->element('mainfoot') ?>
	<script src="/assets/home/js/jquery.min.js"></script>
    <script src="/assets/home/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/home/js/Bold-BS4-Animated-Back-To-Top.js"></script>
	<script src="/assets/js/menu.js"></script>

</body>
</html>
