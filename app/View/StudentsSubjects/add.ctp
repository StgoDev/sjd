<div class="studentsSubjects form">
<?php echo $this->Form->create('StudentsSubject'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Notas'); ?></legend>
	<?php
		echo $this->Form->input('subject_id',array('label'=>'Disciplina'));
		echo $this->Form->input('student_id',array('label'=>'Aluno'));
		echo $this->Form->input('nota');
		echo $this->Form->input('trabalho');
		echo $this->Form->input('recuperacao');
		echo $this->Form->input('notafinal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Controles'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Disciplinas'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Alunos'), array('controller' => 'students', 'action' => 'index')); ?> </li>		
	</ul>
</div>
