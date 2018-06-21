<div class="col-md-12 painel">
	    <h2><?php echo __('Usuários'); ?></h2>
      <?php
      echo $this->Form->create('User', array(
      'inputDefaults' => array(
      'div' => 'form-group',
      'label' => false,
      'wrapInput' => false,
      'class' => 'form-control'
      ),
      'class' => 'well form-inline'
      ,
      'url'   => array('controller' => 'users','action' => 'search')));
      if (!isset($searchQuery)) {
      $searchQuery = '';
      }
      echo $this->Form->input('searchQuery', array('value' => h($searchQuery),'label'=>'Buscar pelo nome do aluno:','class'=>'form-control'));
      
  ?>&nbsp;
  <?php echo $this->Form->submit('Mostrar', array(
		'div' => 'form-group',
		'class' => 'btn btn-default'
	)); ?>
  <?php echo $this->Form->end(); ?>
 
		<?php echo $this->Html->link(__('Add Usuários'), array('action' => 'add'),array('class' => 'btn btn-default')); ?>
		<?php echo $this->Html->link(__('Grupos'), array('controller' => 'groups', 'action' => 'index'),array('class' => 'btn btn-default')); ?> 
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" style="margin-top:20px;">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('username','Usuário'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id','Grupo'); ?></th>
			<th><?php echo $this->Paginator->sort('created','Criado'); ?></th>
			<th><?php echo $this->Paginator->sort('modified','Modificado'); ?></th>
			<th class="actions"><?php echo __('&nbsp;'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td><?php echo h($this->Time->format('d/m/Y h:i',$user['User']['created'])); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y h:i',$user['User']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id']),array('class' => 'btn btn-default')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id']),array('class' => 'btn btn-default')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
  </div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</fieldset>


		
  
 </div> 
