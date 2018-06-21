<div class="studentsSubjects index">
<fieldset>		
<legend><?php echo __('Colocação Geral'); ?></legend>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>	
<th>Aluno</th>
<th>Nome/Guerra</th>	
<th>QTD Notas</th>		
<th>Média</th>
<th>Obs</th>
<th class="actions"><?php echo __('Controles'); ?></th>
</tr>
</thead>
<tbody>
<?php 
foreach ($studentsSubjects as $studentsSubject): 
?>
<tr>
<td>
<?php echo ($studentsSubject['Student']['antiguidade']); ?>.	
<?php echo $this->Html->link($studentsSubject['Student']['nome'], array('controller' => 'students', 'action' => 'view', $studentsSubject['Student']['id'])); ?>
</td>
<td><b><?php echo ($studentsSubject['Student']['nomeguerra']); ?></b>&nbsp;</td> 	
<td><b><?php echo ($studentsSubject['0']['qtd_nota']); ?></b>&nbsp;</td>  	
<td><b><?php echo number_format($studentsSubject['0']['media'],3); ?></b>&nbsp;</td>
<td><?php if (!empty($studentsSubject['0']['qtd_se'])): ?>
<b>S.E.&nbsp;<?php echo ($studentsSubject['0']['qtd_se']); ?></b>
<?php endif; ?>
&nbsp;</td> 
<td class="actions">
<?php echo $this->Html->link(__('Ver'), array('controller' => 'students', 'action' => 'view', $studentsSubject['Student']['id'])); ?>
</td>
</tr>

<?php endforeach; ?>
</tbody>
</table>
</fieldset>	
</div>
<div class="actions">
<fieldset>
<legend><?php echo __('Controles'); ?></legend>	
<ul>
<li><?php echo $this->Html->link(__('PDF'), array('action' => 'colocacao_pdf', 'ext' => 'pdf'),array('target'=>'_blank'));?></li>
</ul>
</fieldset>	
</div>
