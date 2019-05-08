<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dish[]|\Cake\Collection\CollectionInterface $dish
 */
   echo $this->Html->css('view');

?><head>
    <title>Patiekalų valdymo langas » Kukudra</title>
</head>
<section class="content">
<div class="box">
    <h3><?= __('Patiekalai') ?></h3><br><br>
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
						<td style="width:50%"><?php	echo $this->Form->input('filter_name', ['label'=>'Pavadinimas: ', 'type'=>'text', 'style'=>'width:100%',
						'placeholder'=>'Įveskite pavadinimą arba jo dalį']);?></td>

					</tr>
					</table><table style="width:100%"><tr>
						<td style="width:50%; border-top:0px;border-bottom:0px;"><?php echo $this->Form->input('filter_type', ['label'=>'Patiekalo tipas:  ','options' => ['Salotos'=>'Salotos', 'Užkandžiai'=>'Užkandžiai', 
						'Desertai'=>'Desertai', 'Sriubos'=>'Sriubos', 'Dienos pietūs'=>'Dienos pietūs', 'Pagrindiniai patiekalai'=>'Pagrindiniai patiekalai'],
						'class' => 'form-control select2',  'multiple'=>'multiple', 'style'=>'width:100%']);?></td>
						<td style="width:50%; border-top:0px;border-bottom:0px;"><?php echo $this->Form->input('filter_contains', ['label'=>'Sudėtyje yra:  ', 'type'=>'text', 'style'=>'width:100%',
						'placeholder'=>'Įveskite sudėtyje esantį produktą']);?></td>
					</tr>
						</table><table style="width:100%"><tr>
						<td style="width:25%"><?php echo $this->Form->input('filter_pricefrom', ['label'=>'Kaina, nuo: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite kainą, nuo kurios bus ieškoma']);?></td>
						<td style="width:25%"><?php echo $this->Form->input('filter_priceto', ['label'=>'Kaina, iki: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite kainą, iki kurios bus ieškoma']);?></td>
						<td style="width:25%"><?php	echo $this->Form->input('filter_IDfrom', ['label'=>'ID, nuo: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite patiekalo ID, nuo kurio bus ieškoma']);?></td>
						<td style="width:25%"><?php echo $this->Form->input('filter_IDto', ['label'=>'ID, iki: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite patiekalo ID, iki kurio bus ieškoma']);?></td>
					</tr>
				</table><?php 
				echo $this->Form->button('Filtruoti', ['type' => 'submit']);
				echo $this->Form->button('Valyti filtravimą', ['type' => 'reset']);
				echo $this->Form->end();?>		
			</div>
		</div>
	</div>		
	<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')).'   Pridėti patiekalą', ['action' => 'add'], array('escape' => false));?>
	<br><br>
    <table  id="dishTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID </th>
                <th scope="col">Pavadinimas </th>
                <th scope="col">Kaina </th>
                <th scope="col">Sudėtis </th>
                <th scope="col">Patiekalo tipas </th>
                				<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($dish as $dish): ?>
            <tr>
                <td><?= $this->Number->format($dish->id_Dish) ?></td>
                <td><?= h($dish->Name) ?></td>
                <td><?= $this->Number->format($dish->Price) ?></td>
                <td><?= h($dish->Contains_products) ?></td>
                <td><?= h($dish->dishType) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $dish->id_Dish]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $dish->id_Dish]) ?>
                    <?= $this->Form->postLink(__('Trinti'), ['action' => 'delete', $dish->id_Dish], ['confirm' => __('Ar tikrai norite naikinti {0}?', $dish->Name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
		<tfoot>
		    <tr>
                <th scope="col">ID </th>
                <th scope="col">Pavadinimas </th>
                <th scope="col">Kaina </th>
                <th scope="col">Sudėtis </th>
                <th scope="col">Patiekalo tipas </th>
                				<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

            </tr>
		</tfoot>
    </table>
</div>
</section>
<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>
<!-- bootstrap datepicker -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min', ['block' => 'script']); ?>
<?php $this->start('scriptBottom'); ?>
<script>	
$(document).ready( function () {
	$('#dishTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':5},
		],
		 "scrollX": true	});
} );
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
    });
    $('#datepicker2').datepicker({
      autoclose: true,
    });

  })
</script>
<?php $this->end(); ?>