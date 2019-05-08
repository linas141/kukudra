<?php
echo $this->Html->css('view');

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dish $dish
 */
?><head>
    <title>Patiekalo peržiūrėjimas » Kukudra</title>
</head>
<div class="dish view large-9 medium-8 columns content">
    <h3><?= h($dish->Name) ?></h3>
    <table class="vertical-table" style="width:50%;">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($dish->id_Dish) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pavadinimas') ?></th>
            <td><?= h($dish->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sudėtis') ?></th>
            <td><?= h($dish->Contains_products) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patiekalo tipas') ?></th>
            <td><?= h($dish->dishType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kaina') ?></th>
            <td><?= $this->Number->format($dish->Price) ?></td>
        </tr>
		<?php 			
			echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    </table><br>
	<?php 
		echo $this->Html->link($this->Form->button('Redaguoti patiekalą'), array('action' => 'edit', $dish->id_Dish), array('escape'=>false, 'title' => "Redaguoti"));	
		echo '&nbsp;&nbsp;&nbsp;' .$this->Form->postLink($this->Form->button('Naikinti patiekalą'), ['action' => 'delete', $dish->id_Dish], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti {0}?',
			$dish->Name)));	?>
</div>
