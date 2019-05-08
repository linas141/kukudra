function lostFocus(value, check,  label, minLength, submitID){
	if(value.length >= minLength && value.trim()){
		submitID.disabled = false;
		label.style = "display:'block';color:LimeGreen; font-weight:normal !important;";
		label.innerHTML ='  Laukelis užpildytas tinkamai';
		check.className="fa fa-check";
		check.style = "display:'block';color:LimeGreen; font-weight:normal !important;";
	} else {
		submitID.disabled = "true";
		label.style = "display:'block';color:red; font-weight:normal !important;";
		label.innerHTML = '  Į laukelį turite įvesti bent ' + minLength + ' simbolius';
		check.className="fa fa-times-circle-o";
		check.style = "display:'block';color:red; font-weight:normal !important;";
	}
}
function checkCheckbox(checkboxBox, checkClass, textToShow, fontColor) {
	var x = document.getElementById(checkboxBox);
	var checkboxClass = document.getElementById(checkClass);
	var textToMakeVisible = document.getElementById(textToShow);
	var fontcolorChange = document.getElementById(fontColor);

	if(x.checked == true) {	
		return true;
	}
	checkboxClass.style="color:red;";
	textToMakeVisible.style="display:'block'; color:red;";
	fontcolorChange.color = "ff0000;"
	fontcolorChange.style="font-weight: bold;"
	return false;
}