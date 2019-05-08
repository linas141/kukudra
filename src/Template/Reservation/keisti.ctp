<?php $this->layout = 'AdminLTE.profile';
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>   
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
<div class="reservation form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Redaguojate '. $reservation->dateTime .' rezervaciją') ?></legend>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-fast-backward')).'   Grįžtį į profilį', ['controller'=>'User', 'action' => 'profile'], array('escape' => false));
		?><br><br>

        <?php
			echo $this->Form->input('Type', array('label'=>'Tipas: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Pasirinkite tipą!')", 'oninput'=>"this.setCustomValidity('')", 'options' => $reservationType));
			echo $this->Form->input('name', array('label'=>'Vardas: ', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Įveskite vardą!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('lastName', array('label'=>'Pavardė: ', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Įveskite pavardę!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('email', array('label'=>'El. pašto adresas: ', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Įveskite el. pašto adresą!!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('phone', array('label'=>'Telefono nr.: ', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Įveskite telefono nr.')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('amountOfPeople', array('label'=>'Žmonių kiekis: ', 'required'=>'required', 'options' => $selectedAmountOfPeople,'oninvalid'=>"this.setCustomValidity('Pasirinkite žmonių kiekį!!')", 'oninput'=>"this.setCustomValidity('')"));
			//echo $this->Form->input('dateTime', array('label'=>'Data ir laikas: ', 'class' => 'form-control pull-right datepicker'));
			echo $this->Form->input('date', array('label'=>'Data: ', 'value'=>$date,'class' => 'form-control datepicker','disabled'=>'disabled', 'type'=>'text'));
	if($reservation->Type != 'Restaurant')	echo $this->Form->input('time', array('label'=>'Laikas: ', 'value'=>$time, 'class' => 'form-control', 'disabled'=>'disabled','type'=>'select', 'options'=>$workHours));
				if(count($reservation->reserved_dish)<1) $selectedDishes=0;
		echo $this->Form->input('selectedDish', array('label'=>'Patiekalai: ', 'id'=>'selectedDish', 'type'=>'select','class' => 'form-control select2', 'multiple'=>'multiple','options'=>$dishList, 'value'=>$selectedDishes));
       ?>
    </fieldset>
	
	<div>
    <?= $this->Form->button(__('Išsaugoti')) ?>
    <?= $this->Form->end() ?>
	</div>
</div>
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>
<script>
$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
$('.datepicker').datepicker({
	monthNames: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
	monthNamesShort: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
	dayNamesMin: ['Pir', 'Ant', 'Tre', 'Ket', 'Pen', 'Šeš','Sek'],
	dateFormat: 'yy-mm-dd',
	minDate: 0
});
</script>