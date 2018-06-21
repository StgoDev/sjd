<style>
body {
color: #000;
font-family:'lucida grande',verdana,helvetica,arial,sans-serif;
font-size:80%;
margin: 0;
margin-left:2%;
margin-right:2%;
}
/** containers **/
div.form,
div.index,
div.view {
float:left;
width:100%;
}	
table, th, td {
  border: 1px solid black;
}
table{
		margin: 0 auto;
}	
table td, table th
{
    padding: 2px; /* 'cellpadding' equivalent */
}	
@page {size: a4 landscape; margin: 60px 50px; }
#header { position: fixed; left: 0px; top: -40px; right: 0px; height: 150px; text-align: left;}
#footer { position: fixed; left: 0px; bottom: -160px; right: 0px; height: 150px; text-align:center;border-top:1px solid #000;font-size: 70%;}
#footer .page:after { content: counter(page, upper-roman); }
</style>
<div id="header">
<p class="page">
POLO PARNAÍBA ---- BOLETIM NOTAS ----
<?php if (!empty($student['Course'])): ?>
	<?php foreach ($student['Course'] as $course): ?>
			<?php echo $course['nomecurso']; ?>&nbsp;/
			<?php echo $course['unidade']; ?>&nbsp;/
			<?php echo ($this->Time->format('Y',$course['ano'])); ?>
	<?php endforeach; ?>
<?php endif; ?>	
</p>
<p class="page">
Emitido em&nbsp;
<?php 
	echo $data = date("d/m/Y H:i:s ")
?>
.	
</p>	
</div>
<div id="footer">
<p class="page">&nbsp;&nbsp;página&nbsp;-&nbsp;</p>
</div>
<div class="students view" style="margin-top:50px;">
<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Sala'); ?></th>
		<th><?php echo __('Nome'); ?> </th>
		<th><?php echo __('Nome/Guerra'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
	</tr>
	<tr>	
			<td><?php echo h($student['Room']['nomesala']); ?></td>
			<td><?php echo h($student['Student']['nome']); ?></td>
			<td><?php echo h($student['Student']['nomeguerra']); ?></td>
			<td><?php echo h($student['Student']['unidade']); ?></td>
	</tr>
</table>	
</div>
<div class="related" style="margin-top:30px;">
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
