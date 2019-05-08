<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vartotojo registracija » Kukudra</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script type="text/javascript" src="/assets/js/fieldCheck.js"></script>

  <?php echo $this->fetch('css'); ?>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><?php echo Configure::read('Theme.logo.large') ?></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Naujos paskyros sukūrimas</p>

    <?php echo $this->fetch('content'); ?>
    <?php echo $this->Flash->render(); ?>

    <a href="<?php echo $this->Url->build('/user/login'); ?>" class="text-center"><i class="fa fa-sign-out"></i>  Aš jau turiu vartotoją</a>
			<small><i><br><br> * - laukelius užpildyti būtina</i>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>

<?php echo $this->fetch('script'); ?>

<?php echo $this->fetch('scriptBottom'); ?>
<!--
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
-->
</body>
</html>