function userInformationToggled(){
	if ($('#reservationInformation').is(':visible')){
		$("#reservationInformation").slideUp("slow");
	}
	if ($('#daysOffInformation').is(':visible')){
		$("#daysOffInformation").slideUp("slow");
	}
	if ($('#userInformation').is(':visible')){
		$("#userInformation").slideUp("slow");
	} else {
		$("#userInformation").slideDown("slow");
	}
}
function reservationInformationToggled(){
	if ($('#userInformation').is(':visible')){
		$("#userInformation").slideUp("slow");
	}
	if ($('#daysOffInformation').is(':visible')){
		$("#daysOffInformation").slideUp("slow");
	}
	if ($('#reservationInformation').is(':visible')){
		$("#reservationInformation").slideUp("slow");
	} else {
		$("#reservationInformation").slideDown("slow");
	}
}
function daysOffInformationToggled(){
	if ($('#userInformation').is(':visible')){
		$("#userInformation").slideUp("slow");
	}
	if ($('#reservationInformation').is(':visible')){
		$("#reservationInformation").slideUp("slow");
	}
	if ($('#daysOffInformation').is(':visible')){
		$("#daysOffInformation").slideUp("slow");
	} else {
		$("#daysOffInformation").slideDown("slow");
	}
}