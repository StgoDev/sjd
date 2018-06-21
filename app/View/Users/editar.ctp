<div class="users form">
		<?php echo $this->Form->create('User'); ?>
		<fieldset>
				<legend><?php echo __('Editar Usuário'); ?></legend>
				<?php 
				echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
				echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Os nomes de usuário não podem ser alterados!'));
				echo $this->Form->input('email');
				echo $this->Form->input('name', array( 'label' => 'Nome completo e sem abreviação'));
				echo $this->Form->input('new_password', array( 'label' => 'Nova Senha (deixe vazia se você não quiser alterar)', 'maxLength' => 255, 'type'=>'password','required' => 0));
				echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
				?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
<h3><?php echo __('Controles'); ?></h3>
<ul>
<li><?php echo $this->Html->link(__('Voltar'), array('controller' => 'reports', 'action' => 'index')); ?> </li>

</div>
