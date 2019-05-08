<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOff[]|\Cake\Collection\CollectionInterface $daysOff
 */

?>   
<head>
    <title>Darbuotojo pateikti aisvadienių prašymai » Kukudra</title>
</head>
<section class="content">
	<div class="box">
		<h3><?= __('Mano laisvadienių prašymai') ?></h3>
		<br><?php if(sizeof($daysOffSubmitted)<1) :
			echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')) . 
				'   Pridėti naują prašymą', ['action' => 'employeeadd'], array('escape' => false));
		else :
			echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')) . 
				'   Pridėti naujo prašymo negalite, nes paskutinis atostogų prašymas dar neperžiūrėtas!', ['action' => ''], array('escape' => false, 'target'=>'_blank', 'onclick' => 'return false')); 
		 endif;?>
		<br><br>
		<table  id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>					
				<th scope="col"><?= $this->Paginator->sort('id_Days_off', array('label'=>'Nr.')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Day_from', array('label'=>'Prašote nuo')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Day_to', array('label'=>'Prašote iki')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('State', array('label'=>'Prašymo būsena')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Comment', array('label'=>'Vadovo komentaras')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Viewed', array('label'=>'Priežastis')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Viewed', array('label'=>'Peržiūrėta')) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daysOff as $daysOff): ?>
            <tr>
                <td><?= $this->Number->format($daysOff->id_Days_off) ?></td>
                <td><?= h($daysOff->Day_from) ?></td>
                <td><?= h($daysOff->Day_to) ?></td>
                <td><?= h($daysOff->State) ?></td>
                <td><?= h($daysOff->Comment) ?></td>
                <td><?= h($daysOff->Reason) ?></td>
                <td><?= h($daysOff->Viewed) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
		<tfoot>
		    <tr>					
				<th scope="col"><?= $this->Paginator->sort('id_Days_off', array('label'=>'Nr.')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Day_from', array('label'=>'Prašote nuo')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Day_to', array('label'=>'Prašote iki')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('State', array('label'=>'Prašymo būsena')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Comment', array('label'=>'Vadovo komentaras')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Viewed', array('label'=>'Priežastis')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('Viewed', array('label'=>'Peržiūrėta')) ?></th>
            </tr>
		</tfoot>
    </table>
		<div class="paginator">
			<ul class="pagination" style="width:100%">
				<?= $this->Paginator->first('<< ' . __('pirmas')) ?>
				<?= $this->Paginator->prev('< ' . __('praeitas')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('sekantis') . ' >') ?>
				<?= $this->Paginator->last(__('paskutinis') . ' >>') ?>
			</ul>
			<p><?= $this->Paginator->counter(['format' => __('Puslapis {{page}} iš {{pages}}, vaizduojama  {{current}} elementų iš {{count}}')]) ?></p>
		</div>
	</div>
</section>