<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOff[]|\Cake\Collection\CollectionInterface $daysOff
 */
 echo $this->Html->css('view');

?>   
<head>
    <title>Laisvadienių prašymų valdymo langas » Kukudra</title>
	<link href='/assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='/assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
<script src='/assets/fullcalendar/packages/core/main.js'></script>
<script src='/assets/fullcalendar/packages/interaction/main.js'></script>
<script src='/assets/fullcalendar/packages/daygrid/main.js'></script>
<script src='fullcalendar/core/locales/lt.js'></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
	var jData = $("#JSONdata").html();
     calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: [ 'interaction', 'dayGrid' ],
		locale:'lt',
		editable: true,
		selectable: true,
		selectMirror: true,
		eventLimit: true, // allow "more" link when too many events
		events: jQuery.parseJSON(jData),
		eventClick: function(info){
			$('#modaltitle').html(info.event.title);
			var start = info.event.start.getFullYear() + '-'+('0' + (info.event.start.getMonth()+1)).slice(-2)+'-' + ('0' + (info.event.start.getDate())).slice(-2);
			var end = start;
			if(info.event.end !=null) {
				end = info.event.end.getFullYear() + '-'+('0' + (info.event.end.getMonth()+1)).slice(-2)+'-' + ('0' + (info.event.end.getDate())).slice(-2);
			}
			$('#modalbody').html("Laisvadienių prašymas nuo "+ start + " iki " + end);
			$('#ModalId').html(info.event.id);
			$('#dateFrom').val(start);
			$('#dateTo').val(end);
			$("#modal-default").modal();
		},
		eventDrop: function(info) {
			var startDate = info.event.start.getFullYear() + '-' + ( '0' + (info.event.start.getMonth()+1)).slice(-2)+'-' + ('0' + (info.event.start.getDate())).slice(-2);
				if(info.event.end  != null) {
					var endDate =info.event.end.getFullYear() + '-' + ('0' + (info.event.end.getMonth()+1)).slice(-2) + '-' + ('0' + (info.event.end.getDate())).slice(-2);
				} else {
					var endDate = startDate;
				}
			if (!confirm("Ar tikrai norite pakeisti " +info.event.title + " laisvadienio prašymą į " + startDate + ' - ' + endDate + '?')) {
				info.revert();
			}
			else {
				$.ajax({
					url: '/days-off/edit/'+info.event.id,
					type: 'POST',
					headers : {
						'X-CSRF-Token': $('[name="_csrfToken"]').val()
					},
					cache: false,
					data: {Day_from:startDate, Day_to:endDate},
					success: function (data) {
						location.reload(); 
					},
					error: function(error) {
					  console.log(error);
					}
				});
			}
		},
		select: function(info) {
			var startDate =info.start.getFullYear() + '-' + ('0' + (info.start.getMonth()+1)).slice(-2)+'-' + ('0' + (info.start.getDate())).slice(-2);
			var endDate =info.end.getFullYear() + '-' + ('0' + (info.end.getMonth()+1)).slice(-2)+'-' + ('0' + (info.end.getDate()-1)).slice(-2);
			if(endDate > startDate){
				$('#dateFromAdd').val(startDate);
				$('#dateToAdd').val(endDate);
			}else{
				$('#dateFromAdd').val(endDate);
				$('#dateToAdd').val(startDate);
			}
			$("#modal-add").modal();
		}
	});
    calendar.render();
  });	
</script>
<style>
.fc-highlight{
	opacity:0.6;
}
.fc-time{
   display : none;
}
.fc-title{
	color:#fff;
}
.fc-event{
	border:1px solid rgba(0,0,0,0.3);
}
table{
	border:1px solid #ddd;
}
/* Modal Content/Box */
.modal-content {
	background-color: #fefefe;
	margin: 15% auto; /* 15% from the top and centered */
	padding: 20px;
	border: 1px solid #888;
	width: 100%;
	position: fixed;
	height:100%;
	/* bring your own prefixes */
}
.example-modal .modal {
  position: relative;
  top: auto;
  bottom: auto;
  right: auto;
  left: auto;
  display: block;
  z-index: 1;
  height:10%;		

}
.example-modal .modal {
  background: transparent !important;
}

  #calendar {
    max-width: 40%;
    margin: 0 auto;
  }
  @media only screen and (max-width: 600px) {
	#calendar {
		max-width: 100%;
		max-height: 100%;
	}

  }
</style>
</head>
<?php
   $encodedData = json_encode($allevents);
?>
<div id='JSONdata' style="display:none;"><?php echo $encodedData; ?></div>
<div id="ModalId" style="display:none;" ></div>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog" id="modalDialog" style="height:460px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" style="color:grey;" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modaltitle"></h4>
			</div>
			<div class="modal-body" id="modalbody">
				<p>&hellip;</p>
			</div>
			<?php 
			echo $this->Form->control('Laisvadieniai nuo', ['placeholder'=>'Pasirinkite dieną', 'id'=>'dateFrom','required'=>'required', 'class'=>'form-control datepicker', 'type'=>'text']);
			echo $this->Form->control('Laisvadieniai iki', ['placeholder'=>'Pasirinkite dieną', 'id'=>'dateTo','required'=>'required', 'class'=>'form-control datepicker', 'type'=>'text']);
			echo $this->Form->control('Būsena', ['type'=>'select',  'id'=>'state', 'required'=>'required','options'=>['Pateiktas'=>'Pateiktas','Atmestas'=>'Atmestas','Patvirtintas'=>'Patvirtintas']]);?>
			<div class="modal-footer">
				<button type="button" id="buttonClose" class="btn btn-default pull-left" data-dismiss="modal">Užverti</button>
				<button type="button" id="editButton" class="btn btn-success center">Pakeisti</button>
				<button type="button" id="deleteButton" class="btn btn-danger pull-right">Panaikinti</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-add">
	<div class="modal-dialog" id="modalAdd" style="height:520px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" style="color:grey;" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modaltitle">Naujo laisvadienių prašymo pridėjimas</h4>
			</div>
			<div class="modal-body" id="modalbody">
				<?php
			echo $this->Form->control('Laisvadieniai nuo', ['placeholder'=>'Pasirinkite dieną', 'id'=>'dateFromAdd','required'=>'required', 'class'=>'form-control datepicker', 'type'=>'text']);
			echo $this->Form->control('Laisvadieniai iki', ['placeholder'=>'Pasirinkite dieną', 'id'=>'dateToAdd','required'=>'required', 'class'=>'form-control datepicker', 'type'=>'text']);
            echo $this->Form->control('Darbuotojas', ['placeholder'=>'Pasirinkite darbuotoją',  'id'=>'employee', 'required'=>'required','options'=>$employeearray]);
			echo $this->Form->control('Būsena', ['type'=>'select',  'id'=>'stateadd', 'required'=>'required','options'=>['Pateiktas'=>'Pateiktas','Atmestas'=>'Atmestas','Patvirtintas'=>'Patvirtintas']]);?>
			</div><div id="ModalId" style="display:none;" ></div>
			<div class="modal-footer">
				<button type="button" id="buttonClose" class="btn btn-default pull-left" data-dismiss="modal">Užverti</button>
				<button type="button" id="addButton" class="btn btn-success pull-right">Pridėti</button>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="box">
		<h3><?= __('Visi darbuotojų prašymai') ?></h3>
		<br>
		<div class="box box-success">
			<div class="box-header with-border" data-widget="collapse">
				<h3 class="box-title">Filtravimas</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-12">
								<?php     
					echo $this->Form->create();
				//	echo $this->Form->input('filter_id', ['type' => 'text']);
					?>	
					<table style="width:100%">
					<tr>
						<td style="width:30%"><?php echo $this->Form->input('filter_viewed', ['label'=>'Peržiūrėti:  ','options' => [''=>'-- Visi --', 'Taip'=>'Peržiūrėti',
						'Ne'=>'Neperžiūrėti']]);?></td>
						<td style="width:30%"><?php
						echo $this->Form->input('filter_state', ['label'=>'Būsena: ', 'options'=>['Atmestas'=>'Atmesti', 'Pateiktas'=>'Pateikti', 'Patvirtintas'=>'Patvirtinti'],
						'class' => 'form-control select2',  'multiple'=>'multiple', 'style'=>'width:100%']);
						?></td>
					</tr>
					</table>
					<table style="width:100%">
					<tr>
						<td style="width:25%; border-top: 0px; "><?php echo $this->Form->input('filter_from', ['label'=>'Data, nuo: ','type' => 'text',
						'class'=>'form-control datepicker', 'data-date-format'=>"yyyy-mm-dd", 'placeholder'=>'Pasirinkite datą, nuo kurios bus ieškomi prašymai']);?></td>
						<td style="width:25%; border-top: 0px; "><?php echo $this->Form->input('filter_to', ['label'=>'Data, iki: ','type' => 'text', 
						'class'=>'form-control datepicker', 'data-date-format'=>"yyyy-mm-dd", 'placeholder'=>'Pasirinkite datą, iki kurios bus ieškomi prašymai']);?></td>
						<td style="width:50%; border-top: 0px;"><?php echo $this->Form->input('filter_employee', ['label'=>'Darbuotojas: ', 'options'=>$employeearray,
						'class' => 'form-control select2', 'multiple'=>'multiple']);?></td></tr>
					</table><?php 
					echo $this->Form->button('Filtruoti', ['type' => 'submit']);
					echo $this->Form->button('Valyti filtravimą', ['type' => 'reset']);
					echo $this->Form->end();?>		
				</div>
			</div>
		</div>
			<div id='calendar'></div>
		<br><br>
		<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')) . 
			'   Pridėti naują prašymą', ['action' => 'add'], array('escape' => false)); ?>

		<br><br>
		<table  id="daysOffTable" class="table table-bordered table-hover">
			<thead>
				<tr>					
					<th scope="col">Nr. </th>
					<th scope="col">Prašoma nuo </th>
					<th scope="col">Prašoma iki </th>
					<th scope="col">Prašantis darbuotojas </th>
					<th scope="col">Prašymo būsena </th>
					<th scope="col">Vadovo komentaras </th>
					<th scope="col">Priežastis </th>
					<th scope="col">Peržiūrėta </th>
					<th scope="col"><?= __('Greiti veiksmai') ?></th>
									<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

				</tr>
			</thead>
			<tbody>
				<?php foreach ($daysOff as $daysOff): ?>
				<tr>
					<td><?= $this->Number->format($daysOff->id_Days_off) ?></td>
					<td><?= h($daysOff->Day_from) ?></td>
					<td><?= h($daysOff->Day_to) ?></td>
					<td><?= $daysOff->has('user') ? $this->Html->link($daysOff->user->username . ' (ID: ' . $daysOff->user->id_User . ')', ['controller' => 'User', 'action' => 'view', $daysOff->user->id_User]) : '' ?></td>
					<td><?= h($daysOff->State) ?></td>
					<td><?= h($daysOff->Comment) ?></td>
					<td><?= h($daysOff->Reason) ?></td>
					<td><?= h($daysOff->Viewed) ?></td>
					<td>
						<?php if($daysOff->State == 'Pateiktas') {echo $this->Html->link($this->Html->tag('span',__('Suteikti',true)), ['controller' => 'daysOff', 'action' => 'submit', $daysOff->id_Days_off, 'submit'], 
							array('escape'=>false,'class'=>'label label-success'));
						echo $this->Html->link($this->Html->tag('span',__('Atmesti',true)), ['controller' => 'daysOff', 'action' => 'submit', $daysOff->id_Days_off, 'deny'], 
							array('escape'=>false,'class'=>'label label-danger'));
						}?>
					</td>
					<td class="actions">
							<?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $daysOff->id_Days_off]) ?>
							<?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $daysOff->id_Days_off]) ?>
							<?= $this->Form->postLink(__('Trinti'), ['action' => 'delete', $daysOff->id_Days_off], ['confirm' => __('Ar tikrai norite panaikinti # {0}?', $daysOff->id_Days_off)]) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>					
					<th scope="col">Nr. </th>
					<th scope="col">Prašoma nuo </th>
					<th scope="col">Prašoma iki </th>
					<th scope="col">Prašantis darbuotojas </th>
					<th scope="col">Prašymo būsena </th>
					<th scope="col">Vadovo komentaras </th>
					<th scope="col">Priežastis </th>
					<th scope="col">Peržiūrėta </th>
					<th scope="col"><?= __('Greiti veiksmai') ?></th>
									<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>

				</tr>
			</tfoot>
		</table>
	</div>
</section>
<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>
<?php $this->start('scriptBottom'); ?>
<script>	
$(function(){
	$( "#datepickeris" ).datepicker({
		minDate: 1,
		maxDate: 182,
		dateFormat: 'yy-mm-dd',
		inline: true,
		numberOfMonths: [1, 2],
		monthNames: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
		monthNamesShort: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
		dayNamesMin: ['Pir', 'Ant', 'Tre', 'Ket', 'Pen', 'Šeš','Sek'],
		beforeShowDay: disableAllTheseDays
	});
});
$(document).ready( function () {
	$('#daysOffTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':9}
		],
		 "scrollX": true
	});
} );

$(function () {
	//Initialize Select2 Elements
	$('.select2').select2();
});
function disableAllTheseDays(date) {
	var disabledDays = "5-5-2019";
	 var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
	 if($.inArray((m+1) + '-' + d + '-' + y,disabledDays) != -1) return [false, "Highlighted"];
	 return [true];
}
  $('#deleteButton').click(function(){
	  	var id = $('#ModalId').text();
		console.log(id);
		$.ajax({
			url: '/days-off/delete/'+id,
			type: 'POST',
			headers : {
				'X-CSRF-Token': $('[name="_csrfToken"]').val()
			},
			cache: false,
			success: function (data) {
				location.reload(); 
			}
		});
	$('#modal-default').modal('hide'); 

  });
  $('#editButton').click(function(){
	  	var id = $('#ModalId').text();
		var dateFrom = $('#dateFrom').val();
		var dateTo = $('#dateTo').val();
		var state = $('#state').val();
		$.ajax({
			url: '/days-off/edit/'+id,
			type: 'POST',
			headers : {
				'X-CSRF-Token': $('[name="_csrfToken"]').val()
			},
			data:{Day_from:dateFrom, Day_to: dateTo, State:state, Viewed:"Taip"},
			cache: false,
			success: function (data) {
				location.reload(); 
			}
		});
	$('#modal-default').modal('hide'); 

  });
  $('#addButton').click(function(){
	  	var employee = $('#employee').val();
		var dateFrom = $('#dateFromAdd').val();
		var dateTo = $('#dateToAdd').val();
		var state = $('#stateadd').val();
		$.ajax({
			url: '/days-off/add/',
			type: 'POST',
			headers : {
				'X-CSRF-Token': $('[name="_csrfToken"]').val()
			},
			cache: false,
			data: {Day_from:dateFrom, Day_to: dateTo, fk_Employeeid_User:employee, State:state, Viewed:"Taip"},
			success: function (data) {
				location.reload(); 
			}
		});
	$('#modal-default').modal('hide'); 
  });
</script>
<?php $this->end(); ?>