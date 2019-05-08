<?php
echo $this->Html->css('view');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WorkSchedule $workSchedule
 */
?><head>
    <title>Darbo dienos informacija » Kukudra</title>
</head>
<div class="workSchedule view large-9 medium-8 columns content">
    <h3>Darbo dienos nr. <?= h($workSchedule->id) ?> informacija</h3>
    <table class="vertical-table" style="width:50%">
        <tr>
            <th scope="row"><?= __('Nr') ?></th>
            <td><?= $this->Number->format($workSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Darbuotojas') ?></th>
			<td><?= $workSchedule->has('user') ? $this->Html->link(substr($workSchedule->user->First_name, 0, 1) . '. ' . $workSchedule->user->Last_name . ' ( ' . $workSchedule->user->username . ')', ['controller' => 'User', 'action' => 'view', $workSchedule->user->id_User]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Darbo data') ?></th>
            <td><?= h($workSchedule->work_date) ?></td>
        </tr>
		<tr>
			<th scope="row">Ar dirbo</th>
			<td><?= ($workSchedule->fulfilled==='Yes')?'Taip':'Ne'; ?></td>
		</tr>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    </table>
<br>	<?php 
	echo $this->Html->link($this->Form->button('Redaguoti darbo dieną'), array('action' => 'edit', $workSchedule->id), array('escape'=>false, 'title' => "Redaguoti"));	
		?> 
	<?= $this->Form->postLink($this->Form->button('Naikinti darbo dieną'), ['action' => 'delete', $workSchedule->id], array('escape'=>false, 
	'confirm' => __('Ar tikrai norite naikinti {0} darbo dieną, darbuotojo {1}?', $workSchedule->work_date, $workSchedule->user->Last_name)));	?>
</div>
