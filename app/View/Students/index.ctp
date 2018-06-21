<div class="students index">
	<fieldset>
	<?php
		echo $this->Form->create();
		echo $this->Form->input('nome', array('required'=>false));
		echo $this->Form->input('room', array('label'=>'Sala','required'=>false));
		echo $this->Form->end('Buscar');
	?>
	<legend><?php echo __('Partes'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th>Foto</th>
			<th><?php echo $this->Paginator->sort('room_id','Sala'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('nascimento'); ?></th>
			<th><?php echo $this->Paginator->sort('rg','RG'); ?></th>
			<th><?php echo $this->Paginator->sort('inclusao','Inclusão'); ?></th>
			<th><?php echo $this->Paginator->sort('endereco','Endereço'); ?></th>
			<th><?php echo $this->Paginator->sort('contato'); ?></th>
			<th class="actions"><?php echo __('Controles'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($students as $student): ?>
	<tr>
		<td>
			
			<?php 
			if(!empty($student['Student']['foto_dir'])) {
			echo $this->Html->image('../files/student/foto/' . $student['Student']['foto_dir'] . '/' . 'thumb_' .$student['Student']['foto'], array('url' => array('controller' => 'students', 'action' => 'view', $student['Student']['id']))); 
				} elseif (empty($student['Student']['foto_dir'])) {
				echo $this->Html->image('../img/sem_foto.png', array('url' => array('controller' => 'students', 'action' => 'view', $student['Student']['id']))); 	
			}
			?>
		</td>
		<td>
			<?php echo $this->Html->link($student['Room']['nomesala'], array('controller' => 'rooms', 'action' => 'view', $student['Room']['id'])); ?>
		</td>
		<td><?php echo h($student['Student']['nome']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$student['Student']['nascimento'])); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['rg']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$student['Student']['inclusao'])); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['contato']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $student['Student']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $student['Student']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
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
<div class="actions">
	<fieldset>
	<legend><?php echo __('Controles'); ?></legend>
	<ul>
			
		<li><?php echo $this->Html->link(__('Encarregados'), array('controller' => 'courses', 'action' => 'index')); ?> </li>		
		
		<!--li>< ?php echo $this->Html->link(__('Notas'), array('controller' => 'studentsSubjects', 'action' => 'colocacao')); ?> </li-->
	</ul>
	</fieldset>
</div>
