<table  id="example2" class="table table-bordered table-hover">
	<thead>
		<div class="col-xs-1">
			<?php echo $this->Form->create(null,['url' =>  ['action' => 'selectedAction', 'novalidate' => true]]); 
			echo $this->Form->input('selectedAction', array('label'=>'', 'options' => $selectedAction, 'style'=>'width:120px'));?>
		</div><br>
		<?= $this->Html->link(__('Peržiūrėti'), ['action' => 'selectedAction']);
		 ?>
		<tr>
			<th scope="col" class="actions"><?=	$this->Form->checkbox('published', ['hiddenField' => false, 'name'=>'selectReservation', 'onclick'=>'toggle(this)'])?></th>
			<th scope="col"><?= $this->Paginator->sort('Number', array('label'=>'Nr')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('Date', array('label'=>'Pateikimo data')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('Reserver', array('label'=>'Rezervavo')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('State', array('label'=>'Būsena')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('Type', array('label'=>'Tipas')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('name', array('label'=>'Vardas')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('lastName', array('label'=>'Pavardė')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('email', array('label'=>'El. pašto adresas')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('phone', array('label'=>'Telefono nr.')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('amountOfPeople', array('label'=>'Žmonių kiekis')) ?></th>
			<th scope="col"><?= $this->Paginator->sort('dateTime', array('label'=>'Data')) ?></th>
			<th scope="col" class="actions"><?= __('Veiksmai') ?></th>
		</tr>
	</thead>
	<tbody>
		<script>
			function toggle(source) {
				checkboxes = document.getElementsByName('selectReservation[]');
				for(var i=0, n=checkboxes.length;i<n;i++) {
					checkboxes[i].checked = source.checked;
				}
			}
		</script>
		<?php foreach ($reservation as $reservation): ?>
		<tr>
			<td><?php echo $this->Form->checkbox('selectReservation[]', ['id'=>'selectReservation[]',  'value'=> $this->Number->format($reservation->Number)]);?></td>
			<td><?= $this->Number->format($reservation->Number) ?></td>
			<td><?= h($reservation->Date) ?></td>
			<td><?= $this->Number->format($reservation->Reserver) ?></td>
			<?php if($reservation->State == 'Pateikta') : ?>
				<td style="color: rgba(0, 191, 255, 1);"><?= h($reservation->State) ?></td>
			<?php elseif($reservation->State == 'Patvirtinta'): ?>
				<td style="color: rgba(0, 200, 30, 1);"><?= h($reservation->State) ?></td>
			<?php elseif($reservation->State == 'Atšaukta'):?>
				<td style="color: rgba(250, 0, 0, 1);"><?= h($reservation->State) ?></td>
			<?php else :
				?><td><?= h($reservation->State) ?></td>
			<?php endif; ?>
			<td><?= h($reservation->Type) ?></td>
			<td><?= h($reservation->name) ?></td>
			<td><?= h($reservation->lastName) ?></td>
			<td><?= h($reservation->email) ?></td>
			<td><?= $this->Number->format($reservation->phone) ?></td>
			<td><?= $this->Number->format($reservation->amountOfPeople) ?></td>
			<td><?= h($reservation->dateTime) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $reservation->Number]) ?>
				<?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $reservation->Number]) ?>
				<?= $this->Form->postLink(__('Šalinti'), ['action' => 'delete', $reservation->Number], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $reservation->Number)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<th scope="col" class="actions"><?=	$this->Form->checkbox('published', ['hiddenField' => false, 'class'=>'minimal', 'name'=>'selectReservation', 'onclick'=>'toggle(this)']);?></th>
			<th scope="col"><?= $this->Paginator->sort('Nr') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Pateikimo data') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Rezervavo') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Būsena') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Tipas') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Vardas') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Pavardė') ?></th>
			<th scope="col"><?= $this->Paginator->sort('El. pašto adresas') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Telefono nr.') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Žmonių kiekis') ?></th>
			<th scope="col"><?= $this->Paginator->sort('Data') ?></th>
			<th scope="col" class="actions"><?= __('Veiksmai') ?></th>
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
		<?= $this->Paginator->limitControl([6 => 6, 12 => 12, 24 => 24, 48 => 48], $default=1, array('style'=>'width:70px;', 'id'=>'paginatorAmount'))?>
	</ul>
	<p><?= $this->Paginator->counter(['format' => __('Puslapis {{page}} iš {{pages}}, vaizduojama {{current}} elementų iš {{count}}')]) ?></p>
</div>
