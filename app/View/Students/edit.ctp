<div class="students form">
<?php echo $this->Form->create('Student', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Edit Student'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('room_id');
		echo $this->Form->input('nome');
		echo $this->Form->input('nomeguerra');
		echo $this->Form->input('foto', array('type' => 'file', 'id' => 'foto', 'class' => 'file', 'label' => 'Foto', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));
		echo $this->Form->input('antiguidade');
		echo $this->Form->input('nascimento',array('minYear'=>'1920','maxYear'=>date('Y')));
		echo $this->Form->input('rg');
		echo $this->Form->input('matricula');
		echo $this->Form->input('inclusao',array('minYear'=>'1920','maxYear'=>date('Y')));
		echo $this->Form->input('unidade');
		echo $this->Form->input('endereco');
		echo $this->Form->input('contato');
		echo $this->Form->input('Student.Course',array('label'=>'Selecione o curso.', 'type'=>'select', 'multiple'=>true));
		echo $this->Form->input('Subject');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Student.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
