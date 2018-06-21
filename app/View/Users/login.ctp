<div class="login-page">
  <div class="form">
    <?php echo $this->Session->flash(); ?>
    <div style="margin:10px;padding:30px;border:1px dotted #333;fonte-size:12px;">
          <?php echo $this->Html->image('correg.png', array('alt' => 'PDF','width' => 110));?>
            <?php echo $report['titulo']; ?>
          <b>SIS CORREG - 1.0</b><br>
          CORREGEDORIA<br>
          PMPI
        </div>
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users','action' => 'login')));?><br>
    <?php echo $this->Form->input('User.username',array('label'=>'','class'=>'form-control','placeholder'=>'Usuário'));?><br>
    <?php echo $this->Form->input('User.password',array('label'=>'','class'=>'form-control','placeholder'=>'Senha'));?>
    <br>
    <?php echo $this->Form->button('Logar'); ?>
    <?php echo $this->Form->end(); ?>
  </div>
</div>
 