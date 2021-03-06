<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Vartotojo profilis » Kukudra</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php echo $this->Html->css('/assets/DataTables/datatables.min.css', ['block' => 'css']); ?>
	<?php echo $this->Html->script('/assets/DataTables/datatables.min', ['block' => 'script']); ?>

	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap/dist/css/bootstrap.min'); ?>
	<!-- Font Awesome -->
	<?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
	<!-- Ionicons -->
	<?php echo $this->Html->css('AdminLTE./bower_components/Ionicons/css/ionicons.min'); ?>
	<!-- Theme style -->
	<?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
	<!-- iCheck -->
	<?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>
<script type="text/javascript" src="/assets/js/tabChange.js"></script>
<style>
.select2-container--default .select2-selection--multiple .select2-selection__rendered li{
color: black;	
}
</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $this->fetch('css'); ?>

</head>
<body class="hold-transition login-page">

<div class="login-box" style="width:80%">
  <div class="login-logo">
    <a href="/"><?php echo Configure::read('Theme.logo.large') ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-home')).'&nbsp;&nbsp;Grįžti į puslapį', ['controller'=>'', 'action' => 'index'], array('escape' => false));?>
                  <a href="/user/logout" class="pull-right"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Atsijungti</a>
	<br><br>
    <p class="login-box-msg" style="font-size:20px;">Vartotojo informacijos keitimas</p>

    <?php echo $this->fetch('content'); ?>
  </div>
  <!-- /.login-box-body -->
</div>

<!-- jQuery 3 -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>

<?php echo $this->fetch('script'); ?>

<?php echo $this->fetch('scriptBottom'); ?>
<script>
$(document).ready( function () {
	$('#submittedReservations').DataTable({
		"lengthMenu": [[ 10, 20, -1 ],[10,20,'Visi']],
		columnDefs: [
			{'orderable':false, 'targets':9}
		],
		 "scrollX": true
	});
	
	$('#submittedReviews').DataTable({
		"lengthMenu": [[ 10, 20, -1 ],[10,20,'Visi']],
		columnDefs: [
			{'orderable':false, 'targets':4}
		],
		 "scrollX": true
	});
$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
});
} );
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>