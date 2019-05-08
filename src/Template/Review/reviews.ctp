<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Atsiliepimai 	 Kukudra | Kavinė Kretingalėje</title>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="/assets/css/review.css">
	</head>

	<body>
		<?= $this->element('menu') ?>
		<div class="Push-20" style="height: 120px;"></div>
		<h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">atsiliepimai</h1>
		<h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 20px;">skaitykite paliktus atsiliepimus ir <span style="color:rgb(20,133,238)">palikite savo!</color></h1>
		<div class="Push-20" style="height: 10px;"></div>
		
		<div class="container">
		<?= $this->Flash->render(); ?>
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">Atsiliepimai apie darbuotojus</label>

			<input id="tab2" type="radio" name="tabs">
			<label for="tab2">Atsiliepimai apie aplinką</label>

			<input id="tab3" type="radio" name="tabs">
			<label for="tab3">Atsiliepimai apie maistą</label>

			<input id="tab4" type="radio" name="tabs">
			<label for="tab4">Palikti atsiliepimą</label>

			<section id="content1">
			<div class="Push-20" style="height: 20px;"></div>
	<!--
			<div class="col-md-12">
			Šiame skyrelyje pateikiame naudotojų pateiktus atsiliepimus apie mūsų darbuotojus. Pateiktus nepriimtinus atsiliepimus <span style="color:red">panaikiname</span>.
			</div>
-->					<div class="Push-20" style="height: 20px;"></div>
					<?php if($employeeReviews->count() > 0): ?>
						<ul class="list-group">
							<?php foreach ($employeeReviews as $review): ?>
							<li class="list-group-item">
								<div class="media">
									<div class="media-body">
										<div class="media" style="overflow:visible;">
											<div class="media-body" style="overflow:visible;">
												<div class="row">
													<div class="col-md-10">
														<h5 color="#6c757d" style="display:inline;"><?=  substr($review->review->user->First_name, 0, 1) . '. ' . $review->review->user->Last_name  . ' įvertino darbuotoją ' . substr($review->user->First_name, 0, 1) . '. ' . $review->user->Last_name  ?></h5>&nbsp;<?php $stars=$this->Number->format($review->review->rating); 
														for($i=0; $i<$stars; $i++):?><i class="fa fa-star fa-fw" style="color:#ffbf03"></i><?php endfor;$v=5-$stars;for($i = 0; $i <$v; $i++): ?><i class="fa fa-star fa-fw" style="color:grey"></i><?php endfor;?>
														<p style="font-size:14px;"><small class="text-muted"><?= h($review->review->datePublished) ?></small></p>
														<p style="color:#6c757d; font-size:14px; font-weight:normal;"><?= h($review->review->Review) ?></p>
													</div>
													<?php $user = $this->request->getSession()->read('Auth.User'); if($user['role']=='admin') :?>
													<div class="col-md-2">
														<div class="dropdown pull-right">
															<button class="btn btn-link btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">
																<i class="fa fa-chevron-down"></i>
															</button>
															<div role="menu" class="dropdown-menu dropdown-menu-right">
															<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')).' Naikinti', ['action' => 'delete', $review->id_Review], array('class'=>'dropdown-item', 'confirm' => __('Ar tikrai norite pašalinti {0} atsiliepimą?', $review->review->user->Last_name), 'escape'=>false)); ?>
															<?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil fa-fw')).' Redaguoti', ['action' => 'edit', $review->id_Review], array('class'=>'dropdown-item', 'escape'=>false)) ?>
															</div>
														</div>
													</div>
													<?php endif;?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php else :?>
						Nėra atsiliepimų!
						<?php endif;?>
			</section>
			<section id="content2">
					<?php if($enviromentReviews->count() > 0): ?>
						<ul class="list-group">
							<?php foreach ($enviromentReviews as $review): ?>
							<li class="list-group-item">
								<div class="media">
									<div class="media-body">
										<div class="media" style="overflow:visible;">
											<div class="media-body" style="overflow:visible;">
												<div class="row">
													<div class="col-md-10">
														<h5 color="#6c757d" style="display:inline;"><?=  substr($review->review->user->First_name, 0, 1) . '. ' . $review->review->user->Last_name  . ' įvertino aplinką ' ?></h5><?php $stars=$this->Number->format($review->review->rating); 
														for($i=0; $i<$stars; $i++):?><i class="fa fa-star fa-fw" style="color:#ffbf03"></i><?php endfor;$v=5-$stars;for($i = 0; $i <$v; $i++): ?><i class="fa fa-star fa-fw" style="color:grey"></i><?php endfor;?>
														<p style="font-size:14px;"><small class="text-muted"><?= h($review->review->datePublished) ?></small></p>
														<p style="color:#6c757d; font-size:14px; font-weight:normal;"><?= h($review->review->Review) ?></p>
													</div>
													<?php $user = $this->request->getSession()->read('Auth.User'); if($user['role']=='admin') :?>
													<div class="col-md-2">
														<div class="dropdown pull-right">
															<button class="btn btn-link btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">
																<i class="fa fa-chevron-down"></i>
															</button>
															<div role="menu" class="dropdown-menu dropdown-menu-right">
															<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')).' Naikinti', ['action' => 'delete', $review->id_Review], array('class'=>'dropdown-item', 'confirm' => __('Ar tikrai norite pašalinti {0} atsiliepimą?', $review->review->user->Last_name), 'escape'=>false)); ?>
															<?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil fa-fw')).' Redaguoti', ['action' => 'edit', $review->id_Review], array('class'=>'dropdown-item', 'escape'=>false)) ?>
															</div>
														</div>
													</div>
													<?php endif;?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php else :?>
						Nėra atsiliepimų!
						<?php endif;?>
			</section>
			<section id="content3">
					<?php if($foodReviews->count() > 0): ?>
						<ul class="list-group">
							<?php foreach ($foodReviews as $review): ?>
							<li class="list-group-item">
								<div class="media">
									<div class="media-body">
										<div class="media" style="overflow:visible;">
											<div class="media-body" style="overflow:visible;">
												<div class="row">
													<div class="col-md-10">
														<h5 color="#6c757d" style="display:inline;"><?=  substr($review->review->user->First_name, 0, 1) . '. ' . $review->review->user->Last_name  . ' įvertino maistą ' ?></h5><?php $stars=$this->Number->format($review->review->rating); 
														for($i=0; $i<$stars; $i++):?><i class="fa fa-star fa-fw" style="color:#ffbf03"></i><?php endfor;$v=5-$stars;for($i = 0; $i <$v; $i++): ?><i class="fa fa-star fa-fw" style="color:grey"></i><?php endfor;?>
														<p style="font-size:14px;"><small class="text-muted"><?= h($review->review->datePublished) ?></small></p>
														<p style="color:#6c757d; font-size:14px; font-weight:normal;"><?= h($review->review->Review) ?></p>
													</div>
													<?php $user = $this->request->getSession()->read('Auth.User'); if($user['role']=='admin') :?>
													<div class="col-md-2">
														<div class="dropdown pull-right">
															<button class="btn btn-link btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">
																<i class="fa fa-chevron-down"></i>
															</button>
															<div role="menu" class="dropdown-menu dropdown-menu-right">
															<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-o fa-fw')).' Naikinti', ['action' => 'delete', $review->id_Review], array('class'=>'dropdown-item', 'confirm' => __('Ar tikrai norite pašalinti {0} atsiliepimą??', $review->review->user->Last_name), 'escape'=>false)); ?>
															<?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil fa-fw')).' Redaguoti', ['action' => 'edit', $review->id_Review], array('class'=>'dropdown-item', 'escape'=>false)) ?>
															</div>
														</div>
													</div>
													<?php endif;?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php else :?>
						Nėra atsiliepimų!
						<?php endif;?>
			</section>
			<section id="content4">
				<?php if(!$this->request->getSession()->read('Auth.User')):?>
					<br><h4 class="display-3 text-uppercase text-center" style=" font-size:30px;">norėdami palikti atsiliepimą, <span style="color:rgb(20,133,238)"><a href="/user/login">prisijunkite!</a></color></h1>
				<?php else :?>
					<?= $this->Form->create() ?>
						<div class="form-group">
							<label class="control-label" for="selectedReview">Atsiliepimo tipas</label>
							<select id="selectedReview" name="selectedReview" class="form-control">
								<option value="">-- Pasirinkite atsiliepimo tipą --</option>
								<option value="enviroment">Aplinkos atsiliepimas</option>
								<option value="employee">Darbuotojo atsiliepimas</option>
								<option value="food">Maisto atsiliepimas</option>
							</select>
						</div>
						<div class='rating-stars text-center' id="divRate" style="display:none;">
							<div class="form-group" style="text-align:left">
							<label class="control-label" for="stars">Įvertinimas</label>
							<ul id='stars' required>
								<li class='star' name="stars" title='Labai blogai' data-value='1'>
									<i class='fa fa-star fa-fw'></i>
								</li>
								<li class='star' name="stars" title='Blogai' data-value='2'>
									<i class='fa fa-star fa-fw'></i>
								</li>
								<li class='star' name="stars" title='Vidutiniškai' data-value='3'>
									<i class='fa fa-star fa-fw'></i>
								</li>
								<li class='star' name="stars" title='Gerai' data-value='4'>
									<i class='fa fa-star fa-fw'></i>
								</li>
								<li class='star' name="stars" title='Puikiai!' data-value='5'>
									<i class='fa fa-star fa-fw'></i>
								</li>
							</ul>
							<div class='success-box'>
								<div class='text-message'></div>
							</div>
							</div>
						</div>  
						<div class="form-group" id="employeeDiv" style="display:none;">
							<?= $this->Form->input('selected', array('label' => 'Darbuotojas(pasirinkite iš sąrašo)', 'id'=>'selected','type' => 'select', 'options' => $employeearray));?>
						</div>
						<div id="div1"></div>
					<?= $this->Form->end() ?>
				<?php endif;?>
			</section>
			</div>
			<a href="#0" class="cd-top js-cd-top cd-top--fade-out cd-top--show" style="background-image: url(&quot;/assets/home/img/cd-top-arrow.svg&quot;);background-color: rgb(20,133,238);">Top</a>
	<?= $this->element('mainfoot') ?>
	<script src="/assets/js/review.js"</script>
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