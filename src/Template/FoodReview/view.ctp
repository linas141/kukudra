<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodReview $foodReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Food Review'), ['action' => 'edit', $foodReview->id_Review]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Food Review'), ['action' => 'delete', $foodReview->id_Review], ['confirm' => __('Are you sure you want to delete # {0}?', $foodReview->id_Review)]) ?> </li>
        <li><?= $this->Html->link(__('List Food Review'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Review'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foodReview view large-9 medium-8 columns content">
    <h3><?= h($foodReview->id_Review) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Review') ?></th>
            <td><?= $this->Number->format($foodReview->id_Review) ?></td>
        </tr>
    </table>
</div>
