<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnviromentReview $enviromentReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enviroment Review'), ['action' => 'edit', $enviromentReview->id_Review]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enviroment Review'), ['action' => 'delete', $enviromentReview->id_Review], ['confirm' => __('Are you sure you want to delete # {0}?', $enviromentReview->id_Review)]) ?> </li>
        <li><?= $this->Html->link(__('List Enviroment Review'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enviroment Review'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enviromentReview view large-9 medium-8 columns content">
    <h3><?= h($enviromentReview->id_Review) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Review') ?></th>
            <td><?= $this->Number->format($enviromentReview->id_Review) ?></td>
        </tr>
    </table>
</div>
