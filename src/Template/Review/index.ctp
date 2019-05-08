<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review[]|\Cake\Collection\CollectionInterface $review
 */
 echo $this->Html->css('view');

?>
<head>
    <title>Atsiliepimų valdymo langas » Kukudra</title>
</head>
<section class="content">
	<div class="box">
		<h3><?= __('Visi atsiliepimai') ?></h3>
		<br>	
		<div class="box box-success">
			<div class="box-header with-border" data-widget="collapse">
				<h3 class="box-title">Filtravimas</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-12">
								<?php echo $this->Form->create();
				//	echo $this->Form->input('filter_id', ['type' => 'text']);
					?>	
					<table style="width:100%">
						<tr>
							<td style="width:50%"><?php	echo $this->Form->input('filter_username', ['label'=>'Vartotojo vardas: ', 'type'=>'text', 'style'=>'width:100%',
							'placeholder'=>'Įveskite naudotojo vardą arba jo dalį']);?></td>
							<td style="width:25%"><?php echo $this->Form->input('filter_datefrom', ['label'=>'Paskelbtas nuo:  ', 'placeholder'=>'Pasirinkite datą', 'type'=>'text', 'class'=>'form-control datepicker']);?></td>
							<td style="width:25%"><?php echo $this->Form->input('filter_dateto', ['label'=>'Paskelbtas iki:  ', 'placeholder'=>'Pasirinkite datą', 'type'=>'text', 'class'=>'form-control datepicker']);?></td>
						</tr>
					</table>
					<table style="width:100%">
						<tr>
							<td style="width:25%; border-top:0px;"><?php echo $this->Form->input('filter_IDfrom', ['label'=>'ID, nuo: ', 'type'=>'number', 'style'=>'width:100%',
							'placeholder'=>'Įveskite skaičių, nuo kurio bus ieškoma']);?></td>
							<td style="width:25%; border-top:0px;"><?php echo $this->Form->input('filter_IDto', ['label'=>'ID, iki: ', 'type'=>'number', 'style'=>'width:100%',
							'placeholder'=>'Įveskite skaičių, iki kurio bus ieškoma']);?></td>
							<td style="width:25%; border-top:0px;"><?php echo $this->Form->input('filter_ratingfrom', ['label'=>'Įvertinimas, nuo: ', 'type'=>'select', 'options'=>[''=>'Visi', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], 'style'=>'width:100%',
							'placeholder'=>'Įveskite skaičių, nuo kurio bus ieškoma']);?></td>
							<td style="width:25%; border-top:0px;"><?php echo $this->Form->input('filter_ratingto', ['label'=>'Įvertinimas, iki: ', 'type'=>'select', 'options'=>[''=>'Visi', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], 'style'=>'width:100%',
							'placeholder'=>'Įveskite skaičių, iki kurio bus ieškoma']);?></td>						
						</tr>
					</table><?php 
					echo $this->Form->button('Filtruoti', ['type' => 'submit']);
					echo $this->Form->button('Valyti filtravimą', ['type' => 'reset', 'onclick'=>'funct()']);
					echo $this->Form->end();?>		
				</div>
			</div>
		</div>		

		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')) . 
			'   Pridėti naują atsiliepimą', ['action' => 'add'], array('escape' => false)); ?>

		<table  id="reviewTable" style="width:100%"class="table table-bordered table-hover">
			<br><br>        
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Paskelbimo data</th>
					<th scope="col">Atsiliepimas apie</th>
					<th scope="col" style="width:40%">Atsiliepimas</th>
					<th scope="col">Paskelbė</th>
					<th scope="col">Įvertinimas</th>
					<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($review as $review): ?>
				<tr>
					<td><?= $this->Number->format($review->id_Review) ?></td>
					<td><?= h($review->datePublished) ?></td>
					<td><?php if(!empty($review->enviroment_review)) echo 'Aplinką'; 
						elseif (!empty($review->food_review)) echo 'Maistą'; 
						elseif(!empty($review->employee_review)) echo('\''.substr($review->employee_review[0]->user->First_name, 0, 1) . '. ' . $review->employee_review[0]->user->Last_name.'\'');
						else echo 'Nėra tipo!';?></td>
					<td><?= h($review->Review) ?></td>
					<td><?= $review->has('user') ? $this->Html->link($review->user->username . ' (ID: ' . $review->user->id_User . ')', ['controller' => 'User', 'action' => 'view', $review->user->id_User]) : ''  ?></td>
					<td><?= $this->Number->format($review->rating) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $review->id_Review]) ?>
						<?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $review->id_Review]) ?>
						<?= $this->Form->postLink(__('Šalinti'), ['action' => 'delete', $review->id_Review], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $review->id_Review)]) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Paskelbimo data</th>
					<th scope="col">Atsiliepimas apie</th>
					<th scope="col">Atsiliepimas</th>
					<th scope="col">Paskelbė</th>
					<th scope="col">Įvertinimas</th>
					<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</section>
<?php $this->start('scriptBottom'); ?>
<script>	
$(document).ready( function () {
	$('#reviewTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':6},
		],
		 "scrollX": true	});
} );
$(window).load(function(){ $('#reviewTable').DataTable().columns.adjust() })
</script>
<?php $this->end(); ?>