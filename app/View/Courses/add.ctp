<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Add Encarregado'); ?></legend>
	<?php
		echo $this->Form->input('nomecurso',array('label'=>'Nome'));
		echo $this->Form->input('unidade');
		//echo $this->Form->input('ano');
		//echo $this->Form->input('Student');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<fieldset>
		<legend><?php echo __('Actions'); ?></legend>
		<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
	</ul>
	</fieldset>	
</div>
