<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employee
 */
?>
<nav class="large-3 medium-4 columns" id="Veiksmai-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Veiksmai') ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employee Review'), ['controller' => 'EmployeeReview', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee Review'), ['controller' => 'EmployeeReview', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Review'), ['controller' => 'Review', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Review', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employee index large-9 medium-8 columns content">
    <h3><?= __('Employee') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('First_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_User') ?></th>
                <th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employee as $employee): ?>
            <tr>
                <td><?= h($employee->First_name) ?></td>
                <td><?= h($employee->Last_name) ?></td>
                <td><?= $this->Number->format($employee->id_User) ?></td>
                <td class="Veiksmai">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $employee->id_User]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $employee->id_User]) ?>
                    <?= $this->Form->postLink(__('Naikinti'), ['action' => 'delete', $employee->id_User], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $employee->id_User)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('pirmas')) ?>
            <?= $this->Paginator->prev('< ' . __('praeitas')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('sekantis') . ' >') ?>
            <?= $this->Paginator->last(__('paskutinis') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Puslapis {{page}} iš {{pages}}, vaizduojama {{current}} elementų iš {{count}}')]) ?></p>
    </div>
</div>
