function tabChange(tabNr, tabNr2, currentID) {
	var i, tabPane;
	tabPane = document.getElementsByClassName("tab-pane");	
	activeClasses = document.getElementsByClassName("active");	
	for (i = 0; i < tabPane.length; i++) {
		tabPane[i].style.display = "none";
	}	
	for (i = 0; i < activeClasses.length; i++) {
		activeClasses[i].classList.remove("active");
	}	
	document.getElementById(currentID).className = "active";
	document.getElementById(tabNr).style.display = "block";
	document.getElementById(tabNr2).style.display = "block";
}
function showPass(password, repeatpassword) {
	var x = document.getElementById("password");
	var y = document.getElementById("repeatpassword");
	if (x.type === "password") {
		x.type = "text";
		y.type = "text";
	} else {
	x.type = "password";
	y.type = "password";
	}
}