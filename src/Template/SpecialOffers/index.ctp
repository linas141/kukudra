<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer[]|\Cake\Collection\CollectionInterface $specialOffers
 */
   echo $this->Html->css('view');

?><head>
    <title>Specialių pasiūlymų valdymo langas » Kukudra</title>
</head>
<section class="content">
<div class="box">
    <h3><?= __('Specialūs pasiūlymai') ?></h3><br><br>
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
			//	echo $this->Form->input('filter_id', ['type' => 'text']);
				?>	
				<table style="width:100%">
					<tr>
						<td style="width:50%; border-bottom: 0px;"><?php echo $this->Form->input('filter_name', ['label'=>'Specialaus pasiūlymo pavadinimas: ',
						'type'=>'text', 'style'=>'width:100%','placeholder'=>'Įveskite specialaus pasiūlymo pavadinimą arba jo dalį']);?></td>
						<td style="width:25%; border-bottom:0px;"><?php	echo $this->Form->input('filter_datefrom', ['label'=>'Data, nuo: ','type' => 'text',
						'class'=>'form-control datepicker', 'data-date-format'=>"yyyy-mm-dd", 'placeholder'=>'Pasirinkite datą, nuo kurios bus ieškomi specialūs pasiūlymai']);?></td>
						<td style="width:25%; border-bottom:0px;"><?php echo $this->Form->input('filter_dateto', ['label'=>'Data, iki: ','type' => 'text',
						'class'=>'form-control datepicker', 'data-date-format'=>"yyyy-mm-dd", 'placeholder'=>'Pasirinkite datą, iki kurios bus ieškomi specialūs pasiūlymai']);?></td>
					</tr></table><table style="width:100%">
					<tr>
						<td style="width:25%"><?php	echo $this->Form->input('filter_pricefrom', ['label'=>'Kaina, nuo: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite kainą, nuo kurios bus ieškoma']);?></td>
						<td style="width:25%"><?php echo $this->Form->input('filter_priceto', ['label'=>'Kaina, iki: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite kainą, iki kurios bus ieškoma']);?></td>
						<td style="width:25%;"><?php	echo $this->Form->input('filter_IDfrom', ['label'=>'ID, nuo: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite specialaus pasiūlymo ID, nuo kurio bus ieškoma']);?></td>
						<td style="width:25%"><?php echo $this->Form->input('filter_IDto', ['label'=>'ID, iki: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite specialaus pasiūlymo ID, iki kurio bus ieškoma']);?></td>
						</table><?php 
				echo $this->Form->button('Filtruoti', ['type' => 'submit']);
				echo $this->Form->button('Valyti filtravimą', ['type' => 'reset']);
				echo $this->Form->end();?>		
			</div>
		</div>
	</div>
	<?php 				
	echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')).'   Pridėti Specialų pasiūlymą', ['action' => 'add'], array('escape' => false));
	?><br><br>
    <table id="offerTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Kaina</th>
                <th scope="col">Data, nuo</th>
                <th scope="col">Data, iki</th>
                				<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($specialOffers as $specialOffer): ?>
            <tr>
			    <td><?= $this->Number->format($specialOffer->id_Special_offers) ?></td>
                <td><?= h($specialOffer->Name) ?></td>
                <td><?= $this->Number->format($specialOffer->Price) ?></td>
                <td><?= h($specialOffer->Date_from) ?></td>
                <td><?= h($specialOffer->Date_to) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $specialOffer->id_Special_offers]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $specialOffer->id_Special_offers]) ?>
                    <?= $this->Form->postLink(__('Trinti'), ['action' => 'delete', $specialOffer->id_Special_offers], ['confirm' => __('Ar tikrai norite naikinti # {0}?', $specialOffer->id_Special_offers)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
		<tfoot>
		    <tr>
                <th scope="col">ID</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Kaina</th>
                <th scope="col">Data, nuo</th>
                <th scope="col">Data, iki</th>
                				<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

            </tr>
		</tfoot>
    </table>
</div>
</section>
<?php $this->start('scriptBottom'); ?>
<script>
$(document).ready( function () {
	$('#offerTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':5},
		],
		 "scrollX": true	});
} );
</script>
<?php $this->end(); ?>