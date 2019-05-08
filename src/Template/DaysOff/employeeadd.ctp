<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOff $daysOff
 */
?>
<head>
    <title>Laisvadienių prašymo pildymo langas » Kukudra</title>
</head>
<div class="daysOff form large-9 medium-8 columns content">
    <?= $this->Form->create($daysOff) ?>
    <fieldset>
        <legend><?= __('Pateikti laisvadienių prašymą') ?></legend>
        <?php
            echo $this->Form->control('Day_from', ['label'=>'Data nuo','empty' => true, 'class'=>'form-control datepicker', 'type'=>'text', 'placeholder'=>'Pasirinkite laisvadienių pradžią', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'onfocus'=>"this.setCustomValidity('')"]);
            echo $this->Form->control('Day_to', ['label'=>'Data iki','empty' => true, 'class'=>'form-control datepicker', 'type'=>'text', 'placeholder'=>'Pasirinkite laisvadienių pabaigą', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'onfocus'=>"this.setCustomValidity('')"]);
            echo $this->Form->control('Reason', ['label'=>'Priežastis(nebūtina)','empty' => true, 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Įveskite priežastį, dėl kurios prašote laisvadienių']);
        ?>
    </fieldset>
	<?php	echo $this->Form->button(__('Pateikti'));
    echo $this->Form->end() ?>
</div>
