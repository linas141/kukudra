<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservation
 */
  echo $this->Html->css('view');
?><head>
    <title>Rezervacijų valdymo langas » Kukudra</title>
</head>
<section class="content">
<div class="box">
    <h3><?= __('Rezervacijos') ?></h3>
	<br><br>
	<div class="box box-success">
		<div class="box-header with-border" data-widget="collapse">
			<h3 class="box-title">Filtravimas</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-12">
							<?php     
				echo $this->Form->create();
				?>	
				<table style="width:100%">
					<tr>
						<td style="width:30%"><?php echo $this->Form->input('filter_type', ['label'=>'Rezervacijos tipas:  ','options' => [''=>'-- Visi --', 'Table'=>'Stalelio rezervacija',
						'Food'=>'Maisto rezervacija', 'Restaurant'=>'Kavinės ar salės rezervacija']]);?></td>
						<td style="width:30%"><?php echo $this->Form->input('filter_state', ['label'=>'Rezervacijos būsena:  ','options' => ['Pateikta'=>'Pateikta', 'Patvirtinta'=>'Patvirtinta', 
						'Redaguojama'=>'Redaguojama','Atšaukta'=>'Atšaukta'], 'class' => 'form-control select2',  'multiple'=>'multiple', 'style'=>'width:100%']);?></td>
					</tr>
				</table><table style="width:100%">
					<tr>
						<td style="width:10%; border-top:0px;"><?php	echo $this->Form->input('filter_firstname', ['label'=>'Vardas: ', 'type'=>'text', 'style'=>'width:100%',
						'placeholder'=>'Įveskite vardą arba jo dalį']);?></td>
						<td style="width:10%; border-top:0px;"><?php echo $this->Form->input('filter_lastname', ['label'=>'Pavardė: ', 'type'=>'text', 'style'=>'width:100%',
						'placeholder'=>'Įveskite pavardę arba jos dalį']);?></td>
						<td style="width:20%; border-top:0px;"><?php	echo $this->Form->input('filter_amountofpeople', ['label'=>'Žmonių kiekis: ', 'type'=>'select', 'style'=>'width:100%', 
						'options'=>[''=>'Visi','1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10 arba daugiau', ]]);?></td>
					</tr>
				</table><table style="width:100%">
					<tr>
						<td style="width:10%; border-top:0px;"><?php echo $this->Form->input('filter_IDfrom', ['label'=>'Nr, nuo: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite vartotojo Nr, nuo kurio bus ieškomi vartotojai']);?></td>
						<td style="width:10%; border-top:0px;"><?php echo $this->Form->input('filter_IDto', ['label'=>'Nr, iki: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite vartotojo Nr, iki kurio bus ieškomi vartotojai']);?></td>
						<td style="width:10%; border-top:0px; padding-bottom:20px"><?php echo $this->Form->input('filter_dateFrom', ['label'=>'Vykdymo data, nuo:', 'type' => 'text',
						'class'=>'form-control datepicker', 'id'=>'datepicker', 'data-date-format'=>'yyyy-mm-dd',
						'placeholder'=>'Įveskite datą, nuo kurios ieškomi vartotojai']);?></td>
						<td style="width:10%; border-top:0px; padding-bottom:20px"><?php echo $this->Form->input('filter_dateTo', ['label'=>'Vykdymo data, iki: ', 'type' => 'text',
						'class'=>'form-control datepicker', 'id'=>'datepicker2', 'data-date-format'=>"yyyy-mm-dd",
						'placeholder'=>'Pasirinkite datą iki']);?></td>
					</tr>
				</table><?php 
				echo $this->Form->button('Filtruoti', ['type' => 'submit']);
				echo $this->Form->button('Valyti filtravimą', ['type' => 'reset']);
				echo $this->Form->end();?>		
			</div>
		</div>
	</div>						
	<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')) . 
		'   Pridėti naują rezervaciją', ['action' => 'add'], array('escape' => false)); ?>
	<br><br>

<div id="users-table-wrap">
    <table id="reservationTable" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">Nr</th>
				<th scope="col">Data</th>
				<th scope="col">Rezervavo</th>
				<th scope="col">Būsena</th>
				<th scope="col">Tipas</th>
				<th scope="col">Vardas</th>
				<th scope="col">Pavardė</th>
				<th scope="col">El. pašto adresas</th>
				<th scope="col">Telefonas.</th>
				<th scope="col">Patiekalai</th>
				<th scope="col">Žmonių sk</th>
				<th scope="col">Vykdymo data</th>
								<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($reservation as $reservation): ?>
			<tr>
				<td><?= $this->Number->format($reservation->Number) ?></td>
				<td><?= h($reservation->Date) ?></td>
				<td><?= $reservation->has('user') ? $this->Html->link($reservation->user->username . ' (ID: ' . $reservation->user->id_User . ')', ['controller' => 'User', 'action' => 'view', $reservation->user->id_User]) : ''  ?></td>
				<?php if($reservation->State == 'Pateikta') : ?>
					<td style="color: rgba(0, 191, 255, 1);"><?= h($reservation->State) ?></td>
				<?php elseif($reservation->State == 'Patvirtinta'): ?>
					<td style="color: rgba(0, 200, 30, 1);"><?= h($reservation->State) ?></td>
				<?php elseif($reservation->State == 'Atšaukta'):?>
					<td style="color: rgba(250, 0, 0, 1);"><?= h($reservation->State) ?></td>
				<?php else :
					?><td><?= h($reservation->State) ?></td>
				<?php endif; ?>
				<td><?php $tipas=$reservation->Type; if($tipas ==='Table') echo 'Stalelio'; else if($tipas ==='Food') echo 'Maisto'; else if($tipas ==='Restaurant') echo 'Salės'; else echo 'Nėra tipo!' ?></td>
				<td><?= h($reservation->name) ?></td>
				<td><?= h($reservation->lastName) ?></td>
				<td><?= h($reservation->email) ?></td>
				<td><?= $this->Number->format($reservation->phone) ?></td>
				<td><?php if($reservation->has("reserved_dish") && count($reservation->reserved_dish)>0){ 
					for($i=0; $i< count($reservation->reserved_dish); $i++) {
						echo $this->Html->link($reservation->reserved_dish[$i]->dish->Name, 
							['controller' => 'Dish', 'action' => 'view', $reservation->reserved_dish[$i]->dish->id_Dish]) . '<br>';
					}
				}else echo '' ?></td>
				<td><?= $this->Number->format($reservation->amountOfPeople) ?></td>
				<td><?= h($reservation->dateTime) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $reservation->Number]) ?>
					<?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $reservation->Number]) ?>
					<?= $this->Form->postLink(__('Šalinti'), ['action' => 'delete', $reservation->Number], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $reservation->Number)]) ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<th scope="col">Nr</th>
				<th scope="col">Pateikimo data</th>
				<th scope="col">Rezervavo</th>
				<th scope="col">Būsena</th>
				<th scope="col">Tipas</th>
				<th scope="col">Vardas</th>
				<th scope="col">Pavardė</th>
				<th scope="col">El. pašto adresas</th>
				<th scope="col">Telefonas</th>
				<th scope="col">Patiekalai</th>
				<th scope="col">Žmonių sk</th>
				<th scope="col">Data</th>
								<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

			</tr>
		</tfoot>
	</table>
</div>
</div>
</section>
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>
<?php $this->start('scriptBottom'); ?>		
<script>	
$(document).ready( function () {
	$('#reservationTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':12},
		],
		 "scrollX": true	});
} );
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>
<?php $this->end(); ?>