<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<head>
    <title>Naudotojų pridėjimo langas » Kukudra</title>
</head>
<div class="user form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Pridėti naudotoją') ?></legend>
				<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>

        <?php
			echo $this->Form->input('username', array('label'=>'El. pašto adresas: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('password', array('label'=>'Slaptažodis: ', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
			echo $this->Form->input('First_name', array('label'=>'Vardas: ','required'=>'false'));
			echo $this->Form->input('Last_name', array('label'=>'Pavardė: '));
			echo $this->Form->input('Phone_nr', array('label'=>'Telefono nr: '));
			echo $this->Form->input('role', array('label' => 'Naudotojo rolė', 'type' => 'select', 'options' => $roleOptions, 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')")); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Pridėti')) ?>
    <?= $this->Form->end() ?>
</div>
