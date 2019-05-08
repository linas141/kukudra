<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<head>
    <title>Atsiliepimo redagavimo langas » Kukudra</title>
</head>
<div class="review form large-9 medium-8 columns content">
    <?= $this->Form->create($review) ?>
    <fieldset>
        <legend><?= __($review->id_Review .' atsiliepimo redagavimas') ?></legend>
				<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-list')).'   Grįžtį į sąrašą', ['action' => 'index'], array('escape' => false));
		?><br><br>
        <?php
            echo $this->Form->control('fk_Userid_User', ['options' => $userselect ,'label'=>'Atsiliepęs naudotojas']);
            echo $this->Form->control('Review', array('label'=>'Atsiliepimo turinys'));
            echo $this->Form->control('datePublished', ['label'=>'Paskelbimo data', 'class'=>'form-control datepicker', 'type'=>'text', 'style'=>'display:block']);
            echo $this->Form->control('rating', array('label'=>'Įvertinimas(nuo 1 iki 5)', 'options'=>['1'=>'1', '2'=>'2','3'=>'3', '4'=>'4','5'=>'5']));
            echo $this->Form->control('selectedType', array('label'=>'Atsiliepimas apie','id'=>'selectedType', 'options'=>['food'=>'Maistą', 'enviroment'=>'Aplinką','employee'=>'Darbuotoją'], 'value'=>$reviewType));
			?>	<div id="employeeDiv"<?php if($reviewType!='employee') {echo "style='display:none;'"; $employeenr = 0;}?>><?php
			echo $this->Form->control('employeeID', array('label'=>'Darbuotojas','id'=>'reviewType', 'options'=>$employees, 'value'=>$employeenr));
			?></div>
    </fieldset>
	<div>
    <?= $this->Form->button(__('Išsaugoti')) ?>
    <?= $this->Form->end() ?>
			<?= $this->Form->postLink($this->Form->button('Naikinti atsiliepimą'), ['action' => 'delete', $review->id_Review], array('escape'=>false, 'confirm' => __('Ar tikrai norite naikinti # {0}?',
			$review->id_Review)));	?>
	</div>
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