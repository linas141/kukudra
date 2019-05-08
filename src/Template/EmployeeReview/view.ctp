<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeReview $employeeReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Review'), ['action' => 'edit', $employeeReview->id_Review]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Review'), ['action' => 'delete', $employeeReview->id_Review], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeReview->id_Review)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Review'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Review'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeReview view large-9 medium-8 columns content">
    <h3><?= h($employeeReview->id_Review) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Review') ?></th>
            <td><?= $this->Number->format($employeeReview->id_Review) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee FkID') ?></th>
            <td><?= $this->Number->format($employeeReview->employee_fkID) ?></td>
        </tr>
    </table>
</div>
