$("[data-toggle=tooltip]").tooltip();
var today = new Date();

$("#datepicker").datepicker({
    minDate: today // set the minDate to the today's date
    // you can add other options here
});