<?php $this->layout = 'password'; ?>
<br>
Norėdami atkurti slaptažodį, įveskite <b>el. pašto adresą</b>, kuriuo registravotės sistemoje.
<br><br>
<?php echo $this->Form->create(); ?>
  <div class="form-group has-feedback">
    <input type="email" class="form-control" placeholder="Elektroninio pašto adresas" name="username" id="username" required oninvalid="this.setCustomValidity('Įveskite el. pašto adresą!')" oninput="this.setCustomValidity('')">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="row" align="center">
      <button type="submit" name="submit" style="width:90%"class="btn btn-primary btn-block btn-flat">Atstatyti slaptažodį</button>
  </div>
<?php echo $this->Form->end(); ?>