<div class="students form">
<?php echo $this->Form->create('Student', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Add Partes'); ?></legend>
	<?php
		echo $this->Form->input('room_id',array("empty" => "Selecione uma sala"));
		echo $this->Form->input('nome');
		echo $this->Form->input('nomeguerra');
		echo $this->Form->input('foto', array('type' => 'file', 'id' => 'foto', 'class' => 'file', 'label' => 'Foto', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));
		echo $this->Form->input('foto_dir', array('type' => 'hidden'));
		echo $this->Form->input('antiguidade');
		echo $this->Form->input('nascimento',array('dateFormat'=>'DMY','minYear'=>'1920','maxYear'=>date('Y')));
		echo $this->Form->input('rg');
		echo $this->Form->input('matricula');
		echo $this->Form->input('inclusao',array('dateFormat'=>'DMY','minYear'=>'1920','maxYear'=>date('Y')));
		echo $this->Form->input('unidade');
		echo $this->Form->input('endereco');
		echo $this->Form->input('contato');
		echo $this->Form->input('Course');
		echo $this->Form->input('Subject'); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<fieldset>
	<legend><?php echo __('Controles'); ?></legend>
	<ul>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
	</fieldset>
</div>

