<?php
echo $this->Html->css('view');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<head>
    <title>Atsiliepimo peržiūrėjimas » Kukudra</title>
</head>
<div class="review view large-9 medium-8 columns content">
    <h3>Atsiliepimo <?= h($review->id_Review) ?> informacija</h3>
			<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    <table class="vertical-table" style="width:50%;">
        <tr>
            <th scope="row" style="width:20%"><?= __('Turinys') ?></th>
            <td><?= h($review->Review) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atsiliepimą paliko') ?></th>
            <td><?= $review->has('user') ? $this->Html->link($review->user->username, ['controller' => 'User', 'action' => 'view', $review->user->id_User]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atsiliepimo nr.') ?></th>
            <td><?= $this->Number->format($review->id_Review) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Įvertinimas') ?></th>
            <td><?= $this->Number->format($review->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atsiliepimo data') ?></th>
            <td><?= h($review->datePublished) ?></td>
        </tr>
		<tr>
			<th scope="row">Atsiliepimas apie</th>
			<td><?php if(!empty($review->enviroment_review)) echo 'Aplinką'; 
			elseif (!empty($review->food_review)) echo 'Maistą'; 
			elseif(!empty($review->employee_review)) echo 'Darbuotoją \'' . $review->employee_review[0]->user->username.'\'';
			else echo 'Nėra tipo!';?></td>
		</tr>
    </table><br>
		<?php 
		echo $this->Html->link($this->Form->button('Redaguoti atsiliepimą'), array('action' => 'edit', $review->id_Review), array('escape'=>false,'title' => "Redaguoti"));	
		?>
		<?= $this->Form->postLink($this->Form->button('Naikinti atsiliepimą'), ['action' => 'delete', $review->id_Review], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti {0}?',
			$review->id_Review)));	?>
</div>
