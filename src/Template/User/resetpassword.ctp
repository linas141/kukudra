<?php $this->layout = 'AdminLTE.password'; ?>
<h4 align="center">Įveskite naują slaptažodį</h4><br>
<?= $this->Form->create()?>
<?= $this->Form->input('password', array('label'=>'Slaptažodis'))?>
<?= $this->Form->Button('Keisti slaptažodį', array('class'=>'btn btn-primary btn-block btn-flat'))?>
<?= $this->Form->end();?>