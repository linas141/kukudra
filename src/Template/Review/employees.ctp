<?php
echo $this->Html->css('view');
?>
<head>
    <title>Atsiliepimų apie darbuotoją langas » Kukudra</title>
</head>
<section class="content">
	<div class="box">
		<h3><?= __('Naudotojų palikti atsiliepimai apie mane') ?></h3>
		<br>	
		<table id="reviewTable" class="table table-bordered table-hover">
			<br><br>        
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Atsiliepimas</th>
					<th scope="col">Vartotojas</th>
					<th scope="col">Paskelbtas</th>
					<th scope="col">Įvertinimas</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($reviews as $review): ?>
				<tr>
					<td><?= $this->Number->format($review->id_Review) ?></td>
					<td><?= h($review->review->Review) ?></td>
					<td><?= $review->has('user') ? $review->review->user->username . ' (ID: ' . $review->review->user->id_User . ')' : ''  ?></td>
					<td><?= h($review->review->datePublished) ?></td>
					<td><?= $this->Number->format($review->review->rating) ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Atsiliepimas</th>
					<th scope="col">Vartotojas</th>
					<th scope="col">Paskelbtas</th>
					<th scope="col">Įvertinimas</th>
				</tr>
			</tfoot>
		</table>
	</div>
</section>
<?php $this->start('scriptBottom'); ?>
<script>	
$(document).ready( function () {
	$('#reviewTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']]
	});
} );
</script>
<?php $this->end(); ?>