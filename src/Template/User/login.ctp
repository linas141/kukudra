<?php $this->layout = 'AdminLTE.login'; ?>

<?php echo $this->Form->create(); ?>
  <div class="form-group has-feedback">
    <input type="email" class="form-control" placeholder="Elektroninio pašto adresas" name="username"
	value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" required oninvalid="this.setCustomValidity('Įveskite el. pašto adresą!')" oninput="this.setCustomValidity('')">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Slaptažodis" name="password" required oninvalid="this.setCustomValidity('Įveskite slaptažodį!')" oninput="this.setCustomValidity('')">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-8">
   <!--   <div class="checkbox icheck">
        <label>
		      <?php// echo $this->Form->checkbox('remember_me'); ?> Prisiminti
        </label>
      </div>
   --> </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Prisijungti</button>
    </div>
    <!-- /.col -->
  </div>
<?php echo $this->Form->end(); ?>