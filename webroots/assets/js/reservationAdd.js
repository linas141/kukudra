function isEmpty(){
  if(document.forms['reservationForm'].selectedType.value === "" ||
  document.forms['reservationForm'].name.value === "" ||
  document.forms['reservationForm'].email.value === "" ||
  document.forms['reservationForm'].phone.value === "" ||
  document.forms['reservationForm'].amountOfPeople.value === "" ||
  document.forms['reservationForm'].datepicker.value === "" ||
  document.forms['reservationForm'].hours.value === "" ||
  document.forms['reservationForm'].mins.value === "")
  {
	alert("Užpildykite visus laukelius!");
	return false;
  }
	return true;
}

function reservation_type($value) {  
	var x = document.getElementById("selectedType").value;
	if(x == "Food"){
		$('#dishListdiv').show();
	}
	else if(x == "Table")
	{
		$('#dishListdiv').hide();
	}
	else{
		$('#dishListdiv').show();
	}
}						 
