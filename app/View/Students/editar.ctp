<div class="students form">
<?php echo $this->Form->create('Student', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
	<fieldset>
		<legend><?php echo __('Editar Ficha'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('nomeguerra');
		echo $this->Form->input('foto', array('type' => 'file', 'id' => 'foto', 'class' => 'file', 'label' => 'Foto', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));
		echo $this->Form->input('nascimento',array('minYear'=>'1920','maxYear'=>date('Y')));
		echo $this->Form->input('rg');
		echo $this->Form->input('inclusao',array('minYear'=>'1920','maxYear'=>date('Y')));
		echo $this->Form->input('contato');
		echo $this->Form->input('endereco');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Controles'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('controller' => 'reports', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Ver Ficha'), array('controller'=>'students','action' => 'view_record')); ?> </li>
	</ul>
</div>
