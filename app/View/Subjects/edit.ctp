<div class="col-md-12 painel">
<?php echo $this->Form->create('Subject', array(
		'type'=>'file',
		'inputDefaults' => array(
		'div' => 'form-group',
		'label' => false,
		'wrapInput' => false,
		'class' => 'form-control'
		),
		'class' => 'form-inline'
		)); ?>
	<h2><?php echo __('Editar Procedimento'); ?></h2>
	<?php echo $this->Form->input('id');?>
	<?php echo $this->Form->input('nomedisciplina',array('label'=>'Procedimento:&nbsp;'));?><br>
	<?php echo $this->Form->input('recebimento',array('label'=>'Recebimento:&nbsp;','dateFormat' => 'DMY'));?><br>
	<?php echo $this->Form->input('cargahoraria',array('label'=>'Prazo:&nbsp;'));?><br>

<?php echo $this->Form->end(__('Submit')); ?>
</div>

