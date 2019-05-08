<?php
echo $this->Html->css('view');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?><head>
    <title>Rezervacijos peržiūrėjimo langas » Kukudra</title>
</head>
<div class="reservation view large-9 medium-8 columns content">
    <h3>Rezervacijos Nr. <?= h($reservation->Number) ?> informacija</h3>
    <table class="vertical-table" style="width:50%">
        <tr>
            <th scope="row"><?= __('Būsena') ?></th>
			<?php if($reservation->State == 'Pateikta') : ?>
				<td style="background-color: rgba(0, 191, 255, 0.5);"><?= h($reservation->State) ?></td>
			<?php elseif($reservation->State == 'Patvirtinta'): ?>
				<td style="background-color: rgba(0, 250, 10, 0.3);"><?= h($reservation->State) ?></td>
			<?php elseif($reservation->State == 'Atšaukta'):?>
				<td style="background-color: rgba(250, 0, 0, 0.4);"><?= h($reservation->State) ?></td>
			<?php else :
				?><td style="background-color: rgba(255, 255, 255, 0.8);"><?= h($reservation->State) ?></td>
			<?php endif; ?>
        </tr>
		<tr>
            <th scope="row"><?= __('Rezervacijos nr.') ?></th>
            <td><?= $this->Number->format($reservation->Number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipas') ?></th>
            <td><?php $tipas=$reservation->Type; if($tipas ==='Table') echo 'Stalelio rezervacija'; else if($tipas ==='Food') echo 'Maisto rezervacija'; else if($tipas ==='Restaurant') echo 'Salės rezervacija'; else echo 'Nėra tipo!' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rezervuotojo vardas') ?></th>
            <td><?= h($reservation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rezervuotojo pavardė') ?></th>
            <td><?= h($reservation->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('El. pašto adresas') ?></th>
            <td><?= h($reservation->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rezervavo') ?></th>
            <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->username . ' (ID: ' . $reservation->user->id_User . ')', ['controller' => 'User', 'action' => 'view', $reservation->user->id_User]) : ''  ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono nr.') ?></th>
            <td><?= $this->Number->format($reservation->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Žmonių kiekis') ?></th>
            <td><?= $this->Number->format($reservation->amountOfPeople) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pateikta') ?></th>
            <td><?= h($reservation->Date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rezervuota data ir laikas') ?></th>
            <td><?= h($reservation->dateTime) ?></td>
        </tr>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    </table><br>
	<?php 
		echo $this->Html->link($this->Form->button('Redaguoti rezervaciją'), array('action' => 'edit', $reservation->Number), array('escape'=>false, 'title' => "Redaguoti"));	
            ?> 
		<?= $this->Form->postLink($this->Form->button('Naikinti rezervaciją'), ['action' => 'delete', $reservation->Number], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti # {0}?',
			$reservation->Number)));	?>
</div>
