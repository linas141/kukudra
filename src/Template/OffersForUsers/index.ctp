<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OffersForUser[]|\Cake\Collection\CollectionInterface $offersForUsers
 */
?>
<nav class="large-3 medium-4 columns" id="Veiksmai-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Veiksmai') ?></li>
        <li><?= $this->Html->link(__('New Offers For User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="offersForUsers index large-9 medium-8 columns content">
    <h3><?= __('Offers For Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fk_Userid_User') ?></th>
                <th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offersForUsers as $offersForUser): ?>
            <tr>
                <td><?= $this->Number->format($offersForUser->fk_Userid_User) ?></td>
                <td class="Veiksmai">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $offersForUser->fk_Userid_User]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $offersForUser->fk_Userid_User]) ?>
                    <?= $this->Form->postLink(__('Naikinti'), ['action' => 'delete', $offersForUser->fk_Userid_User], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $offersForUser->fk_Userid_User)]) ?>
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
