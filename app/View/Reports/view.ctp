<div class="col-md-12 painel">
	    <h2><?php echo __('Arquivos'); ?></h2>
      <?php if($this->Session->read('Auth.User.group_id') == 3) : ?>
				<?php echo $this->Html->link(__('Editar Arquivo'), array('action' => 'edit', $report['Report']['id']),array('class' => 'btn btn-default')); ?>
				<?php echo $this->Form->postLink(__('Deletar Arquivo'), array('action' => 'delete', $report['Report']['id']), array('class' => 'btn btn-default','confirm' => __('Are you sure you want to delete # %s?', $report['Report']['id']))); ?> 
				<?php echo $this->Html->link('Download', array('controller' => 'reports', 'action' => 'viewdown', $report['Report']['id'],true),array('class' => 'btn btn-default'));?>
			<?php else : ?>
				<?php echo $this->Html->link('Download', array('controller' => 'reports', 'action' => 'viewdown', $report['Report']['id'],true),array('class' => 'btn btn-default'));?>
			 <?php endif; ?>
			<dl>
					<dt><?php echo __('Disciplina'); ?></dt>
					<dd>
					<?php echo $this->Html->link($report['Subject']['nomedisciplina'], array('controller' => 'subjects', 'action' => 'view', $report['Subject']['id'])); ?>
					&nbsp;
					</dd>
					<dt><?php echo __('Título:'); ?></dt>
					<dd>
					<?php echo h($report['Report']['titulo']); ?>
					&nbsp;
					</dd>
					<dt><?php echo __('Descrição:'); ?></dt>
					<dd>
					<?php echo h($report['Report']['descricao']); ?>
					&nbsp;
					</dd>
					<dt><?php echo __('Criado:'); ?></dt>
					<dd>
					<?php echo $this->Time->format('d/m/Y,H:i',$report['Report']['created']); ?>&nbsp;
					</dd>
			</dl>
	</fieldset>	
	<!--COMMENTS-->
<div style="width:100%;margin:auto;margin-top:30px;">  
<object data="<?php echo '/files/arquivos/'.$report['Report']['report']; ?>" width="100%" height="780" style="border:1px solid #333;"type="application/pdf">
    <p>Seu navegador não tem um plugin pra PDF</p>
</object>
</div>   
<!--COMMENTS FIM-->

<div class="actions">
<h2>Comentários</h2>
<?php echo $this->Form->create('Comment', array('action' => 'add')); ?>

<?php
echo $this->Form->input('comentario', array('class'=>'form-control','rows'=>'5'));
echo $this->Form->input('report_id', array('type' => 'hidden', 'value' => $report['Report']['id']));
?>
<?php echo $this->Form->end(__('Adicionar')); ?>	
<div class="">
<table class="table table-hover">
<?php if (!empty($report['Comment'])): ?>
<!--tr>
<th><?php echo __('Usuario'); ?></th>
<th><?php echo __('Comentario'); ?></th>
<th><?php echo __('Created'); ?></th>
</tr-->
<?php
$i = 0;
foreach ($allcomments as $comment): ?>
<tr>
<td>
<span style="background:#dedede;padding:1px;color:#A52A2A;"><b><?php echo $comment['User']['username']; ?></b>:&nbsp;<?php echo h($this->Time->format("d/m/Y , G:i:s",$comment['Comment']['created'])); ?></span></br>
<i><?php echo $comment['Comment']['comentario']; ?></i></br>
</td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
</div>
</div>
</div>