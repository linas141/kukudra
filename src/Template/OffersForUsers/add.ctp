<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OffersForUser $offersForUser
 */
?>
<nav class="large-3 medium-4 columns" id="Veiksmai-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Veiksmai') ?></li>
        <li><?= $this->Html->link(__('List Offers For Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="offersForUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($offersForUser) ?>
    <fieldset>
        <legend><?= __('Add Offers For User') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
