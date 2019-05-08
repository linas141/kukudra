<head>
	<script>
		$( function() {
			$( "#datepicker" ).datepicker({
				onSelect: function(date) {
					$("#datepicker2").val(date);
				},
				minDate: 0,
				maxDate: 31,
				dateFormat: 'yy-mm-dd',
				inline: true,
				numberOfMonths: [1, 2],
				monthNames: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
				monthNamesShort: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
				dayNamesMin: ['Pir', 'Ant', 'Tre', 'Ket', 'Pen', 'Šeš','Sek'],
			});
			} );
	</script>
<link rel="stylesheet" href="/assets/css/timePicker.css">
	<script src="/assets/js/jquery-timepicker.js"></script>

	<script>
			$( function() {
				$("#timePicker").hunterTimePicker({
				//  callback: function(e){
				//	alert(e.val());
				//  }
    hoursDisabled: '0,1,2,3,4,5,6,7,18,19,20,21,22,23'
				});
			});
	</script>
</head>
<div class="form-group">
	<div name="datepicker" id="datepicker" value="Date" class="col-md-12" align="center" style="height:300px"></div>
	<input type="hidden" id="datepicker2" name="datepicker"/>
</div>
<div class="col-md-12">
	<div class="form-group">
		<input type="text" name="timePicker" id="timePicker" class="form-control" placeholder="Laikas" align="center" readonly>	
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">                       
		<input type="text" name="name" id="name" class="form-control" placeholder="Vardas">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">                       
		<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Pavardė">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">                        
		<input type="email" name="email" id="email" class="form-control" placeholder="El. pašto adresas">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">                        
		<input type="text" name="phone"  id="phone" class="form-control" placeholder="Telefono nr.">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<select class="form-control" name="amountOfPeople" id ="amountOfPeople">
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
<div class="col-md-12" name="dishListdiv" id="dishListdiv">
	<div class="form-group">
		<select class="form-control" name="dishList" id ="dishList">
			<option value="" checked="checked">-- Patiekalai --</option>
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
<div class="col-md-12">
	<div class="form-group">
		<textarea class="form-control" cols="30" name="message" rows="10" placeholder="Žinutė"></textarea>
	</div>
</div>