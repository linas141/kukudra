<?php
echo $this->Html->css('view');

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="Veiksmai-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Veiksmai') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id_User]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id_User], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $employee->id_User)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employee Review'), ['controller' => 'EmployeeReview', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Review'), ['controller' => 'EmployeeReview', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Review'), ['controller' => 'Review', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Review', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employee view large-9 medium-8 columns content">
    <h3><?= h($employee->id_User) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($employee->First_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($employee->Last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($employee->id_User) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employee Review') ?></h4>
        <?php if (!empty($employee->employee_review)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Review') ?></th>
                <th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
            </tr>
            <?php foreach ($employee->employee_review as $employeeReview): ?>
            <tr>
                <td><?= h($employeeReview->id_Review) ?></td>
                <td class="Veiksmai">
                    <?= $this->Html->link(__('Peržiūrėti'), ['controller' => 'EmployeeReview', 'action' => 'Peržiūrėti', $employeeReview->id_Review]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['controller' => 'EmployeeReview', ['action' => 'edit', $employeeReview->id_Review]) ?>
                    <?= $this->Form->postLink(__('Naikinti'), ['controller' => 'EmployeeReview', 'action' => 'Naikinti', $employeeReview->id_Review], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $employeeReview->id_Review)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Review') ?></h4>
        <?php if (!empty($employee->review)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Reviewer') ?></th>
                <th scope="col"><?= __('Review') ?></th>
                <th scope="col"><?= __('Id Review') ?></th>
                <th scope="col"><?= __('Fk Userid User') ?></th>
                <th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
            </tr>
            <?php foreach ($employee->review as $review): ?>
            <tr>
                <td><?= h($review->Reviewer) ?></td>
                <td><?= h($review->Review) ?></td>
                <td><?= h($review->id_Review) ?></td>
                <td><?= h($review->fk_Userid_User) ?></td>
                <td class="Veiksmai">
                    <?= $this->Html->link(__('Peržiūrėti'), ['controller' => 'Review', 'action' => 'Peržiūrėti', $review->id_Review]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['controller' => 'Review', ['action' => 'edit', $review->id_Review]) ?>
                    <?= $this->Form->postLink(__('Naikinti'), ['controller' => 'Review', 'action' => 'Naikinti', $review->id_Review], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $review->id_Review)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
