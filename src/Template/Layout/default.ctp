<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8 "><meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php echo $this->Html->css('/assets/DataTables/datatables.min.css', ['block' => 'css']); ?>
	<?php echo $this->Html->script('/assets/DataTables/datatables.min', ['block' => 'script']); ?>	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	

	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap/dist/css/bootstrap.min'); ?>
	<!-- Font Awesome -->
	<?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
	<!-- Ionicons -->
	<?php echo $this->Html->css('AdminLTE./bower_components/Ionicons/css/ionicons.min'); ?>
	<!-- Theme style -->
	<?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<?php echo $this->Html->css('AdminLTE.skins/skin-'. Configure::read('Theme.skin') .'.min'); ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<?php echo $this->fetch('css'); ?>
	<style>
	.box-header.with-border:hover{
		cursor:pointer;
	}
	.fc-header.fc-widget-header{
		background-color:#3c8dbc!important;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice{
		background-color: #3c8dbc !important;
		border-color: #3c8dbc !important;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__rendered li{
		color:white;
	}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
	color: white;
}
	</style>
</head>
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo Configure::read('Theme.logo.mini'); ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo Configure::read('Theme.logo.large'); ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php echo $this->element('nav-top'); ?>
  </header>

  <?php echo $this->element('aside-main-sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php echo $this->Flash->render(); ?>
    <?php echo $this->Flash->render('auth'); ?>
    <?php echo $this->fetch('content'); ?>

  </div>
  <!-- /.content-wrapper -->

  <?php echo $this->element('footer'); ?>

  <!-- Control Sidebar -->
  <?php echo $this->element('aside-control-sidebar'); ?>
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->


<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE.adminlte.min'); ?>
<!-- Slimscroll -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-slimscroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./bower_components/fastclick/lib/fastclick'); ?>
<?php echo $this->fetch('script'); ?>

<?php echo $this->fetch('scriptBottom'); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
<script type="text/javascript">
	$('.datepicker').datepicker({
		monthNames: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
		monthNamesShort: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
		dayNamesMin: ['Pir', 'Ant', 'Tre', 'Ket', 'Pen', 'Šeš','Sek'],
		dateFormat: 'yy-mm-dd',
		minDate: 0
	});
    $(document).ready(function(){
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");
        
        var a = $('a[href="<?php echo $this->Url->build() ?>"]');
        if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }
        
    });
</script>

</body>
</html>
