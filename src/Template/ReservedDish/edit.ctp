<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservedDish $reservedDish
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservedDish->fk_ReservationNumber],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservedDish->fk_ReservationNumber)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reserved Dish'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Dish'), ['controller' => 'Dish', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dish', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservedDish form large-9 medium-8 columns content">
    <?= $this->Form->create($reservedDish) ?>
    <fieldset>
        <legend><?= __('Edit Reserved Dish') ?></legend>
        <?php
            echo $this->Form->control('fk_dish_id', ['options' => $dish]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
