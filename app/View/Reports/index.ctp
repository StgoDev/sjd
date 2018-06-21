<?php if($this->Session->read('Auth.User.group_id') == 7) : ?>

<div style="text-align:center;margin-top:200px;margin-bottom:200px;"><h2>AGUARDE SEU CADASTRO SER APROVADO</h2></div>
<!--#######-->
<?php else : ?>	
<!--#######-->
<div class="reports index">
	<fieldset>
<?php
	echo $this->Form->create('Report', array(
          'url'   => array('controller' => 'reports','action' => 'search')));
	if (!isset($searchQuery)) {
	$searchQuery = '';
	}
	echo $this->Form->input('searchQuery', array('value' => h($searchQuery),'label'=>'Buscar pelo nome da disciplina ,pelo título, pela descrição ou pelo instrutor :'));
	echo $this->Form->end(__('Buscar'));
	?>
	<legend><?php echo __('Arquivos'); ?></legend>
	<table cellpadding="0" cellspacing="0">
			<thead>
					<tr>
							<th>&nbsp;</th>
							<th><?php echo $this->Paginator->sort('subject_id','Disciplina'); ?></th>
							<th><?php echo $this->Paginator->sort('titulo','Título'); ?></th>
							<th><?php echo $this->Paginator->sort('created','Criado'); ?></th>
					</tr>
			</thead>
	<tbody>
		<?php foreach ($reports as $report): ?>
		<tr>
		<td>
		<?php
		echo $this->Html->link(
		$this->Html->image('pdficon.png', array('alt' => 'PDF','width' => 40)),
		array('controller' => 'reports', 'action' => 'viewdown', $report['Report']['id'],true),array('escapeTitle' => false, 'title' => 'Baixar PDF','target'=>'_blank'));?>
		<td>
		<?php echo $this->Html->link($report['Subject']['nomedisciplina'], array('controller' => 'subjects', 'action' => 'view', $report['Subject']['id'])); ?>
		</td>
		<td><?php echo h($report['Report']['titulo']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('d/m/Y,H:i',$report['Report']['created']); ?>&nbsp;</td>
		<?php if($this->Session->read('Auth.User.group_id') == 3) : ?>
		<td class="actions">	
		<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $report['Report']['id'])); ?>
		<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $report['Report']['id'])); ?>
		<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $report['Report']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $report['Report']['id']))); ?>
		</td>
		<?php else : ?>	
		<?php endif; ?>	
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</fieldset>	
</div>
<div class="actions">
	<fieldset>
	<legend><?php echo __('Controles'); ?></legend>
	<ul>
	<?php if($this->Session->read('Auth.User.group_id') == 3) : ?>
		<li><?php echo $this->Html->link(__('Disciplinas'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Alunos'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	 <?php else : ?>
	 	<li><?php echo $this->Html->link(__('Minha Ficha'), array('controller'=>'students','action' => 'view_record')); ?> </li>
		<li><?php echo $this->Html->link(__('Imprimir Boletim'), array('controller'=>'students','action' => 'boletim_pdf', 'ext' => 'pdf'),array('target'=>'_blank'));?></li>
		<!--li>< ?php echo $this->Html->link(__('Imprimir Certificado'), array('controller'=>'students','action' => 'certificado_pdf', 'ext' => 'pdf'),array('target'=>'_blank'));?></li-->
		<!--li>< ?php echo $this->Html->link(__('Fotos da Turma'), array('controller'=>'studentsSubjects','action' => 'fotosturma')); ? > </li-->
	 	<li><?php echo $this->Html->link(__('Editar Usuário'), array('controller'=>'users','action' => 'editar')); ?> </li>
	 <?php endif; ?>
	</ul> 
	</fieldset>
</div>
<!--#######-->
<?php endif; ?>	
  