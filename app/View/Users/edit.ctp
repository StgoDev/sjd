<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Editar Usuário'); ?></legend>
        <?php 
		echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
		echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Os nomes de usuários não podem ser alterados!'));
		echo $this->Form->input('email');
		echo $this->Form->input('name',array('label'=>'Nome'));
		echo $this->Form->input('new_password', array( 'label' => 'Nova Senha (deixe vazia se você não quiser alterar)', 'maxLength' => 255, 'type'=>'password','required' => 0));
		echo $this->Form->input('student_id',array('label'=>'Alunos'));
		echo $this->Form->input('group_id',array('label'=>'Grupos'));
		echo $this->Form->submit('Editar', array('class' => 'form-submit',  'title' => 'Clique aqui para editar.') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Controles'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Grupo'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>

<!--?php 
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
?>
<br/>
< ?php 
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?-->