<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodReview[]|\Cake\Collection\CollectionInterface $foodReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Food Review'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodReview index large-9 medium-8 columns content">
    <h3><?= __('Food Review') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_Review') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foodReview as $foodReview): ?>
            <tr>
                <td><?= $this->Number->format($foodReview->id_Review) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $foodReview->id_Review]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foodReview->id_Review]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foodReview->id_Review], ['confirm' => __('Are you sure you want to delete # {0}?', $foodReview->id_Review)]) ?>
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
