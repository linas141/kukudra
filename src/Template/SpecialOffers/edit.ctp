<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer $specialOffer
 */
?><head>
    <title>Specialaus pasiūlymo redagavimas » Kukudra</title>
</head>
<div class="specialOffers form large-9 medium-8 columns content">
    <?= $this->Form->create($specialOffer) ?>
    <fieldset>
        <legend><?= __('Specialaus pasiūlymo ' . $specialOffer->Name . ' redagavimas') ?></legend>
				<?php 			
			echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>

        <?php
            echo $this->Form->control('Name', array('label'=>'Pavadinimas: '));
            echo $this->Form->control('Price', array('label'=>'Kaina: '));
            echo $this->Form->control('Date_from', ['empty' => true, 'label' => 'Data, nuo', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
            echo $this->Form->control('Date_to', ['empty' => true, 'label' => 'Data, iki', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
        ?>
    </fieldset>
	<div>
		<?= $this->Form->button(__('Išsaugoti pasiūlymą')) ?>
    <?= $this->Form->end() ?>
		<?= $this->Form->postLink($this->Form->button('Naikinti pasiūlymą'), ['action' => 'delete', $specialOffer->id_Special_offers], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti {0}?',
			$specialOffer->Name)));	?>
	</div>
	<br>		

</div>
