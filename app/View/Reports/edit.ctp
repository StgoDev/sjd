<div class="reports form">
<?php echo $this->Form->create('Report'); ?>
	<fieldset>
		<legend><?php echo __('Editar Arquivo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject_id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descricao');
		echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

