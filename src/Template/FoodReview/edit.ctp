<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodReview $foodReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foodReview->id_Review],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foodReview->id_Review)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Food Review'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="foodReview form large-9 medium-8 columns content">
    <?= $this->Form->create($foodReview) ?>
    <fieldset>
        <legend><?= __('Edit Food Review') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
