<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOff $daysOff
 */
?>
<head>
    <title>Laisvadienių prašymo redagavimo langas » Kukudra</title>
</head>
<div class="daysOff form large-9 medium-8 columns content">
    <?= $this->Form->create($daysOff) ?>
    <fieldset>
        <legend><?= __($daysOff->id_Days_off . ' atostogų prašymo redagavimas') ?></legend>
						<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
        <?php
            echo $this->Form->control('Day_from', ['empty' => true, 'label'=>'Prašoma nuo: ', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
            echo $this->Form->control('Day_to', ['empty' => true, 'label'=>'Prašoma iki: ', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
			echo $this->Form->input('fk_Employeeid_User', array('label'=>'Darbuotojas: ', 'options' =>  $employeearray));				
            echo $this->Form->control('State', array('label' => 'Prašymo būsena: ', 'options' => $stateSelect));
			echo $this->Form->control('Comment', array('label'=>'Vadovo komentaras: '));
            echo $this->Form->control('Reason', ['label'=>'Priežastis(nebūtina)','empty' => true, 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Įveskite priežastį, dėl kurios prašomi laisvadieniai']);
			echo $this->Form->input('Viewed', array('label'=>'Peržiūrėta: ', 'disabled'));
        ?>
    </fieldset>
	<div>
		<?= $this->Form->button(__('Pakeisti prašymo informaciją')) ?>
    <?= $this->Form->end() ?>
		<?= $this->Form->postLink($this->Form->button('Naikinti prašymą'), ['action' => 'delete', $daysOff->id_Days_off], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti # {0}?',
			$daysOff->id_Days_off)));	?>
	</div>
</div>