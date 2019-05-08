<?php $this->layout = 'AdminLTE.profile';
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>	
<style>
.control-label{
	font-weight:normal;
	font-size:14px;
}
.btn-primary.btn-block.btn-flat:hover{
	background-color:#bc0000!important;
	border-color:#bc0000 !important;
}
@media only screen and (max-width: 700px) {
	.nav .nav-tabs{
		font-align:center;
	}
	
}

</style>
<div class="row">	

	<div class="col-md-5">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active" id="userInfoTab"><a href="#tab_1" data-toggle="tab" onclick="tabChange('t1', 'tab_1', 'userInfoTab')">Naudotojo informacija</a></li>
				<li id="second"><a href="#tab_3" data-toggle="tab" onclick="tabChange('t3', 'tab_3', 'second')">Atsiliepimų valdymas</a></li>
				<li class="dropdown" >
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dropdownOrder">
						Užsakymų valdymas <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li role="presentation"><a role="menuitem" data-toggle="tab" tabindex="-1" href="#tab_2" onclick="tabChange('t2', 'tab_2', 'dropdownOrder')">Mano užsakymai</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="/reservation/addreservation">Pateikti užsakymą</a></li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1"><br>
					<b>Naudotojo informacijos keitimas:</b>
					<br>
					<p>Šiame skirtuke galite matyti savo paskyros informaciją bei ją redaguoti.
					Norėdami pakeisti duomenis, dešinėje esančiuose laukeliuose pakeiskite tekstą, ir spauskite
					„Pakeisti duomenis“, pavyzdžiui: į laukelį „Vardas“ įrašome „Linas“, ir spaudžiame apačioje
					esantį žalią mygtuką "Pakeisti duomenis". Ekrane matysime pranešimą žaliame fone, kad 
					informacijos pakeitimas įvyko sėkmingai!</p>
					<br>
					Naudotojo profilyje taipogi galite:<br>
					<b>Valdyti atsiliepimus</b> pasirinkę skirtuką „Atsiliepimų valdymas“.<br>
					<b>Valdyti užsakymus</b> pasirinkę skirtuką „Užsakymų valdymas“ ir poskyrį „Mano užsakymai“.<br>
					<b>Pateikti užsakymą</b> pasirinkę skirtuką „Užsakymų valdymas“ ir poskyrį „Pateikti užsakymą“.<br>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="tab_2"><br>
					<b>Mano pateikti užsakymai</b>
					<br>
					<p>Šiame skirtuke pateikiame Jūsų pateiktus užsakymus, bei galimybę juos valdyti.</p>
					Rūšiuoti užsakymus galite paspaudę ant stulpelio pavadinimo. Rūšiavimas didėjimo tvarka stulpelyje „Nr“(užsakymo numerio) atrodo taip: <img src="/assets/img/sort.png"></img>
					<br>Lentelės dešinėje pateikiama galimybė valdyti Jūsų pateiktus užsakymus(redaguoti arba ištrinti pasirinktą užsakymą)<br><br>
					Stulpelių informacija:
					<br><b>Nr </b> - užsakymo numeris.<br>
					<b>Pateikta </b> - data, kada pateikėte užsakymą.<br>
					<b>Būsena </b> - užsakymo būsena. Būsena gali būti:<br>
					<ul>
						<li><b>Atšaukta</b> - užsakymas atšauktas "Kukudros" darbuotojų dėl jame esančios netinkamos informacijos.</li>
						<li><b>Pateikta</b> - užsakymas pateiktas, bet neperžvelgtas darbuotojų. Tai reiškia, jog užsakymas kol kas nebus vykdomas.</li>
						<li><b>Patvirtinta</b> - užsakymas patvirtintas. Laukiame Jūsų "Kukudroje" pasirinktu metu užsakyme!</li>
						<li><b>Redaguota</b> - užsakymo informaciją redagavote, ir laukiate darbuotojų patvirtinimo.</li>
					</ul>
					<b>Tipas </b> - užsakymo tipas. Būna <b>stalelio</b>, <b>maisto</b> ir <b>salės ar kavinės</b> tipai.<br>
					<b>Vardas </b> - vardas, kurį įrašėte, pateikdami užsakymą.<br>
					<b>Pavardė </b> - pavardė, kurią įrašėte, pateikdami užsakymą.<br>
					<b>Telefono nr. </b> - telefono numeris, kurį įrašėte pateikdami užsakymą.<br>
					<b>Žmonių kiekis </b> - užsakymo metu Jūsų pateiktas žmonių kiekis, dalyvaujantis pateiktame užsakyme.<br>
					<b>Data </b> - Jūsų norima užsakymo vykdymo data.<br>			
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="tab_3"><br>
					Šiame skirtuke Jūs galite valdyti pateiktus atsiliepimus. Stulpelių informacija:<br>
					<ul>
						<li><b>Įvertinimas</b> - Jūsų pateikto atsiliepimo įvertinimas. Atsiliepimas gali būti nuo 1 iki 5.</li>
						<li><b>Atsiliepimo turinys</b> - Jūsų pateikto atsiliepimo turinys.</li>
						<li><b>Pateikimo data</b> - data, kurią pateikėte atsiliepimą.</li>
						<li><b>Veiksmai</b> - galimi atlikti atsiliepimui veiksmai. 
							<ul>
								<li><b>Redaguoti</b> - atsiliepimo informacijos keitimas.</li>
								<li><b>Naikinti</b> - atsiliepimo pašalinimas.</li>
							</ul>
						</li>
					</ul>
					Jeigu neturite pateiktų atsiliepimų, Jums bus vaizduojamas tekstas „<b>Neturite pateiktų atsiliepimų</b>“.
				</div>
			<!-- /.tab-pane -->
			</div>
		<!-- /.tab-content -->
		</div>
		<?php echo $this->Flash->render(); ?>
	  <!-- nav-tabs-custom -->
	</div>
	<!-- /.col -->
	<div class="col-md-7"><br><br>
		<div class="tab-content">
			<!-- User profile tab -->
			<div class="tab-pane active" id="t1">
				<?= $this->Form->create($user) ?>
				<fieldset>
						<label for="username" style="font-weight:normal">El. pašto adresas</label>
							<input type="text" value= "<?= $user['username'];?>" id="vartotojo_vardas" disabled="disabled" class="form-control">
						<br>
						<table>
							<tr>
							<td style="width:50%"><?php echo $this->Form->control('password', array('id'=>'password', 
							'label'=>'Naujas slaptažodis', 'placeholder'=>'Įveskite naują slaptažodį', 'value'=>'', 'type'=>'password', 'required'=>'false', 'autocomplete'=>'off')); ?> </td>
							<td>&nbsp;</td>
							<td style="width:50%"><?php echo $this->Form->control('repeatpassword', array('id'=>'repeatpassword',
							'label'=>'Pakartokite slaptažodį', 'value'=>'','type'=>'password', 'placeholder'=>'Pakartokite naują slaptažodį', 'required'=>'false', 'style'=>'top:20px;')); ?></td>
							</tr>
						</table>

						<label for="myCheck" style="font-weight:normal" onclick="showPass('password', 'repeatpassword')">
							<input type="checkbox" id="myCheck" onchange="showPass('password', 'repeatpassword')"> Rodyti slaptažodį
						</label>
						<table>
							<tr>
							<td style="width:50%"><?php echo $this->Form->control('First_name', array('label'=>'Vardas', 'placeholder'=>'Įveskite savo vardą', 'oninput'=>"this.setCustomValidity('')"));?> </td>
							<td>&nbsp;</td>
							<td style="width:50%"><?php echo $this->Form->control('Last_name', array('label'=>'Pavardė', 'placeholder'=>'Įveskite savo pavardę'));?> </td>
							</tr>
						</table>
						<?php echo $this->Form->control('Phone_nr', array('label'=>'Telefono Nr.', 'placeholder'=>'Įveskite savo telefono numerį'));
				?>
				</fieldset>	<br>

				<div class="col-xs-4">
					<?= $this->Form->button(__('Išsaugoti'), array('id'=>'submit')) ?>    
				</div>
				<?= $this->Form->end();?>
				<div class="col-xs-4" style="float: right; width:auto;">
					  <button onclick="location.href='/'" class="btn btn-primary btn-block btn-flat" style="background-color:red; border-color:red;" >Grįžti į puslapį</button>
				</div><br>
			</div>
			<!-- End of user profile tab -->
			<!-- Reservation management tab -->
			<div class="tab-pane" id="t2">
			<?php if(sizeof($userReservation) > 0): ?>
				<table id="submittedReservations" class="table table-bordered table-hover" style="background-color:white; width:100%;">
					<thead>
						<tr>
							<th scope="col">Pateikta</th>
							<th scope="col">Būsena</th>
							<th scope="col">Tipas</th>
							<th scope="col">Vardas</th>
							<th scope="col">Pavardė</th>
							<th scope="col">Telefono nr.</th>
							<th scope="col">Žmonių kiekis</th>
							<th scope="col">Patiekalai</th>
							<th scope="col">Data</th>
							<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>
						</tr>
					</thead>
					<?php foreach ($userReservation as $reservation): ?>
						<tr>
							<td style="width:10%"><?= h($reservation->Date) ?></td>
							<?php if($reservation->State == 'Pateikta') : ?>
								<td style="color: rgba(0, 191, 255, 1);"><?= h($reservation->State) ?></td>
							<?php elseif($reservation->State == 'Patvirtinta'): ?>
								<td style="color: rgba(0, 200, 30, 1);"><?= h($reservation->State) ?></td>
							<?php elseif($reservation->State == 'Atšaukta'):?>
								<td style="color: rgba(250, 0, 0, 1);"><?= h($reservation->State) ?></td>
							<?php else :
								?><td><?= h($reservation->State) ?></td>
							<?php endif; ?>
							<td style="width:10%"><?php $tipas=$reservation->Type; if($tipas ==='Table') echo 'Stalelio'; else if($tipas ==='Food') echo 'Maisto'; else if($tipas ==='Restaurant') echo 'Salės'; else echo 'Nėra tipo!' ?></td>
							<td style="width:10%"><?= h($reservation->name) ?></td>
							<td style="width:10%"><?= h($reservation->lastName) ?></td>
							<td style="width:10%"><?= $this->Number->format($reservation->phone) ?></td>
							<td><?= $this->Number->format($reservation->amountOfPeople) ?></td>
							<td><?php if($reservation->has("reserved_dish") && count($reservation->reserved_dish)>0){ 
								for($i=0; $i< count($reservation->reserved_dish); $i++) {
									echo $reservation->reserved_dish[$i]->dish->Name . '<br>';
								}
							}else echo '' ?></td>
							<td><?= h($reservation->dateTime) ?></td>
							<td class="actions">
								<?php if($reservation->State =='Pateikta') echo $this->Html->link(__('Redaguoti'), ['controller' => 'Reservation', 'action' => 'keisti', $reservation->Number]);  ?>
								<?= $this->Form->postLink(__('Šalinti'), ['controller' => 'Reservation', 'action' => 'userDeletes', $reservation->Number], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $reservation->Number)]) ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php else :?>
				Neturite pateiktų rezervacijų!
				<?php endif;?>
			</div>
			<!-- End of reservation management tab -->
			<!-- Review management tab -->
			<div class="tab-pane" id="t3">
			<?php if(sizeof($userReviews) > 0): ?>
				<table id="submittedReviews" class="table table-bordered table-hover" style="background-color:white; width:100%;">
					<thead>
						<tr>
							<th scope="col">Įvertinimas</th>
							<th scope="col">Atsiliepimo turinys</th>
							<th scope="col">Pateikimo data</th>
							<th scope="col">Atsiliepimas apie</th>
							<th scope="col" style="color:black;"class="Veiksmai"><?= __('Veiksmai') ?></th>
						</tr>
					</thead>
					<?php foreach ($userReviews as $review): ?>
						<tr>
							<td style="width:10%"><?= h($review->rating) ?>/5</td>
							<td><?= h($review->Review) ?></td>
							<td><?= h($review->datePublished) ?></td>
							<td><?php if(!empty($review->enviroment_review)) echo 'Aplinką'; 
								elseif (!empty($review->food_review)) echo 'Maistą'; 
								elseif(!empty($review->employee_review)) echo 'Darbuotoją \'' . substr($review->employee_review[0]->user->First_name, 0, 1) . '. ' . $review->employee_review[0]->user->Last_name . '\'';
								else echo 'Nėra tipo!';?></td>
							<td class="actions">
								<?= $this->Html->link(__('Redaguoti'), ['controller' => 'Review', 'action' => 'keisti', $review->id_Review]) ?>
								<?= $this->Form->postLink(__('Šalinti'), ['controller' => 'Review', 'action' => 'userDeletes', $review->id_Review], ['confirm' => __('Ar tikrai norite pašalinti šį atsiliepimą? (įvertinimas {0}/5)', $review->rating)]) ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php else :?>
				Neturite pateiktų atsiliepimų!
				<?php endif;?>
			</div>
			<!-- End of Review management tab -->
		</div>
	</div>
</div>		