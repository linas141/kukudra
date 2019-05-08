<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
			
		<?php $user = $this->request->getSession()->read('Auth.User'); if($user['role']=='admin') : ?>
		<?php echo $this->element('aside/form'); ?>
        <?php echo $this->element('aside/user-panel'); ?>
        <?php echo $this->element('aside/sidebar-menu'); ?>

		<?php elseif($user['role']=='darbuotojas') : ?>
		<?php echo $this->element('aside/form'); ?>
        <?php echo $this->element('aside/user-panel'); ?>
        <?php echo $this->element('aside/sidebar-menu-employee'); ?>

		<?php else : ?>
		
		<?php echo $this->element('aside/sidebar-menu-neprisijungusio'); ?>
		<?php endif; ?>

    </section>
    <!-- /.sidebar -->
</aside>