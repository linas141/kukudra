<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservedDish[]|\Cake\Collection\CollectionInterface $reservedDish
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reserved Dish'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dish'), ['controller' => 'Dish', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dish', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservedDish index large-9 medium-8 columns content">
    <h3><?= __('Reserved Dish') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fk_ReservationNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_dish_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservedDish as $reservedDish): ?>
            <tr>
                <td><?= $this->Number->format($reservedDish->fk_ReservationNumber) ?></td>
                <td><?= $reservedDish->has('dish') ? $this->Html->link($reservedDish->dish->id_Dish, ['controller' => 'Dish', 'action' => 'view', $reservedDish->dish->id_Dish]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservedDish->fk_ReservationNumber]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservedDish->fk_ReservationNumber]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservedDish->fk_ReservationNumber], ['confirm' => __('Are you sure you want to delete # {0}?', $reservedDish->fk_ReservationNumber)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
