<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnviromentReview $enviromentReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enviromentReview->id_Review],
                ['confirm' => __('Are you sure you want to delete # {0}?', $enviromentReview->id_Review)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Enviroment Review'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="enviromentReview form large-9 medium-8 columns content">
    <?= $this->Form->create($enviromentReview) ?>
    <fieldset>
        <legend><?= __('Edit Enviroment Review') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
