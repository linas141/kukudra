<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rezervacijos pateikimas » Kukudra | Kavinė Kretingalėje</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
	<script src="/assets/select2/dist/js/select2.full.min.js"></script>	
	<link rel="stylesheet" href="/assets/select2/dist/css/select2.min.css">	
	<script type="text/javascript" src="/assets/timepicker/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/timepicker/jquery.timepicker.css" />
	<script type="text/javascript" src="/assets/timepicker/lib/site.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="/assets/style.css">	
    <link rel="stylesheet" href="/assets/home/fonts/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-Animated-Back-To-Top.css">
    <link rel="stylesheet" href="/assets/home/css/Pretty-Footer.css">
    <link rel="stylesheet" href="/assets/home/css/Juvi---Push-Empty-Space-20px.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/assets/home/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="/assets/home/css/styles.css">    
	<link href="https://jqueryvalidation.org/files/demo/site-demos.css" rel="stylesheet"/>

<style>
#phone{
	height:50px;
}
.error{
	color:red;
	background:none!important;
}
.form-control.error{
	border:1px solid red!important;
}
.form-control.valid{
	border:1px solid green!important;
}
@media screen and (max-width: 1150px) {
	#msform{
		width:100%;	
	}
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
	background-color: #3c8dbc !important;
	border-color: #3c8dbc !important;
}
.select2-container{
	width:100%!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
	background-color: #e4e4e4!important;
	border: 1px solid #aaa!important;
}
.select2-container--default.select2-container--focus .select2-selection--multiple{
	border: 1px solid #ced4da !important;
}
.select2-container--default .select2-search--inline .select2-search__field{
	border:none !important;
	width: 100% !important;
	position: relative;
	top: -10px;
	font-size: 16px !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered{
	height: 31px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/localization/messages_lt.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
	<script type="text/javascript">
		if ($(window).width() < 1440) {
			$( function() {
				$( "#datepicker" ).datepicker({
					onSelect: getDate,
					minDate: 1,
					maxDate: 182,
					dateFormat: 'yy-mm-dd',
					inline: true,
					monthNames: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
					monthNamesShort: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
					dayNamesMin: ['Pir', 'Ant', 'Tre', 'Ket', 'Pen', 'Šeš','Sek'],
					beforeShowDay: disableAllTheseDays
				});
			});
	/*		$(document).ready(function(){
				document.getElementById('msform').style.width ="100%";
				document.getElementById('datepicker').style="position:relative;width:290px;height:270px;top:50%;left:30%;"
			});
	*/	}
		else {
			$( function() {
				$( "#datepicker" ).datepicker({
					onSelect: getDate,
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
			} );
		}
		<?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["selectedType"]) && isset($_GET["date"])) :?>
			var selectedValue = "<?php echo ($_GET["selectedType"]);?>";
			var selectedDate = "<?php echo($_GET["date"]);?>";
			$(document).ready(function() {
				$("#selectedType").val(selectedValue);
				$('#enableButton').click();
				$("#datepicker").datepicker('setDate', selectedDate);
				getDate(selectedDate);
				var firstbutton = document.getElementById("enableButton");
				firstbutton.disabled=false;
				firstbutton.style="background-color: rgb(20,133,238)";
				var buttonNext = document.getElementById("datepickerNext");
				buttonNext.disabled=false;
				buttonNext.style="background-color: rgb(20,133,238)";
			});
		<?php endif;?>
</script>
</head>
<?= $this->element('menu');?>
<body>
    <div class="Push-20" style="height: 80px;background-color: #f1f7fc;"></div>
	<div class="form-container">
		<?= $this->Form->create(null,['id'=>"msform", 'style'=>"z-index:9; min-height:39em;"]); ?>
		<?php echo $this->Flash->render(); ?>
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active" id="text">Rezervacijos tipas</li>
				<li id="text">Data</li>
				<li id="text">Asmeninė informacija</li>
				<li id="text">Papildoma informacija</li>
				<li id="text">Patvirtinimas</li>
			</ul>
			<!-- fieldsets -->
			<fieldset id="fieldset1" class="fieldSetClass">
				<h2 class="fs-title">Pasirinkite rezervacijos tipą</h2>
				<h3 class="fs-subtitle">Pasirinkite rezervacijos tipą pagal norimą pateikti užsakymą</h3>
					<div class="col-md-12">
						<div class="form-group">
							<select class="form-control" name="selectedType" required onchange="bandom()" id="selectedType" style="width:100%;">
								<optgroup label="Rezervacijos tipas">
									<option value="">-- Pasirinkite rezervacijos tipą --</option>
									<option value="Table">Stalelio rezervacija</option>
									<option value="Food">Maisto rezervacija</option>
									<option value="Restaurant">Salės rezervacija</option>
								</optgroup>
							</select>									
						</div>
					</div>
					<br><br>
				<input type="button" name="next" id = "enableButton" class="next action-button" value="Toliau" />
			</fieldset>
			<fieldset style="height:550px;" id="fieldset2" class="fieldSetClass">
				<h2 class="fs-title">Pasirinkite norimą datą</h2>
				<h3 class="fs-subtitle">Pasirinkite norimą datą rezervacijai</h3>
				<div class="col-md-12" style="width:100%!important">
				<div name="datepicker" id="datepicker" value="Date" required class="form-control" align="center" style="height:300px"></div>
					<input type="text" id="datepicker2" style="display:none;" value="" name="datepicker2"/>
				<div class="col-md-12"><label for="datepicker2" class="error" id="datepickererror" style="display:none;"></label></div>
				</div>
				<div id="timePickerDiv" style="display:none;">
					<input id="timepicker" name="timepicker" type="text" onchange="document.getElementById('reviewtime').innerHTML = this.value" class="time" style="width:100%;" />		
				</div>
				<input type="button" name="previous" class="previous action-button" value="Atgal" />
				<input type="button" id="datepickerNext" name="next" class="next action-button" value="Toliau"  />
			</fieldset>
			<fieldset id="fieldset3" class="fieldSetClass">
				<h2 class="fs-title">Asmeninė informacija</h2>
				<h3 class="fs-subtitle">Įveskite informaciją, kuri yra būtina rezervacijos įvykdymui</h3>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">                       
								<input type="text" pattern="[A-Ža-ž]{2,16}" required onchange="document.getElementById('reviewName').innerHTML = this.value" name="name" id="name" class="form-control" placeholder="Vardas">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">                       
								<input type="text" pattern="[A-Ža-ž]{2,16}" required onchange="document.getElementById('reviewLName').innerHTML = this.value" name="lastName" id="lastName" class="form-control" placeholder="Pavardė">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">                        
						<input type="email" name="email" id="email" class="form-control" required onchange="document.getElementById('reviewEmail').innerHTML = this.value" placeholder="El. pašto adresas">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">                        
						<input type="number" name="phone"  id="phone" class="form-control" required onchange="document.getElementById('reviewPhone').innerHTML = this.value" placeholder="Telefono nr.">
					</div>
				</div><br>
				<input type="button" name="previous" class="previous action-button" value="Atgal" />
				<input type="button" name="next" id="nextPersonal" class="next action-button" value="Toliau" />
			</fieldset>
			<fieldset id="fieldset4" class="fieldSetClass">
				<h2 class="fs-title">Papildoma rezervavimo informacija</h2>
				<h3 class="fs-subtitle">Dar šiek tiek informacijos apie Jūsų rezervaciją...</h3>
				<div class="col-md-12">
					<div class="form-group">
						<select class="form-control" onchange="document.getElementById('reviewAmount').innerHTML = this.value" required name="amountOfPeople" id ="amountOfPeople">
							<option value="" checked="checked">-- Lankytojų skaičius --</option>
							<option value="1">1 Asmuo</option>
							<option value="2">2 Asmenys</option>
							<option value="3">3 Asmenys</option>
							<option value="4">4 Asmenys</option>
							<option value="5">5 Asmenys</option>
							<option value="6">6 Asmenys</option>
							<option value="7">7 Asmenys</option>
							<option value="8">8 Asmenys</option>
							<option value="9">9 Asmenys</option>
							<option value="10">10 Asmenų</option>
							<option value="11">Daugiau nei 10 Asmenų</option>
						</select>                      
					</div>
				</div>
				<div class="col-md-12" name="dishListdiv" onchange="document.getElementById('reviewDishes').innerHTML = this.value" id="dishListdiv">
					<div class="form-group">
						<?php echo $this->Form->input('selectedDish', array('label'=>'Patiekalai:', 'placeholder'=>'Pasirinkite patiekalus ', 'id'=>'selectedDish',  'type'=>'select','class' => 'form-control select2', 'multiple'=>'multiple','options'=>$dishList)); ?>      
					</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Atgal" />
				<input type="button" name="next" class="next action-button" value="Toliau" />
			</fieldset>
			<fieldset id="fieldset5">
				<h2 class="fs-title">Rezervacijos patvirtinimas</h2>
				<h3 class="fs-subtitle">Peržvelkite informaciją, ir jei užsakymas tinka Jums - patvirtinkite</h3>
				<div id="reviewDate" style="display:inline"></div> <div id="reviewtime" style="display:inline"></div></br></br>
				<div class="panel panel-default panel-table">
					<div class="panel-body">
						<table class="table table-striped table-bordered table-list">
							<thead>
								<tr>
									<th>Rezervacijos tipas</th>
									<th>Užsakovas</th>
									<th>El. paštas</th>
									<th>Telefono nr.</th>
									<th>Lankytojai</th>
							<!--		<th>Patiekalai</th>
							-->	</tr> 
							</thead>
							<tbody>
								<tr>
									<td id="reviewSelected"></td>
									<td><div id="reviewLName" style="display:inline;"></div>, <div id="reviewName" style="display:inline;"></div></td>
									<td id="reviewEmail" ></td>
									<td id="reviewPhone" ></td>
									<td id="reviewAmount" ></td>
									<!--<td id="reviewDishes" ></td>
								--></tr>
							</tbody>
						</table>
					</div>
				</div>
				<div id="changeit"></div>
				<input type="button" name="previous" class="previous action-button" value="Atgal" />
				<input type="submit" class="next action-button" value="Pateikti"  />
			</fieldset>
		<?= $this->Form->end() ?>
	</div>
	<a href="#0" class="cd-top js-cd-top cd-top--fade-out cd-top--show" style="background-image: url(&quot;/assets/home/img/cd-top-arrow.svg&quot;);background-color: rgb(20,133,238);">Top</a>
<?= $this->element('mainfoot') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
$(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2({
		placeholder: "Pasirinkite patiekalus",
		allowClear: true
	});
  });
</script>
<script>
function bandom(){
	var tipas = document.getElementById('selectedType').value;
	var reservation=" ";
	if(tipas == "Restaurant") {
		reservation="Salės rezervacija";
	} else if(tipas =="Food") {
		reservation = "Maisto rezervacija";
	} else {
		reservation = "Stalelio rezervacija";
	}
	document.getElementById('reviewSelected').innerHTML = reservation;
		var button = document.getElementById("enableButton");
	if(document.getElementById('selectedType').value != "0") {
		button.style = "background-color: rgb(20,133,238)";
		button.disabled = false;
	} else {
		button.style = "background-color: rgba(0,0,255,0.2);";
		button.disabled = true;
	}
}
 $.validator.addMethod("selectRequired", function(value, element, arg){
   return value.length >=1;
 }, "Privalote pasirinkti!");

jQuery.validator.setDefaults({
  debug: false,
  success: "valid"
});
$( "#msform" ).validate({
  rules: {
	datepicker:{
		selectRequired: "Privalote pasirinkti datą!", 
	},
	name:{
		required: true
	},
	lastName:{
		required:true
	},
	phone:{
		required:true
	},
	email:{
		required:true
	},
	selectedType:{
		selectRequired: "Privalote pasirinkti tipą!"
	},
	amountOfPeople:{
		selectRequired: "Privalote pasirinkti žmonių kiekį!"
	}
  } });
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(".next").click(function(){
	if(animating) return false;
	if(!$("#msform").valid()) return false;
	if($(this).parent().attr('id') == 'fieldset2'){
		if($('#datepicker2').val() < 2){
			document.getElementById('datepickererror').style = "display:block;";
			document.getElementById('datepickererror').innerHTML ="Privalote pasirinkti datą!";
			return false;
		}
	}
	document.getElementById('datepickererror').style = "display:none;";
	// This function deals with validation of the form fields
	animating = true;
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	var x = false;
	var curInputs = current_fs.find("input[type='text'],input[type='url']");
	$(".form-group").removeClass("has-error");
	for(var i=0; i<curInputs.length; i++){
		if (!curInputs[i].validity.valid){
			isValid = false;
			$(curInputs[i]).closest(".form-control").addClass("has-error");
		}
	}


	var x, y, i, valid = true;
	var fs = current_fs.attr('id');
	y = document.getElementById(fs).getElementsByTagName("input");
	// A loop that checks every input field in the current tab
	if(document.getElementById("fieldset1").style.display != "none"){
		x = true;
	}
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
				'transform': 'scale('+scale+')',
				'position': 'absolute'
			});
		next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	if(x){
		$("#datepicker").datepicker("setDate", new Date);
		var elements = document.getElementsByClassName('ui-state-active');
		if(elements.length > 0){
			elements[0].className  = "ui-state-default";
		}
		var select = document.getElementsByClassName('ui-timepicker-select')[0];
		if(typeof select !== 'undefined'){
			select.style = "display:none;"
		}
	}

});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
});
function disableAllTheseDays(date) {
	var disabledDays = <?php echo json_encode($reservedDates); ?>;
	var disabledDaysRestaurant = <?php echo(json_encode($reservedDatesRestaurant)); ?>;
	if($('#selectedType').val() != "Restaurant") {
		return [true];
	}
	else {
		disabledDays = disabledDaysRestaurant;
	}
	 var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
	 if($.inArray((m+1) + '-' + d + '-' + y,disabledDays) != -1) return [false, "Highlighted"];
	 return [true];
}

function getDate(dateSelected) {
	document.getElementById('reviewDate').innerHTML = this.value;
	var reservedDateTimeStrings =  <?php echo(json_encode($reservedDateTime)); ?>; 
	document.getElementById("datepicker2").value = $("#datepicker").datepicker().val();
	var reservedDateTime = reservedDateTimeStrings.map(function (value) { return moment(value, 'YYYY-MM-DD HH-mm-ss'); });
	var date = moment(dateSelected);
	var filtered = [];
	var buttonNext = document.getElementById("datepickerNext");
	buttonNext.disabled=false;buttonNext.style="background-color: rgb(20,133,238)";
	var id = $('#selectedType').val();
	var timePickerNeeded = false;
	if(id == "Restaurant"){
		timePickerNeeded = false;
		document.getElementById("timePickerDiv").style.display="none";
	}
	else if(id == "Table"){
		timePickerNeeded = true;
		document.getElementById("timePickerDiv").style.display="block";
	}
	else{
		timePickerNeeded = true;
		document.getElementById("timePickerDiv").style.display="block";
		reservedDateTime = 0;
	}
	if(timePickerNeeded == true) {
		for (var _i = 0, reservedDateTime_1 = reservedDateTime; _i < reservedDateTime_1.length; _i++) {
			var d = reservedDateTime_1[_i];
			if (d.year() === date.year() && d.month() === date.month() && d.date() === date.date()) {
				filtered.push(d);
			}
		}
		$(function() {
				$('#timepicker').timepicker({
					'timeFormat': 'H:i',
					'minTime': '11:00',
					'maxTime': '22:00',
					'step': '60',
					'useSelect': true
				});
			});

		if (filtered.length > 0) {
			var timeArray = filtered.map(function (value) { return [value.format('HH:mm'), value.add(1, 'hour').format('HH:mm')]; });
			$(function() {
				$('#timepicker').timepicker({
					'timeFormat': 'H:i',
					'minTime': '11:00',
					'maxTime': '22:00',
					'step': '60',
					'useSelect': true,
					'disableTimeRanges': timeArray
				});
			});
		}
	}
}
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
/*
$('#selectedDish').on('change', function() {
  alert( this.value );
  document.getElementById('reviewDishes').innerHTML="";
  document.getElementById('reviewDishes').innerHTML += this.value;
});
*/</script>
<script src="/assets/home/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/home/js/Bold-BS4-Animated-Back-To-Top.js"></script>

</body>
</html>