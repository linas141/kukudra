<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>   
<head>
    <title>Rezervacijos redagavimo langas » Kukudra</title>
</head>
<div class="reservation form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Redaguoti rezervaciją') ?></legend>
				<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>

        <?php
			echo $this->Form->input('Date', array('label'=>'Pateikimo data: ', 'type'=>'text', 'id' => 'datepicker','name'=>"datepicker", 'class' => 'form-control pull-right', 'disabled'));
			echo $this->Form->input('Reserver', array('label'=>'Rezervavo: ', 'options' => $userList, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('State', array('label'=>'Būsena: ', 'options' => $reservationStateOptions, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('Type', array('label'=>'Tipas: ', 'options' => $reservationType, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('name', array('label'=>'Vardas: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('lastName', array('label'=>'Pavardė: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('email', array('label'=>'El. pašto adresas: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('phone', array('label'=>'Telefono nr.: '));
			echo $this->Form->input('data', array('label'=>'Data: ', 'class' => 'form-control datepicker','type'=>'text', 'value'=>$date, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'onfocus'=>"this.setCustomValidity('')"));
			echo $this->Form->input('time', array('label'=>'Laikas: ', 'class' => 'form-control', 'value'=>$time, 'type'=>'select', 'options'=>$workHours, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
	if(count($reservation->reserved_dish)<1) $selectedDishes=0;
		echo $this->Form->input('selectedDish', array('label'=>'Patiekalai: ', 'id'=>'selectedDish', 'type'=>'select','class' => 'form-control select2', 'multiple'=>'multiple','options'=>$dishList, 'value'=>$selectedDishes));
       ?>
    </fieldset>
	
	<div>
    <?= $this->Form->button(__('Išsaugoti')) ?>
    <?= $this->Form->end() ?>
			<?= $this->Form->postLink($this->Form->button('Naikinti rezervaciją'), ['action' => 'delete', $reservation->Number], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti # {0}?',
			$reservation->Number)));	?>
	</div>
    <?= $this->Form->end() ?>
	
</div>
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>
<script>
$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>