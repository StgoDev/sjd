<div class="col-md-12 painel">
		<?php echo $this->Form->create('Report',array('enctype'=>'multipart/form-data',
                                                  'inputDefaults' => array(
                                                  'div' => 'form-group',
                                                  'label' => false,
                                                  'wrapInput' => false,
                                                  'class' => 'form-control'
                                                  ))); ?>
		<h2><?php echo __('Adiciona Arquivos'); ?></h2>
		<?php
		echo $this->Form->input('titulo',array('label'=>'Título'));
		echo $this->Form->input('descricao',array('label'=>'Descrição'));
		echo $this->Form->input('report', array('label'=>'Arquivos','type' => 'file'));
		?>
		</fieldset>
		<?php echo $this->Form->end(__('Salvar')); ?>
</div>
