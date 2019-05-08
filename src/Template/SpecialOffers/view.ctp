<?php
echo $this->Html->css('view');

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer $specialOffer
 */
?><head>
    <title>Specialaus pasiūlymo peržiūrėjimas » Kukudra</title>
</head>
<div class="specialOffers view large-9 medium-8 columns content">
    <h3>Specialaus pasiūlymo '<?= h($specialOffer->Name) ?>' informacija</h3><br>
    <table class="vertical-table" style="width:50%">
	    <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($specialOffer->id_Special_offers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pavadinimas') ?></th>
            <td><?= h($specialOffer->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kaina') ?></th>
            <td><?= $this->Number->format($specialOffer->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data nuo') ?></th>
            <td><?= h($specialOffer->Date_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data iki') ?></th>
            <td><?= h($specialOffer->Date_to) ?></td>
        </tr>
		<?php 			
			echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžti į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
    </table><br>
	<?php 
		echo $this->Html->link($this->Form->button('Redaguoti pasiūlymą'), array('action' => 'edit', $specialOffer->id_Special_offers), array('escape'=>false, 'title' => "Redaguoti"));	
		echo '&nbsp;&nbsp;&nbsp;' . $this->Form->postLink($this->Form->button('Naikinti pasiūlymą'), ['action' => 'delete', $specialOffer->id_Special_offers], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti {0}?',
			$specialOffer->Name)));?>
</div>
