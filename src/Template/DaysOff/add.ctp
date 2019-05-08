<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOff $daysOff
 */
?>
<head>
    <title>Laisvadienių prašymo pateikimo langas » Kukudra</title>
</head>
<div class="daysOff form large-9 medium-8 columns content">
    <?= $this->Form->create($daysOff) ?>
    <fieldset>
        <legend><?= __('Laisvadienių prašymo sukūrimas') ?></legend>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
			?><br><br>
        <?php
            echo $this->Form->control('Day_from', ['empty' => true, 'label'=>'Prašymas nuo', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block', 'placeholder'=>'Pasirinkite prašymo nuo datą']);
            echo $this->Form->control('Day_to', ['empty' => true, 'label'=>'Prašymas iki', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block', 'placeholder'=>'Pasirinkite prašymo iki datą']);
            echo $this->Form->control('fk_Employeeid_User', ['options' => $user, 'label'=>'Darbuotojas', 'options'=>$employeearray]);
            echo $this->Form->control('State', array('label'=>'Prašymo būsena', 'options'=>$stateSelect));
            echo $this->Form->control('Comment', array('label'=>'Vadovo komentaras', 'placeholder'=>'Įveskite žinutę darbuotojui'));
            echo $this->Form->control('Reason', ['label'=>'Priežastis(nebūtina)','empty' => true, 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Įveskite priežastį, dėl kurios prašomi laisvadieniai']);
            echo $this->Form->control('Viewed', array('label'=>'Ar peržiūrėta', 'type'=>'select', 'options'=>['Ne'=>'Ne', 'Taip'=>'Taip']));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Pridėti prašymą')) ?>
    <?= $this->Form->end() ?>
</div>