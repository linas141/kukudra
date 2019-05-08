<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeReview $employeeReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employeeReview->id_Review],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employeeReview->id_Review)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employee Review'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employeeReview form large-9 medium-8 columns content">
    <?= $this->Form->create($employeeReview) ?>
    <fieldset>
        <legend><?= __('Edit Employee Review') ?></legend>
        <?php
            echo $this->Form->control('employee_fkID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
