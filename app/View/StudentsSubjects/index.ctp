<div class="studentsSubjects index">
	<fieldset>
	<?php
		echo $this->Form->create();
		echo $this->Form->input('subject', array('label'=>'Disciplina','required'=>false));
		echo $this->Form->input('student', array('label'=>'Aluno','required'=>false));
		echo $this->Form->end('Procurar');
	?>
	<legend><?php echo __('Notas'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		
			<th><?php echo $this->Paginator->sort('subject_id','Disciplina'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id','Aluno'); ?></th>
			<th><?php echo $this->Paginator->sort('nota','NT'); ?></th>
			<th><?php echo $this->Paginator->sort('trabalho','TR'); ?></th>
			<th><?php echo $this->Paginator->sort('recuperacao','RC'); ?></th>
			<th><?php echo $this->Paginator->sort('notafinal','NF'); ?></th>
			<th><?php echo $this->Paginator->sort('obs','OBS'); ?></th>
			<th class="actions"><?php echo __('Controles'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($studentsSubjects as $studentsSubject): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($studentsSubject['Subject']['nomedisciplina'], array('controller' => 'subjects', 'action' => 'view', $studentsSubject['Subject']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($studentsSubject['Student']['nome'], array('controller' => 'students', 'action' => 'view', $studentsSubject['Student']['id'])); ?>
		</td>
		<td><?php echo h($studentsSubject['StudentsSubject']['nota']); ?>&nbsp;</td>
		<td><?php echo h($studentsSubject['StudentsSubject']['trabalho']); ?>&nbsp;</td>
		<td><?php echo h($studentsSubject['StudentsSubject']['recuperacao']); ?>&nbsp;</td>
		<td><?php echo h($studentsSubject['StudentsSubject']['notafinal']); ?>&nbsp;</td>
		<td><?php echo h($studentsSubject['StudentsSubject']['obs']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $studentsSubject['StudentsSubject']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Adicionar Nota'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Disciplina'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Alunos'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Colocação Geral'), array('action' => 'colocacao')); ?></li>
		<li><?php echo $this->Html->link(__('Fotos da Turma'), array('action' => 'fotosturma')); ?></li>
	</ul>
	</fieldset>	
</div>
