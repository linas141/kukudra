$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
	var msg="";
	if(ratingValue >2){
		msg = "Jūsų pasirinktas įvertinimas: " + ratingValue + ". Ačiū už gerą įvertinimą!";
	}
	else
		msg = "Jūsų pasirinktas įvertinimas: " + ratingValue + ". Atsiprašome, jei \"Kukudroje\" turėjote nemalonią patirtį!";
    responseMessage(msg);
	document.getElementById("rate").setAttribute("value", ratingValue);
  });
});
function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

$('#selectedReview').change(function () {
	var id = $('#selectedReview').val();
	if(id  == "enviroment"){
		$("#div1").load("/reviewsAjax/enviromentreviews.php");
		document.getElementById('employeeDiv').style="display:none;";
		document.getElementById("divRate").style = "display:block";
	}
	else if(id == "employee"){
		$("#div1").load("/reviewsAjax/employeereviews.php");
		document.getElementById('employeeDiv').style="display:block;";
		document.getElementById("divRate").style = "display:block";
	}
	else if(id == "food"){
		$("#div1").load("/reviewsAjax/foodreviews.php");
		document.getElementById('employeeDiv').style="display:none;";
		document.getElementById("divRate").style = "display:block";
	}
	else{
	$("#div1").text("Pasirinkite atsiliepimo tipą..");
		document.getElementById('employeeDiv').style="display:none;";
		document.getElementById('selected').style="display:none;"
		document.getElementById("divRate").style = "display:none";
	}
});
