<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dish $dish
 */
?><head>
    <title>Patiekalo redagavimas » Kukudra</title>
</head>
<div class="dish form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Patiekalo ' . $dish->Name . ' redagavimas') ?></legend>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
        <?php
            echo $this->Form->control('Name', array('label'=>'Pavadinimas: '));
            echo $this->Form->control('Price', array('label'=>'Kaina: '));
            echo $this->Form->control('Contains_products', array('label'=>'Sudėtis: '));
            echo $this->Form->control('dishType', array('label'=>'Patiekalo tipas: ', 'options'=>$dishTypes));
        ?>
    </fieldset>
	<div>
    <?= $this->Form->button(__('Išsaugoti')) ?>
    <?= $this->Form->end() ?>
		<?= $this->Form->postLink($this->Form->button('Naikinti patiekalą'), ['action' => 'delete', $dish->id_Dish], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti patiekalą {0}?',
		$dish->Name)));?>
	</div>
</div>
