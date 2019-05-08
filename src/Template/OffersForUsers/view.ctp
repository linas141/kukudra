<?php
echo $this->Html->css('view');

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OffersForUser $offersForUser
 */
?>
<nav class="large-3 medium-4 columns" id="Veiksmai-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Veiksmai') ?></li>
        <li><?= $this->Html->link(__('Edit Offers For User'), ['action' => 'edit', $offersForUser->fk_Userid_User]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Offers For User'), ['action' => 'delete', $offersForUser->fk_Userid_User], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $offersForUser->fk_Userid_User)]) ?> </li>
        <li><?= $this->Html->link(__('List Offers For Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offers For User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="offersForUsers view large-9 medium-8 columns content">
    <h3><?= h($offersForUser->fk_Userid_User) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fk Userid User') ?></th>
            <td><?= $this->Number->format($offersForUser->fk_Userid_User) ?></td>
        </tr>
    </table>
</div>
