<div class="login">
	<?php echo $this->Form->create('User');?>
			<h2><?php echo __('Cadastro'); ?></h2>
			<?php echo $this->Form->input('username',array('label'=>'Usuário'));
			echo $this->Form->input('name',array('label'=>'Nome Completo'));
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
			echo $this->Form->submit('Cadastrar', array('class' => 'form-submit',  'title' => 'Clique aqui para adicionar um usuário.') ); 
	?>
	<button onclick="location.href='http://sjd.qap.net.br/users/login'">Voltar</button>
	<?php echo $this->Form->end(); ?>
</div>
