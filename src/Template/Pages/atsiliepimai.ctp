<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Kukudra | Restoranas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
	
	<link rel="stylesheet" href="/assets/css/styleTab.css"> <!-- Resource style -->

    <!-- Font awesome -->
    <link href="/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-datepicker.css">   
     <!-- Gallery Lightbox -->
    <link href="/assets/css/magnific-popup.css" rel="stylesheet"> 
    <!-- Theme color -->
    <link id="switcher" href="/assets/css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="/style.css" rel="stylesheet">    

   <script src="../jquery/development-bundle/ui/i18n/jquery.ui.datepicker-sv.js"></script>
    <!-- Google Fonts -->

    <!-- Prata for body  -->
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <!-- Tangerine for small title -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>   
    <!-- Open Sans for title -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	</head>
	<body>

	<!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
		<i class="fa fa-angle-up"></i>
    </a>
	<!-- END SCROLL TOP BUTTON -->

	<?= $this->element('menu') ?>


	<br><br>

	<!-- Start Contact section -->
	<section id="mu-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-contact-area">
						<div class="mu-title">
							<span class="mu-subtitle">Atsiliepimai</span>
							<h2>Perskaitykite mūsų atsiliepimus, bei palikite savo!</h2>
						</div>
						<div class="mu-contact-content">
							<div class="row">
								<div class="cd-tabs js-cd-tabs">
									<nav>
										<ul class="cd-tabs__navigation js-cd-navigation">
											<li><a data-content="user" class="cd-selected" href="#0">Darbuotojų atsiliepimai</a></li>
											<li><a data-content="enviroment" href="#0">Aplinkos atsiliepimai</a></li>
											<li><a data-content="food" href="#0">Maisto atsiliepimai</a></li>
											<li><a data-content="leave" href="#0">Palikti atsiliepimą</a></li>
										</ul> <!-- cd-tabs__navigation -->
									</nav>

									<ul class="cd-tabs__content js-cd-content" id="reviewcontent">
										<li data-content="user" class="cd-selected">


											<p>Inbox Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum recusandae rem animi accusamus quisquam reprehenderit sed voluptates, numquam, quibusdam velit dolores repellendus tempora corrupti accusantium obcaecati voluptate totam eveniet laboriosam?</p>

											<p>Inbox Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum recusandae rem animi accusamus quisquam reprehenderit sed voluptates, numquam, quibusdam velit dolores repellendus tempora corrupti accusantium obcaecati voluptate totam eveniet laboriosam?</p>
										</li>

										<li data-content="enviroment">
											<p>New Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non a voluptatibus, ex odit totam cumque nihil eos asperiores ea, labore rerum. Doloribus tenetur quae impedit adipisci, laborum dolorum eaque ratione quaerat, eos dicta consequuntur atque ex facere voluptate cupiditate incidunt.</p>

											<p>New Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non a voluptatibus, ex odit totam cumque nihil eos asperiores ea, labore rerum. Doloribus tenetur quae impedit adipisci, laborum dolorum eaque ratione quaerat, eos dicta consequuntur atque ex facere voluptate cupiditate incidunt.</p>
										</li>

										<li data-content="food">
											<p>Gallery Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tenetur aut, cupiditate, libero eius rerum incidunt dolorem quo in officia.</p>

											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ipsa vero, culpa doloremque voluptatum consectetur mollitia, atque expedita unde excepturi id, molestias maiores delectus quos molestiae. Ab iure provident adipisci eveniet quisquam ratione libero nam inventore error pariatur optio facilis assumenda sint atque cumque, omnis perspiciatis. Maxime minus quam voluptatum provident aliquam voluptatibus vel rerum. Soluta nulla tempora aspernatur maiores! Animi accusamus officiis neque exercitationem dolore ipsum maiores delectus asperiores reprehenderit pariatur placeat, quaerat sed illum optio qui enim odio temporibus, nulla nihil nemo quod dicta consectetur obcaecati vel. Perspiciatis animi corrupti quidem fugit deleniti, atque mollitia labore excepturi ut.</p>
										</li>

										<li data-content="leave">
											<select id="review" class="form-control">
												<option value="">-- Pasirinkite atsiliepimo tipą --</option>
												<option value="enviroment">Aplinkos atsiliepimas</option>
												<option value="employee">Darbuotojo atsiliepimas</option>
												<option value="food">Maisto atsiliepimas</option>
											</select>
											<br><br>
											<div id="div1">Duomenys</div>
											<p> 
											</p>
										</li>
									</ul> <!-- cd-tabs__content -->
								</div>
								<!-- cd-tabs -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!-- End Contact section -->

<?= $this->element('mainfoot') ?>
<script src="/assets/js/mainTab.js"></script> 
<script>
$('#review').change(function () {
	var id = $('#review').val();
	if(id  == "enviroment"){
		$("#div1").load("/reviewsAjax/enviromentreviews.php");
		$("#reviewcontent").height(400);
	}
	else if(id == "employee"){
		$("#div1").load("/reviewsAjax/employeereviews.php");
		$("#reviewcontent").height(450);
	}
	else if(id == "food"){
		$("#div1").load("/reviewsAjax/foodreviews.php");
		$("#reviewcontent").height(400);
	}
	else{
	$("#div1").text("Pasirinkite atsiliepimo tipą..");
	$("#reviewcontent").height(200);
	}
});
</script>

  </body>
</html>