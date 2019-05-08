<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user
 */
  echo $this->Html->css('view');
?><head>
    <title>Darbo grafiko valdymo langas » Kukudra</title>
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
		eventLimit: true, // allow "more" link when too many events
		events: jQuery.parseJSON(jData),
		eventClick: function(info){
			$('#modaltitle').html(info.event.title);
			$('#modalbody').html("Darbo diena: "+ info.event.start.getFullYear() + '-'+(info.event.start.getMonth()+1)+'-'+info.event.start.getDate());
			$('#ModalId').html(info.event.id);
			$("#modal-default").modal();
		},
		eventDrop: function(info) {
			if (!confirm("Ar tikrai norite pakeisti " +info.event.title + " darbo dieną į " + info.event.start.getFullYear() + '-'+(info.event.start.getMonth()+1)+'-'+info.event.start.getDate()+'?' )) {
				info.revert();
			}
			else {
				var data =info.event.start.getFullYear() + '-'+(info.event.start.getMonth()+1)+'-'+info.event.start.getDate();
				$.ajax({
					url: '/workSchedule/edit/'+info.event.id,
					type: 'POST',
					headers : {
						'X-CSRF-Token': $('[name="_csrfToken"]').val()
					},
					cache: false,
					data: {work_date:data},
					success: function (data) {
						location.reload(); 
					}
				});
			}
		},
		dateClick: function(info) {
			$("#modal-add").modal();
			$('#datepicker').val(info.dateStr);
		}
	});
    calendar.render();
  });	
</script>
<style>
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
    max-width: 50%;
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
<div id='JSONdata' style="display:none;"><?php echo $encodedData; ?></div><div id="ModalId" style="display:none;" ></div>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog" id="modalDialog" style="height:280px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" style="color:grey;" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modaltitle"></h4>
			</div>
			<div class="modal-body" id="modalbody">
				<p>&hellip;</p>
			</div>
			<?php echo $this->Form->control('Ar dirbo', ['type'=>'select',  'id'=>'fulfilledEdit', 'required'=>'required','options'=>[''=>'-- Pasirinkite --','No'=>'Ne','Yes'=>'Taip']]);?>
			<div class="modal-footer">
				<button type="button" id="buttonClose" class="btn btn-default pull-left" data-dismiss="modal">Užverti</button>
				<button type="button" id="editButton" class="btn btn-success center">Pakeisti</button>
				<button type="button" id="deleteButton" class="btn btn-danger pull-right">Panaikinti</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-add">
	<div class="modal-dialog" id="modalAdd" style="height:410px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" style="color:grey;" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modaltitle">Naujos darbo dienos pridėjimas</h4>
			</div>
			<div class="modal-body" id="modalbody">
				<?php             echo $this->Form->control('Darbo diena', ['placeholder'=>'Pasirinkite dieną', 'id'=>'datepicker','required'=>'required', 'class'=>'form-control datepicker', 'type'=>'text']);
            echo $this->Form->control('Darbuotojas', ['placeholder'=>'Pasirinkite darbuotoją',  'id'=>'employee', 'required'=>'required','options'=>$employeearray]);
			echo $this->Form->control('Ar dirbo', ['type'=>'select',  'id'=>'fulfilled', 'required'=>'required','options'=>['No'=>'Ne','Yes'=>'Taip']]);?>
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
    <h3><?= __('Darbo grafikas') ?></h3>
	<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')).'   Pridėti naują darbo dieną', ['action' => 'add'], array('escape' => false));
?> <br><br>
		<div class="box box-success">
			<div class="box-header with-border" data-widget="collapse">
				<h3 class="box-title">Filtravimas</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-12">
					<?php echo $this->Form->create();?>	
					<table style="width:100%">
						<tr>
							<td style="width:50%"><?php echo $this->Form->input('filter_state', ['label'=>'Ar dirbo:  ','options' => [''=>'-- Visi --', 'Yes'=>'Taip',
							'No'=>'Ne']]);?></td>
							<td style="width:50%; border-top: 0px;"><?php echo $this->Form->input('filter_employee', ['label'=>'Darbuotojas: ', 'options'=>$employeearray,
						'class' => 'form-control select2', 'multiple'=>'multiple']);?></td>
						</tr>
					</table>
					<table style="width:100%">
						<tr>
							<td style="width:25%; border-top: 0px; "><?php echo $this->Form->input('filter_from', ['label'=>'Data, nuo: ','type' => 'text',
							'class'=>'form-control datepicker', 'data-date-format'=>"yyyy-mm-dd", 'placeholder'=>'Pasirinkite datą']);?></td>
							<td style="width:25%; border-top: 0px; "><?php echo $this->Form->input('filter_to', ['label'=>'Data, iki: ','type' => 'text',
							'class'=>'form-control datepicker', 'data-date-format'=>"yyyy-mm-dd", 'placeholder'=>'Pasirinkite datą']);?></td>
						</tr>
					</table><?php 
					echo $this->Form->button('Filtruoti', ['type' => 'submit']);
					echo $this->Form->button('Valyti filtravimą', ['type' => 'reset']);
					echo $this->Form->end();?>		
				</div>
			</div>
		</div>

  <div id='calendar'></div>
    <table id="workTable" style="width:100%" class="table table-bordered table-hover dataTable">
        <thead>
            <tr>
                <th scope="col">Nr</th>
                <th scope="col">Darbo data</th>
                <th scope="col">Darbuotojas</th>
                <th scope="col">Ar dirbo</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workSchedule as $workSchedule): ?>
            <tr>
                <td><?= $this->Number->format($workSchedule->id) ?></td>
                <td><?= h($workSchedule->work_date) ?></td>
				<td><?= $workSchedule->has('user') ? $this->Html->link(substr($workSchedule->user->First_name, 0, 1) . '. ' . $workSchedule->user->Last_name . ' ( ' . $workSchedule->user->username . ')', ['controller' => 'User', 'action' => 'view', $workSchedule->user->id_User]) : '' ?></td>
                <td><?= ($workSchedule->fulfilled==='Yes')?'Taip':'Ne'; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $workSchedule->id]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $workSchedule->id]) ?>
                    <?= $this->Form->postLink(__('Trinti'), ['action' => 'delete', $workSchedule->id], ['confirm' => __('Ar tikrai norite naikinti {0} darbo dieną, darbuotojo {1}?', $workSchedule->work_date, $workSchedule->user->Last_name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Nr</th>
                <th scope="col">Darbo data</th>
                <th scope="col">Darbuotojas</th>
                <th scope="col">Ar dirbo</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </tfoot>
    </table>
</div>
</section>
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>
<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>
<?php $this->start('scriptBottom'); ?>		
<script>	
$(document).ready( function () {
	$(function () {
	$('.select2').select2();
});
	    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
	$('#workTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':4},
		],
		 "scrollX": true	});
} );
$(window).load(function(){ $('#workTable').DataTable().columns.adjust() })
  $('#deleteButton').click(function(){
	  	var id = $('#ModalId').text();
		$.ajax({
			url: '/workSchedule/delete/'+id,
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
		var fulfilled = $('#fulfilledEdit').val();
		$.ajax({
			url: '/workSchedule/edit/'+id,
			type: 'POST',
			headers : {
				'X-CSRF-Token': $('[name="_csrfToken"]').val()
			},
			data:{fulfilled:fulfilled},
			cache: false,
			success: function (data) {
				location.reload(); 
			}
		});
	$('#modal-default').modal('hide'); 

  });
  $('#addButton').click(function(){
	  	var employee = $('#employee').val();
		var date = $('#datepicker').val();
		var fulfilled = $('#fulfilled').val();
		$.ajax({
			url: '/workSchedule/add/',
			type: 'POST',
			headers : {
				'X-CSRF-Token': $('[name="_csrfToken"]').val()
			},
			cache: false,
			data: {work_date:date, employee_fkID:employee, fulfilled:fulfilled},
			success: function (data) {
				location.reload(); 
			}
		});
	$('#modal-default').modal('hide'); 
  });
</script>
<?php $this->end(); ?>