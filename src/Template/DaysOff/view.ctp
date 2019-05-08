<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOff $daysOff
 */
echo $this->Html->css('view');
?>
<head>
    <title>Laisvadienių prašymo peržiūrėjimo langas » Kukudra</title>
</head>
<div class="daysOff view large-9 medium-8 columns content">
    <h3><?= h($daysOff->id_Days_off) ?></h3>
    <table class="vertical-table" style="width:50%">
        <tr>
            <th scope="row"><?= __('Prašantis darbuotojas') ?></th>
            <td><?= $daysOff->has('user') ? $this->Html->link($daysOff->user->username . ' (ID: ' . $daysOff->user->id_User . ')', 
			['controller' => 'User', 'action' => 'view', $daysOff->user->id_User]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prašymo būsena') ?></th>
            <td><?= h($daysOff->State) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vadovo komentaras') ?></th>
            <td><?= h($daysOff->Comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ar peržiūrėta') ?></th>
            <td><?= h($daysOff->Viewed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prašymo nr.') ?></th>
            <td><?= $this->Number->format($daysOff->id_Days_off) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prašoma nuo') ?></th>
            <td><?= h($daysOff->Day_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prašoma iki') ?></th>
            <td><?= h($daysOff->Day_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priežastis') ?></th>
            <td><?= h($daysOff->Reason) ?></td>
        </tr>
		<?php 			
			echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    </table><br>
	<?php echo $this->Html->link($this->Form->button('Redaguoti atostogų prašymą'), array('action' => 'edit', $daysOff->id_Days_off), array('escape'=>false, 'title' => "Redaguoti"));	
    ?> <?= $this->Form->postLink($this->Form->button('Naikinti atostogų prašymą'), ['action' => 'delete', $daysOff->id_Days_off], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti # {0}?',
	$daysOff->id_Days_off)));
	?>
</div>
