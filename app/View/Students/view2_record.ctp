<div class="students view">
<h2><?php echo __('Meus Dados'); ?></h2>
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
		
	</dl>
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
	<h3><?php echo __('Controles'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Voltar'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Editar Ficha'), array('controller'=>'students','action' => 'editar')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Cursos'); ?></h3>
	<?php if (!empty($student['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Curso'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		<th><?php echo __('Ano'); ?></th>
	</tr>
	<?php foreach ($student['Course'] as $course): ?>
		<tr>
			
			<td><?php echo $course['nomecurso']; ?></td>
			<td><?php echo $course['unidade']; ?></td>
			<td><?php echo ($this->Time->format('Y',$course['ano'])); ?></td>
		
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo __('Boletim das Notas'); ?></h3>
	<?php if (!empty($student['Subject'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Nº</th>
		<th><?php echo __('Curso'); ?></th>
		<th><?php echo __('Disciplina'); ?></th>
		<th><?php echo __('Instrutor'); ?></th>
		<th><?php echo ('NT'); ?></th>
		<th><?php echo ('TR'); ?></th>
		<th><?php echo ('RC'); ?></th>
		<th><?php echo ('NF'); ?></th>
		
	</tr>
	<?php 
		$c=0;
		foreach ($student['Subject'] as $subject): 
		$c++;
		?>
		<tr>
			<td><?php echo $c; ?>.</td>
			<td><?php echo $subject['Course']['nomecurso']; ?></td>
			<td><?php echo $subject['nomedisciplina']; ?></td>
			<td><?php echo $subject['nomeprofessor']; ?></td>
			<td><?php echo h($subject['StudentsSubject']['nota']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['trabalho']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['recuperacao']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['notafinal']); ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
