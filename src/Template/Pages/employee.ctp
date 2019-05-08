<?php
$user = $this->request->session()->read('Auth.User'); 
if($user['role']!='darbuotojas') :           
	header('Location: /');
//	$this->Flash->error(__('Jūs neturite teisės apsilankyti šiame puslapyje!'));
	exit;
endif;
?>
<head>
    <title>Darbuotojo langas » Kukudra</title>
</head>
<section class="content-header">
  <h1>
    Skydelis
    <small>"Kukudra" sistemos darbuotojo skydelis</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Pagrindinis puslapis</a></li>
    <li class="active">Skydelis</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
		<div class="reservationInformation" id="reservationInformation">
				<div class="box">
					<div class="reservationInformation" id="reservationInformation">
						<div class="box-header with-border">
									<h3>&nbsp;&nbsp;&nbsp;&nbsp; Užsakymų informacija</h3><br>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" onClick="$('#reservationInformation').slideUp('slow');"><i class="fa fa-times"></i></button>
									</div>
									<section class="col-lg-8 connectedSortable">
										<div class="box-body table-responsive no-padding">
											<table class="table table-hover">
												<tr>
													<th>Pateikimo data</th>
													<th>Pateikė</th>
													<th>Rezervuojama data</th>
													<th>Tipas</th>
													<th>Greitas atsakymas</th>
												</tr>
												<?php foreach($submittedReservationList as $reservation) : ?>
												<tr>
													<td><?= h($reservation->Date) ?></td>
													<td><?= $reservation->has('user') ? $reservation->user->username : '' ?></td>
													<td><?= h($reservation->dateTime) ?></td>
													<td><?php $reservType = $reservation->Type; if($reservType== "Table") { echo "Stalelio"; } else if($reservType == "Food"){ echo "Maisto";} else echo "Salės"; ?></td>
													<td>
													<?php echo $this->Html->link($this->Html->tag('span',__('Patvirtinti',true)), ['controller' => 'reservation', 'action' => 'submit', $reservation->Number, 'submit'], 
															array('escape'=>false,'class'=>'label label-success'));
														echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $this->Html->link($this->Html->tag('span',__('Atmesti',true)), ['controller' => 'reservation', 'action' => 'submit', $reservation->Number, 'deny'], 
															array('escape'=>false,'class'=>'label label-danger'));?>
													</td>
												</tr>
												<?php endforeach;?>
												<tr>
													<th>Pateikimo data</th>
													<th>Pateikė</th>
													<th>Rezervuojama data</th>
													<th>Tipas</th>
													<th>Greitas atsakymas</th>
												</tr>
											</table>
										</div>
								<!-- /.box-body -->
									</section>
									<section class="col-lg-4 connectedSortable">
										<div class="box-body table-responsive no-padding">
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
									</div>
									</section>
								</div>
					</div>
			</div>
		</div>
	</div>
</section>