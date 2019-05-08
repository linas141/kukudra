<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkSchedule $workSchedule
 */
?><head>
    <title>Darbo dienos pridėjimo langas » Kukudra</title>
</head>
<div class="workSchedule form large-9 medium-8 columns content">
    <?= $this->Form->create($workSchedule) ?>
    <fieldset>
        <legend><?= __('Pridėti darbo dieną') ?></legend>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));?><br><br>
        <?php
            echo $this->Form->control('work_date', ['label'=>'Darbo diena', 'class'=>'form-control datepicker', 'type'=>'text']);
            echo $this->Form->control('employee_fkID', ['label'=>'Darbuotojas', 'options'=>$employeearray]);
            echo $this->Form->control('fulfilled', ['label'=>'Ar dirbo', 'options'=>['No'=>'Ne','Yes'=>'Taip']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Pridėti')) ?>
    <?= $this->Form->end() ?>
</div>
