<head>        
<meta charset="utf-8">
</head>
<div class="row">
	<input type="hidden" name="rate" id="rate" class="form-control">
	<div class="col-md-12">
		<div class="form-group">
		<label class="control-label" for="reviewText">Atsiliepimo turinys</label>
			<textarea class="form-control" name="reviewText" cols="30" rows="5" placeholder="Įveskite atsiliepimo turinį" onInvalid="this.setCustomValidity('Užpildykite laukelį!')" oninput="this.setCustomValidity('')" required></textarea>
		</div>
	</div>
	<button type="submit" class="btn btn-dark action-button" name="sendReservation">Pateikti atsiliepimą</button>
</div>