<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<head>
    <title>Atsiliepimo pridėjimo langas » Kukudra</title>
</head>
<div class="review form large-9 medium-8 columns content">
    <?= $this->Form->create($review) ?>
    <fieldset>
        <legend><?= __('Atsiliepimo pridėjimas') ?></legend>
				<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
			?><br><br>
        <?php
            echo $this->Form->control('fk_Userid_User', array('options' => $userselect,'label'=>'Atsiliepęs naudotojas'));
            echo $this->Form->control('Review', array('label'=>'Atsiliepimo turinys'));
            echo $this->Form->control('datePublished', array('empty' => true,'label'=>'Paskelbimo data', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block',  'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Šis laukelis yra būtinas!')", 'onfocus'=>"this.setCustomValidity('')"));
            echo $this->Form->control('rating', array('label'=>'Įvertinimas', 'options'=>['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5']));
            echo $this->Form->control('selectedType', array('label'=>'Atsiliepimas apie','id'=>'selectedType', 'options'=>['food'=>'Maistą', 'enviroment'=>'Aplinką','employee'=>'Darbuotoją']));
			?>	<div id="employeeDiv" style='display:none;'><?php
			echo $this->Form->control('employeeID', array('label'=>'Darbuotojas','id'=>'reviewType','options'=>$employees));
			?></div>
    </fieldset>
    <?= $this->Form->button(__('Pridėti')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
document.getElementById("selectedType").onchange = function() {
	var e = document.getElementById("selectedType");
	switch(e.options[e.selectedIndex].value){
		case 'employee':
			document.getElementById('employeeDiv').style="display:block;"
			break;
		default:
			document.getElementById('employeeDiv').style="display:none;"
			break;
	}
};
</script>