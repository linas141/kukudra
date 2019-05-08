<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dish $dish
 */
?><head>
    <title>Patiekalo pridėjimas » Kukudra</title>
</head>
<div class="dish form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Patiekalo pridėjimas') ?></legend>
				<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>

        <?php
            echo $this->Form->control('Name', array('label'=>'Pavadinimas: ',  'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('Price', array('label'=>'Kaina: ',  'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
            echo $this->Form->control('Contains_products', array('label'=>'Sudėtis: '));
            echo $this->Form->control('dishType', array('label'=>'Patiekalo tipas: ', 'options'=>$dishTypes,  'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'oninput'=>"this.setCustomValidity('')"));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Pridėti')) ?>
    <?= $this->Form->end() ?>
	
</div>
