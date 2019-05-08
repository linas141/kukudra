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
		editable: false,
		eventLimit: true, // allow "more" link when too many events
		events: <?=json_encode($allevents)?>,
		datesRender: function (info)
		{
			var didntSelected = 0;
			var workedSelected = 0;
			var start = info.view.currentStart;
			var end = info.view.currentEnd;
			calendar.getEvents().filter(function(event) {
				if(event.start > start && event.start < end){
					if(event.backgroundColor === '#B20000'){
						didntSelected++;
					}
					else if(event.backgroundColor === '#008000'){
						workedSelected++;
					}
				} 
			});
			$("#selectedworked").html(workedSelected);
			$("#selecteddidnt").html(didntSelected);
		}
	});
    calendar.render();
	var didntWork = 0;
	var worked = 0;
	var futuredays = 0;
	calendar.getEvents().filter(function(event) {
		if(event.backgroundColor === '#B20000'){
			didntWork++;
		}
		else if(event.backgroundColor === '#008000'){
			worked++;
		}
		else if(event.backgroundColor === '#3c8dbc'){
			futuredays++;
		}
	});
	$("#futuredays").html(futuredays);
	$("#worked").html(worked);
	$("#didntWork").html(didntWork);
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
  @media only screen and (max-width: 1400px) {
	.box{
	  max-height:550px;
	}
  }
  @media only screen and (max-width: 600px) {
	#calendar {
		max-width: 100%;
		max-height: 100%;
	}

  }
</style>
</head>
<section class="content">
<div class="box" style="height:800px;">
    <h3><?= __('Darbo grafikas') ?></h3>
	<div id='calendar'class="col-md-9"></div>
  <div class="col-md-3">
  <h3>Jūsų darbo statistika</h3>
  Viso <span style="color:#B20000">nedirbote </span><div id="didntWork" style="display:inline;">0</div> d.<br>
  Viso <span style="color:#008000">dirbote </span><div id="worked" style="display:inline">0</div> d.<br>
  Nustatytos <span style="color:#3c8dbc">būsimos darbo dienos:</span> <div id="futuredays" style="display:inline">0</div> d.<br><br>
  Pasirinktą mėnesį nedirbote <div id="selecteddidnt" style="display:inline">0</div> d.<br>
  Pasirinktą mėnesį dirbote <div id="selectedworked" style="display:inline">0</div> d.<br>
  </div>
</div>
</section>
<?php $this->start('scriptBottom'); ?>		
<script>	
$(document).ready( function () {
	    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
	$('#workTable').DataTable({
		"lengthMenu": [[ 20, 40, -1 ],[20,40,'Visi']],
		"columnDefs": [
			{'orderable':false, 'targets':3},
		],
		 "scrollX": true	});
} );
$(window).load(function(){ $('#workTable').DataTable().columns.adjust() })
</script>
<?php $this->end(); ?>