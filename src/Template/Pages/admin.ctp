<?php
$user = $this->request->session()->read('Auth.User'); 
if($user['role']!='admin') :           
	header('Location: /user/profile');
	$this->Flash->error(__('Jūs neturite teisės apsilankyti šiame puslapyje!'));
	exit;
endif;
?>
<head>
    <title>Vadovo langas » Kukudra</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Scripts for fading in/fading out divs -->
<script type="text/javascript" src="/assets/js/admin.js"></script>
<style>
#infoToggler:hover{
	cursor:pointer;
	filter: brightness(90%);
}
.box-header.with-border:hover{
	cursor:context-menu;
}
/* Modal Content/Box */
.modal-content {
	background-color: #fefefe;
	margin: 15% auto; /* 15% from the top and centered */
	padding: 20px;
	border: 1px solid #888;
	width: 100%;
	text-align:center;
	  position: fixed;
	  height:100%;
  /* bring your own prefixes */
}
.example-modal .modal {
  position: relative;
  top: auto;
  bottom: auto;
  right: auto;
  left: auto;
  display: block;
  z-index: 1;
  height:10%;
}
div.modal-backdrop{
	z-index:0;
}
.example-modal .modal {
  background: transparent !important;
}
 @media only screen and (max-width: 311px) {
    #buttonClose{
		position:relative;
		top:-40px;
	}
 }
</style>
<section class="content-header">
	<h1>Skydelis<small>"Kukudra" sistemos skydelis</small></h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i>Pagrindinis puslapis</a></li>
		<li class="active">Skydelis</li>
	</ol>
</section>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog" id="modalDialog" style="height:270px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" style="color:grey;" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal-title">Šiandien yra vykdomų užsakymų</h4>
			</div>
			<div class="modal-body" id="modal-body">
				<p>&hellip;</p>
			</div>
			<div class="modal-footer">
				<button type="button" id="buttonClose" class="btn btn-default pull-left" data-dismiss="modal">Užverti</button>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
	<div class="row">
		<span class="reservationInformationToggler" onClick="reservationInformationToggled()">
			<div class="col-lg-3 col-xs-6">
			  <!-- small box -->
				<div class="small-box bg-aqua" id="infoToggler">
					<div class="inner">
						<p>Iš viso pateikta</p>

						<h3><?php echo $reservationCount;?></h3>
						<?php if($reservationCount == 1) {?>
							<p>užsakymas</p>
						<?php } else if($reservationCount > 1 && $reservationCount < 10) { ?>
							<p>užsakymai</p>
						<?php } else {?>
							<p>užsakymų</p>
						<?php } ?>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">Daugiau informacijos <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</span>
		<!-- ./col -->
		<span class="userInformationToggler" onClick="userInformationToggled()">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue" id="infoToggler">
					<div class="inner">
						<p>Viso sistemoje</p>
						<h3><?php echo $userCount;?></h3>
						<?php if($userCount == 1) {?>
						<p>naudotojas</p>
						<?php } else if($userCount > 1 && $userCount < 10) { ?>
						<p>naudotojai</p>
						<?php } else {?>
						<p>naudotojų</p>
						<?php } ?>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">Daugiau informacijos <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</span>
		<!-- ./col -->
		<span class="daysOffToggler" onClick="daysOffInformationToggled()">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<?php if($daysOffCount > 0): ?>
				<div class="small-box bg-red" id="infoToggler" >
					<div class="inner">
						<p>Jūs dar nepatvirtinote</p>
						<h3><?php echo $daysOffCount;?></h3>
						<p>laisvadienių prašymų</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">Daugiau informacijos <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				<?php else : ?>
				<div class="small-box bg-green" id="infoToggler" >
					<div class="inner">
						<p>Jūs patvirtinote </p>
						<h3>visus</h3>
						<p>darbuotojų laisvadienių prašymus!</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">Daugiau informacijos <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				<?php endif;?>
			</div>
		</span>
		<!-- ./col -->
	</div>
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
		<div class="userInformation" id="userInformation" style='display:none;'>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3>&nbsp;&nbsp;&nbsp;&nbsp; Naudotojų informacija</h3><br>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" onClick="$('#userInformation').slideUp('slow');"><i class="fa fa-times"></i></button>
						</div>
						<section class="col-lg-8 connectedSortable">
						<!-- /.info-box -->
						</section>
						<!-- /.Left col -->
						<!-- right col (We are only adding the ID to make the widgets sortable)-->
						<section class="col-lg-4 connectedSortable">
										<!-- Info Boxes Style 2 -->
							<div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Iš viso naudotojų</span>
									<span class="info-box-number"><?php echo $userCount;?></span>

									<div class="progress">
										<div class="progress-bar" style="width: 100%"></div>
									</div>
									<span class="progress-description">
										100% visų naudotojų
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
					  <!-- /.info-box -->
							<div class="info-box bg-yellow">
								<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
								<?php $employeePercent = round(($employeeCount / $userCount)*100, 2);?>
								<div class="info-box-content">
									<span class="info-box-text">Darbuotojų</span>
									<span class="info-box-number"><?php echo $employeeCount; ?></span>

									<div class="progress">
										<div class="progress-bar" style="width: <?php echo $employeePercent ;?>%"></div>
									</div>
									<span class="progress-description">
										<?php echo $employeePercent ;?>% visų naudotojų
									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
							<div class="info-box bg-red">
								<span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Sistemos naudotojų</span>
									<span class="info-box-number"><?php echo $customerCount ;?></span>
									<?php $customerPercent = round(($customerCount/$userCount) * 100, 2); ?>
									<div class="progress">
										<div class="progress-bar" style="width: <?php echo $customerPercent ;?>%"></div>
									</div>
									<span class="progress-description">
										<?php echo $customerPercent ?>% visų naudotojų
									</span>
								</div>
								<!-- /.info-box-content -->

							</div>
						</section>
					</div>
				</div>
			</div>
		</div>

		<div class="reservationInformation" id="reservationInformation">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3>&nbsp;&nbsp;&nbsp;&nbsp; Užsakymų informacija</h3><br>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" onClick="$('#reservationInformation').slideUp('slow');"><i class="fa fa-times"></i></button>
						</div>
						<section class="col-lg-8 connectedSortable">
							<div id="piechart"></div>
						</section>

						<section class="col-lg-4 connectedSortable">
						<h3>Rezervacijų būsenos</h3>
						<div class="progress-group">
							<span class="progress-text">Pateikta</span>
							<span class="progress-number"><b><?php echo $submittedReservationCount; ?></b>/<?php echo $reservationCount; ?></span>

							<div class="progress sm">
								<div class="progress-bar progress-bar-aqua" style="width: <?php echo $submittedPercent;?>%"></div>
							</div>
						</div>
						<!-- /.progress-group -->
						<div class="progress-group">
							<span class="progress-text">Patvirtinta</span>
							<span class="progress-number"><b><?php echo $approvedReservationCount; ?></b>/<?php echo $reservationCount; ?></span>
							<div class="progress sm">
								<div class="progress-bar progress-bar-green" style="width: <?php echo $approvedPercent;?>%"></div>
							</div>
						</div>
						<!-- /.progress-group -->
						<div class="progress-group">
							<span class="progress-text">Atšaukta</span>
							<span class="progress-number"><b><?php echo $cancelledReservationCount; ?></b>/<?php echo $reservationCount; ?></span>
							<div class="progress sm">
								<div class="progress-bar progress-bar-red" style="width: <?php echo $cancelledPercent;?>%"></div>
							</div>
						</div>
						<!-- /.progress-group -->
						</section>
					</div>
				</div>
			</div>
		</div>
		
		<div class="daysOffInformation" id="daysOffInformation" style='display:none;'>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Darbuotojų pateikti laisvadienių prašymai</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" onClick="$('#daysOffInformation').slideUp('slow');"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th>Prašomas laikotarpis</th>
								<th>Prašantis darbuotojas</th>
								<th>Prašymo būsena</th>
								<th>Vadovo komentaras</th>
								<th>Greitas atsakymas</th>
							</tr>
							<?php foreach($daysOffList as $daysOff) : ?>
							<tr>
								<td><?= h($daysOff->Day_from . ' - ' . $daysOff->Day_to) ?></td>
								<td><?= $daysOff->has('user') ? $this->Html->link(substr($daysOff->user->First_name, 0, 1) . '. ' . $daysOff->user->Last_name .' (' . $daysOff->user->username . ')'
								, ['controller' => 'User', 'action' => 'view', $daysOff->user->id_User]) : 'nėra' ?></td>
								<td><?= h($daysOff->State) ?></td>
								<td><?= h($daysOff->Comment) ?></td>
								<td>
								<?php echo $this->Html->link($this->Html->tag('span',__('Suteikti',true)), ['controller' => 'DaysOff', 'action' => 'submit', $daysOff->id_Days_off, 'submit'], 
										array('escape'=>false,'class'=>'label label-success'));
									echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $this->Html->link($this->Html->tag('span',__('Atmesti',true)), ['controller' => 'DaysOff', 'action' => 'submit', $daysOff->id_Days_off, 'deny'], 
										array('escape'=>false,'class'=>'label label-danger'));?>
								</td>
							</tr>
							<?php endforeach;?>
							<tr>
								<th>Prašomas laikotarpis</th>
								<th>Prašantis darbuotojas</th>
								<th>Prašymo būsena</th>
								<th>Vadovo komentaras</th>
								<th>Greitas atsakymas</th>
							</tr>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>		
		</div>
	</div>
</section>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Get the modal
var modal = document.getElementById('modal-default');

// Get the <span> element that closes the modal
var reservations = <?= $tomorrowReservationsCount?>;
var daysOffNew = <?= $daysOffNotViewedCount?>;
if(reservations > 0) { // Check for today's reservations
	var listReserved = <?php echo(json_encode($reservedToday));?>;
	var staleliai = listReserved.indexOf("Table");
	var maistas = listReserved.indexOf("Food");
	var sale = listReserved.indexOf("Restaurant");
	listReserved[sale] = "Salės rezervacija";
	listReserved[maistas] = "Maisto rezervacija";
	listReserved[staleliai] = "Stalelio rezervacija";
	$(document).ready(function() {
	  // Show modal
	  $("#modal-default").modal();
	});// Change text of modal
	document.getElementById('modal-title').innerHTML = "Šiandien yra vykdomų užsakymų";
	document.getElementById('modal-body').innerHTML = "Šiandien yra " + reservations + " patvirtintų užsakymų! <br>"+
	"Rezervacijos šių tipų: " + listReserved.toString()+"<br>";
}// Check for unseen submissions of days off
if(daysOffNew > 0) {
	var daysOffFirst = <?= json_encode($daysOffFirst)?>;
	$(document).ready(function() {
		//modal.style.display = "block";
		 $("#modal-default").modal();
	});// Check for reservations and days off
	if(reservations < 1){
		document.getElementById('modal-title').innerHTML = "Darbuotojų prašymai";
		document.getElementById('modal-body').innerHTML = "Nepatvirtinote " + daysOffNew + " darbuotojų prašymų! <br>"+
			"Artimiausia laisvadienių prašymo pradžia: " + daysOffFirst+"<br><br>";
	}else {
		document.getElementById('modal-body').innerHTML += "<br><br><h4 class='modal-title'>Darbuotojų prašymai</h4>Nepatvirtinote " + daysOffNew + " darbuotojų prašymų! <br>"+
			"Artimiausia laisvadienių prašymo pradžia: " + daysOffFirst+"<br><br>";
		document.getElementById('modalDialog').style = "height:350px;";
		if(window.matchMedia("(max-width: 345px)").matches){
			document.getElementById('modalDialog').style = "height:400px;";
		}
	}
}
modalDialog
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
	var data = google.visualization.arrayToDataTable([
	['Task', 'Rezervacijų skaičius'],
	['Maisto užsakymai (' + <?php echo $foodReservationCount ?> + ')',  <?php echo $foodReservationCount ?>],
	['Stalelių užsakymai (' + <?php echo $tableReservationCount ?>+ ')', <?php echo $tableReservationCount ?>],
	['Salės užsakymai(' + <?php echo $restaurantReservationCount ?> + ')', <?php echo $restaurantReservationCount ?>]
]);
  // Optional; add a title and set the width and height of the chart
  var options = { 'width':800, 'height':400};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>