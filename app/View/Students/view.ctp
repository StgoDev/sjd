<div class="students view">
<fieldset>
<legend><?php echo __('Aluno'); ?></legend>
	<dl>
		<dt><?php echo __('Sala:'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Room']['nomesala'], array('controller' => 'rooms', 'action' => 'view', $student['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome Guerra:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['nomeguerra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ANT:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['antiguidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nascimento:'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$student['Student']['nascimento'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RG:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['rg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inclusão:'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$student['Student']['inclusao'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unidade:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['unidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereço:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contato:'); ?></dt>
		<dd>
			<?php echo h($student['Student']['contato']); ?>
			&nbsp;
		</dd>
	</dl>
</fieldset>		
</div>
<div class="actions">
	<div style="text-align:center;margin-bottom:15px;">
		<?php if (!empty($student['Student']['foto_dir'])): ?>
		<?php echo $this->Html->image('../files/student/foto/' . $student['Student']['foto_dir'] . '/' . 'thumb_' .$student['Student']['foto']); ?>
		<?php else:?>
		<div style="width:150px;height:150px;background:#000;color:#fff;margin:auto;">
		<br>ADICIONE<br>UMA FOTO<br><br>CLICANDO EM<br>EDITAR FICHA	
		</div>
		<?php endif; ?>
	</div>
	<fieldset>
	<legend><?php echo __('Controles'); ?></legend>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $student['Student']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $student['Student']['id']))); ?> </li>	
		<li><?php echo $this->Html->link(__('Adicionar'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Salas'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Imprimir Boletim'), array('action' => 'boletimadm_pdf', 'ext' => 'pdf', $student['Student']['id']),array('target'=>'_blank'));?></li>
		<li><?php echo $this->Html->link(__('Imprimir Certificado'), array('action' => 'certificadoadm_pdf', 'ext' => 'pdf', $student['Student']['id']),array('target'=>'_blank'));?></li>
	</ul>
	</fieldset>	
</div>
<div class="related">
	<fieldset>
	<legend><?php echo __('Cursos'); ?></legend>
	<?php if (!empty($student['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th><?php echo __('Curso'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		<th><?php echo __('Ano'); ?></th>
		
		<th class="actions"><?php echo __('&nbsp;'); ?></th>
	</tr>
	<?php foreach ($student['Course'] as $course): ?>
		<tr>
			
			<td><?php echo $course['nomecurso']; ?></td>
			<td><?php echo $course['unidade']; ?></td>
			<td><?php echo ($this->Time->format('Y',$course['ano'])); ?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Adicionar Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	</fieldset>
</div>
<div class="related">
	<fieldset>
	<legend><?php echo __('Boletim das Notas'); ?></legend>
	<?php if (!empty($student['Subject'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Nº</th>
		<th><?php echo __('Curso'); ?></th>
		<th><?php echo __('Disciplina'); ?></th>
		<th><?php echo ('NT'); ?></th>
		<th><?php echo ('TR'); ?></th>
		<th><?php echo ('RC'); ?></th>
		<th><?php echo ('NF'); ?></th>
		
		<th class="actions"><?php echo __('&nbsp;'); ?></th>
	</tr>
	<?php 
		$c=0;
		foreach ($student['Subject'] as $subject): 
		$c++;
	?>
		<tr>
			<td><?php echo $c;?>.</td>
			<td><?php echo $subject['Course']['nomecurso']; ?></td>
			<td><?php echo $this->Html->link($subject['nomedisciplina'], array('controller' => 'subjects', 'action' => 'view', $subject['id'])); ?></td>
			<td><?php echo h($subject['StudentsSubject']['nota']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['trabalho']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['recuperacao']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['notafinal']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('+ Nota'), array('controller' => 'studentsSubjects', 'action' => 'edit', $subject['StudentsSubject']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Imprimir Boletim'), array('action' => 'boletimadm_pdf', 'ext' => 'pdf', $student['Student']['id']),array('target'=>'_blank'));?></li>
		</ul>
	</div>
	</fieldset>
</div>
