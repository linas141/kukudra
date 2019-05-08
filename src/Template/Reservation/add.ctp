<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?><head>
    <title>Rezervacijos pridėjimo langas » Kukudra</title>
</head>
<div class="reservation form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Pridėti rezervaciją') ?></legend>
						<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
        <?php
            echo $this->Form->control('Date', ['empty' => true,'label'=>'Paskelbimo data: ', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'onfocus'=>"this.setCustomValidity('')"]);
            echo $this->Form->control('Reserver', array('label'=>'Rezervavo: ', 'options' => $userList, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('State', array('label'=>'Rezervacijos būsena: ', 'options' => $reservationStateOptions, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('Type', array('label'=>'Rezervacijos Tipas: ', 'options' => $reservationType, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('name', array('label'=>'Vardas: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('lastName', array('label'=>'Pavardė: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('email', array('label'=>'El. pašto adresas: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('phone', array('label'=>'Telefono nr.: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('amountOfPeople', array('label'=>'Žmonių kiekis: ', 'options' => $selectedAmountOfPeople, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('data', array('label'=>'Data: ', 'class' => 'form-control datepicker','type'=>'text', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'onfocus'=>"this.setCustomValidity('')"));
			echo $this->Form->input('time', array('label'=>'Laikas: ', 'class' => 'form-control', 'type'=>'select', 'options'=>$workHours, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('selectedDish', array('label'=>'Patiekalai: ', 'id'=>'selectedDish', 'type'=>'select','class' => 'form-control select2', 'multiple'=>'multiple','options'=>$dishList));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Paskelbti')) ?>
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