<?php use Cake\Core\Configure; ?>
<nav class="navbar navbar-static-top">

  <?php if (isset($layout) && $layout == 'top'): ?>
  <div class="container">

    <div class="navbar-header">
      <a href="<?php echo $this->Url->build('/'); ?>" class="navbar-brand"><?php echo Configure::read('Theme.logo.large') ?></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>

  <?php endif; ?>
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
</a>

<?php if($this->request->getSession()->read('Auth.User')) : ?>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="hidden-xs"><?php echo($this->request->getsession()->read('Auth.User.username')); ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="/user/profile" class="btn btn-default btn-flat">Redaguoti profilį</a>
            </div>
            <div class="pull-right">
              <a href="/user/logout" class="btn btn-default btn-flat">Atsijungti</a>
            </div>
          </li>
        </ul>
      </li>
	  	<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>

    </ul>
  </div>
<?php else : ?>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="hidden-xs">Vartotojas</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="/user/login" class="btn btn-default btn-flat">Prisijungti</a>
            </div>
            <div class="pull-right">
			  <a href="/user/register" class="btn btn-default btn-flat">Registruotis</a>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </div>

<?php endif; ?>

  <?php if (isset($layout) && $layout == 'top'): ?>
  </div>
  <?php endif; ?>
</nav>