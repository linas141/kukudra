<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user
 */
?>
<section class="content">
<div class="box">
    <h3><?= __('Sistemos naudotojai') ?></h3>
	<br><br>
	<div class="box box-success">
		<div class="box-header with-border" data-widget="collapse">
			<h3 class="box-title">Filtravimas</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="col-md-12">
				<?php 
				$roleOptions = array('all' => 'Visi', 'employee' => 'Darbuotojai', 'customer' => 'Naudotojai');
				echo  $this->Form->create('userRoles');
				echo $this -> Form -> input('Vaizduojamų vartotojų rolė', 
					array('id'=>'userRoles',
						'type' => 'radio', 
						'name'=>'userRoles' ,
						'options' =>  $roleOptions, 
						'onclick'=> 'roleRadioButton(this.value)',
						'value' => 'customer'
					)
				);
				echo $this->Form->end();
				?>
				<script type="text/javascript">
					function roleRadioButton(val) {
						if(val == 'all'){
							window.location.href = "/User";
						}
						else if(val == 'employee'){
							window.location.href = "/User/employee";
						}
						else{
							window.location.href = "/User/customer";
						}
					}	
				</script>
			</div>
		</div>
	</div>					
	<?php echo $this->Html->link('&nbsp;&nbsp;'.$this->Html->tag('i', '', array('class' => 'fa fa-plus')).'   Pridėti naują naudotoją', ['action' => 'add'], array('escape' => false));
?> <br><br>

    <table  id="example2" class="table table-bordered table-hover">
        <thead>			
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Vartotojo_vardas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Slaptažodis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Vardas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pavardė') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Telefono_nr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Rolė') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Paskutinis IP adresas') ?></th>
                <th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= "*****"//h($user->password) ?></td>
                <td><?= h($user->First_name) ?></td>
                <td><?= h($user->Last_name) ?></td>
                <td><?= $this->Number->format($user->Phone_nr) ?></td>
                <td><?= $this->Number->format($user->id_User) ?></td>
                <td><?= h($user->role) ?></td>
				<td><?= h($user->Last_IP) ?></td>
                <td class="Veiksmai">
                    <?= $this->Html->link(__('Peržiūrėti'), ['action' => 'view', $user->id_User]) ?>
                    <?= $this->Html->link(__('Redaguoti'), ['action' => 'edit', $user->id_User]) ?>
                    <?= $this->Form->postLink(__('Trinti'), ['action' => 'delete', $user->id_User], ['confirm' => __('Ar tikrai norite pašalinti # {0}?', $user->id_User)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
			<tfoot>
                <tr>
                <th scope="col"><?= $this->Paginator->sort('Vartotojo_vardas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Slaptažodis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Vardas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pavardė') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Telefono_nr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Rolė') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Paskutinis IP adresas') ?></th>
				<th scope="col" class="Veiksmai"><?= __('Veiksmai') ?></th>
                </tr>
                </tfoot>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('pirmas')) ?>
            <?= $this->Paginator->prev('< ' . __('praeitas')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('sekantis') . ' >') ?>
            <?= $this->Paginator->last(__('paskutinis') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Puslapis {{page}} iš {{pages}}, vaizduojama {{current}} elementų iš {{count}}')]) ?></p>
    </div>
</div>
</section>