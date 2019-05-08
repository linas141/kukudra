<style>
/* The container */
.container {
  font-weight:normal;
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}</style><?php $this->layout = 'AdminLTE.register'; ?>
<?php echo $this->Form->create(); ?>
	<!-- Empty field check && dishListdiv visibility management -->
	<script type="text/javascript" src="/assets/js/fieldCheck.js"></script>
	
	<div class="form-group has-feedback">
		<input type="email" class="form-control" name="username" id="username" 
		value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" placeholder="Elektroninio pašto adresas *" required oninvalid="this.setCustomValidity('Įveskite el. pašto adresą!')" oninput="this.setCustomValidity('')">
		<span class="glyphicon glyphicon-user form-control-feedback"></span>
		<i class="fa fa-check" id="usernameCheck"style="display:none;"></i> 
		<label id ="inputUsername" for="inputUsername" style="display:none;"> Laukelis užpildytas tinkamai</label>
	</div>
	<!--  <div class="form-group has-feedback">
		<input type="email" class="form-control" placeholder="El. pašto adresas">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	</div>
	-->  <div class="form-group has-feedback">
		<input type="password" class="form-control"  name="password" placeholder="Slaptažodis *" required oninvalid="this.setCustomValidity('Įveskite slaptažodį!')" oninput="this.setCustomValidity('')">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<i class="fa fa-check" id="passwordCheck"style="display:none;"></i> 
		<label class="control-label" id ="inputPassword" for="inputPassword" style="display:none;"> Laukelis užpildytas tinkamai</label>
	</div>
	<div class="form-group has-feedback">
		<input type="text" class="form-control" name="First_name"  placeholder="Vardas"
		value="<?php echo isset($_POST["First_name"]) ? $_POST["First_name"] : ''; ?>">
		<span class="glyphicon glyphicon-user form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
		<input type="text" class="form-control" name="Last_name" placeholder="Pavardė"
		value="<?php echo isset($_POST["Last_name"]) ? $_POST["Last_name"] : ''; ?>">
		<span class="glyphicon glyphicon-user form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
		<input type="phone" class="form-control" name="Phone_nr" placeholder="Telefono nr."
		value="<?php echo isset($_POST["Phone_nr"]) ? $_POST["Phone_nr"] : ''; ?>">
		<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
	</div>
	<div class="row">
		<div class="col-xs-8">
			<label>
				<label class="container">Sutinku su <a href="#">taisyklėmis *</a>
					<input type="checkbox" required oninvalid="this.setCustomValidity('Privalote sutikti su taisyklėmis')" oninput="this.setCustomValidity('')"/>
					<span class="checkmark"></span>
					</label>
			</label>
		</div>
		<!-- /.col -->
		<div class="col-xs-4">
			<button type="submit" id="submit" value='submit request' onsubmit="return funct()" class="btn btn-primary btn-block btn-flat">Registruoti</button>
		</div>
		<!-- /.col -->
	</div>
<?php echo $this->Form->end(); ?>
<script>
function funct(){
	if(document.getElementsByClassName('checked').length > 0){
		alert('s');	
		return false;
	}
	else
		return false;
}</script>