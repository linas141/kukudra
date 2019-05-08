<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="Veiksmai-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Veiksmai') ?></li>
        <li><?= $this->Html->link(__('List Employee'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employee Review'), ['controller' => 'EmployeeReview', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee Review'), ['controller' => 'EmployeeReview', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Review'), ['controller' => 'Review', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Review', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employee form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->control('First_name');
            echo $this->Form->control('Last_name');
            echo $this->Form->control('employee_review._ids', ['options' => $employeeReview]);
            echo $this->Form->control('review._ids', ['options' => $review]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
