<div class="studentsSubjects form">
<?php echo $this->Form->create('StudentsSubject'); ?>
	<fieldset>
		<legend><?php echo __('Editar Notas'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject_id',array('label'=>'Disciplina'));
		echo $this->Form->input('student_id',array('label'=>'Aluno'));
		echo $this->Form->input('nota',array('type'=>'number', 'step'=>'0.001'));
		echo $this->Form->input('trabalho',array('type'=>'number', 'step'=>'0.001'));
		echo $this->Form->input('recuperacao',array('type'=>'number', 'step'=>'0.001'));
		/**echo $this->Form->input('notafinal',array('type'=>'number', 'step'=>'0.001'));**/
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Controles'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('StudentsSubject.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('StudentsSubject.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Disciplinas'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Alunos'), array('controller' => 'students', 'action' => 'index')); ?> </li>	
	</ul>
</div>
