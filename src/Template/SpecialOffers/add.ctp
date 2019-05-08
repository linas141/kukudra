<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer $specialOffer
 */
?><head>
    <title>Specialaus pasiūlymo pridėjimas » Kukudra</title>
</head>
<div class="specialOffers form large-9 medium-8 columns content">
    <?= $this->Form->create($specialOffer) ?>
    <fieldset>
        <legend><?= __('Specialaus pasiūlymo pridėjimas') ?></legend>
						<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>

        <?php
            echo $this->Form->control('Name', array('label'=>'Pavadinimas: '));
            echo $this->Form->control('Price', array('label'=>'Kaina: '));
            echo $this->Form->control('Date_from', ['empty' => true, 'label' => 'Data, nuo', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
            echo $this->Form->control('Date_to', ['empty' => true, 'label' => 'Data, iki', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Išsaugoti')) ?>
    <?= $this->Form->end() ?>
</div>
