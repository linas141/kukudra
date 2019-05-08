<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user
 */
  echo $this->Html->css('view');

?>
<head>
    <title>Naudotojų valdymo langas » Kukudra</title>
</head>
<section class="content">
<div class="box">
    <h3><?= __('Visi sistemos naudotojai') ?></h3>
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
			//	echo $this->Form->input('filter_id', ['type' => 'text']);
				?>	
				<table style="width:100%">
					<tr>
						<td style="width:30%"><?php echo $this->Form->input('filter_role', ['label'=>'Rolė:  ','options' => [''=>'-- Visi --', 'Darbuotojas'=>'Darbuotojas',
						'vartotojas'=>'Vartotojas']]);?></td>
						<td style="width:30%"><?php	echo $this->Form->input('filter_username', ['label'=>'Vartotojo vardas: ', 'type'=>'text', 'style'=>'width:100%',
						'placeholder'=>'Įveskite vartotojo vardą arba jo dalį']);?></td>
					</tr></table>
				<table style="width:100%">
					<tr>
						<td style="width:10%; border-top:0px;"><?php	echo $this->Form->input('filter_firstname', ['label'=>'Vardas: ', 'type'=>'text', 'style'=>'width:100%', 
						'placeholder'=>'Įveskite vardą arba jo dalį']);?></td>
						<td style="width:10%; border-top:0px;"><?php echo $this->Form->input('filter_lastname', ['label'=>'Pavardė: ', 'type'=>'text', 'style'=>'width:100%',
						'placeholder'=>'Įveskite pavardę arba jos dalį']);?></td>
						<td style="width:10%; border-top:0px;"><?php	echo $this->Form->input('filter_IDfrom', ['label'=>'ID, nuo: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite skaičių, nuo kurio bus ieškomi vartotojai pagal ID']);?></td>
						<td style="width:10%; border-top:0px;"><?php echo $this->Form->input('filter_IDto', ['label'=>'ID, iki: ', 'type'=>'number', 'style'=>'width:100%',
						'placeholder'=>'Įveskite skaičių, iki kurio bus ieškomi vartotojai pagal ID']);?></td>
					</tr>
				</table><?php 
				echo $this->Form->button('Filtruoti', ['type' => 'submit']);
				echo $this->Form->button('Valyti filtravimą', ['type' => 'reset', 'onclick'=>'funct()']);
				echo $this->Form->end();?>		
			</div>
		</div>
	</div>		
	<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')).'   Pridėti naują naudotoją', ['action' => 'add'], array('escape' => false));
?> <br><br>
    <table id="userTable"  class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID </th>
                <th scope="col">Vartotojo_vardas </th>
                <th scope="col">Vardas </th>
                <th scope="col">Pavardė </th>
                <th scope="col">Telefono_nr </th>
                <th scope="col">Rolė </th>
				<th scope="col">Paskutinis IP adresas </th>
				<th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id_User) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->First_name) ?></td>
                <td><?= h($user->Last_name) ?></td>
                <td><?= $this->Number->format($user->Phone_nr) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->Last_IP) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $user->id_User]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $user->id_User]) ?>
                    <?= $this->Form->postLink(__('Trinti'), ['action' => 'delete', $user->id_User], ['confirm' => __('Ar tikrai norite naikinti {0}?', $user->username)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
		<tfoot>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Vartotojo_vardas</th>
				<th scope="col">Vardas</th>
				<th scope="col">Pavardė</th>
				<th scope="col">Telefono_nr</th>
				<th scope="col">Rolė</th>
				<th scope="col">Paskutinis IP adresas</th>
				<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>
			</tr>
		</tfoot>
    </table>
</div>
</section>
<?php $this->start('scriptBottom'); ?>		
<script>	
$(document).ready( function () {
	$('#userTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':7},
		],
		 "scrollX": true});
} );
</script>
<?php $this->end(); ?>