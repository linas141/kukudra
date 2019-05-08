<?php
echo $this->Html->css('view');

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<head>
    <title>Naudotojo peržiūrėjimo langas » Kukudra</title>
</head>
<div class="user view large-9 medium-8 columns content">
    <h3>Vartotojo '<?= h($user->username) ?>' informacija</h3><br>
    <table class="vertical-table" style="width:50%;">
	    <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($user->id_User) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vartotojo vardas') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slaptažodis') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vardas') ?></th>
            <td><?= h($user->First_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pavardė') ?></th>
            <td><?= h($user->Last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rolė') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paskutinio prisijungimo IP adresas') ?></th>
            <td><?= h($user->Last_IP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono nr') ?></th>
            <td><?= $this->Number->format($user->Phone_nr) ?></td>
        </tr>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    </table><br>
	<?php 
		echo $this->Html->link($this->Form->button('Redaguoti naudotoją'), array('action' => 'edit', $user->id_User), array('escape'=>false,'title' => "Redaguoti"));	
		?>
		<?= $this->Form->postLink($this->Form->button('Naikinti naudotoją'), ['action' => 'delete', $user->id_User], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti {0}?',
			$user->username)));	?>

</div>
