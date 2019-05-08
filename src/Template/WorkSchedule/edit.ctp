<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkSchedule $workSchedule
 */
?><head>
    <title>Darbo dienos redagavimo langas » Kukudra</title>
</head>
<div class="workSchedule form large-9 medium-8 columns content">
    <?= $this->Form->create($workSchedule) ?>
    <fieldset>
        <legend><?= __('Redaguojate darbo grafiką') ?></legend>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));?><br><br>
        <?php
            echo $this->Form->control('work_date', ['label'=>'Darbo diena', 'class'=>'form-control datepicker', 'type'=>'text']);
            echo $this->Form->control('employee_fkID', ['label'=>'Darbuotojas', 'options'=>$employeearray]);
            echo $this->Form->control('fulfilled', ['label'=>'Ar dirbo', 'options'=>['No'=>'Ne','Yes'=>'Taip']]);
        ?>
    </fieldset>
	<div>
    <?= $this->Form->button(__('Išsaugoti')) ?>
	<?= $this->Form->end() ?>
	<?= $this->Form->postLink($this->Form->button('Naikinti darbo dieną'), ['action' => 'delete', $workSchedule->id], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti # {0}?',
		$workSchedule->id)));	?>
	</div>
</div>
