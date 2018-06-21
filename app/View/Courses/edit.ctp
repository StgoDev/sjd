<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Editar Encarregado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nomecurso',array('label'=>'Nome'));
		echo $this->Form->input('unidade');
		//echo $this->Form->input('ano');
		//echo $this->Form->input('inicio');
		//echo $this->Form->input('termino');
		//echo $this->Form->input('cmd_geral');
		//echo $this->Form->input('dir_ensino');
		//echo $this->Form->input('dir_cep');
		//echo $this->Form->input('Student');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<fieldset>
	<legend><?php echo __('Controles'); ?></legend>
	<ul>
    <li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Course.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Course.id')))); ?></li>	
	</ul>	
	</fieldset>
</div>
