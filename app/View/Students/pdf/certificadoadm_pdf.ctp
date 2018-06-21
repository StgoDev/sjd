<style>
.corpo {
color: #000;
font-family: "Times New Roman", Times, serif;	

font-size:130%;
}
@page {size: a4 landscape;margin: 0px 0px; }
	
table {
  border-collapse: collapse;
	width:70%;
	margin: 0 auto;
}

.tabelaum{
	float: left;
}
.tabeladois{
	float: right;
}	
td {
  /*padding: 1.85re;*/
  text-align: center;
  border: 1px solid #ccc;
}	
th {
  /*padding: 1.85re;*/
  text-align: left;
  border: 1px solid #ccc;
}
/*--------------------------------*/	
#nome { position: absolute; left: -280px; top: 384px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 150%; color:#483D8B;font-weight: bold; }	
#cidade_data { position: absolute; left: 0px; top: 490px; right: -25px; height: 150px; text-align: center;z-index: 9999;font-size: 160%; color:#000; }		
#nome_assinatura { position: absolute; left: 0px; top: 658px; right: -490px; height: 150px; text-align: center;z-index: 9999;font-size: 90%; }
#dir_cep { position: absolute; left: -458px; top: 658px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 90%; }	
#dir_ensino { position: absolute; left: 0px; top: 570px; right: -490px; height: 150px; text-align: center;z-index: 9999;font-size: 90%;  }		
#cmd_geral { position: absolute; left: -458px; top: 570px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 90%; }	
#inicio { position: absolute; left: -719px; top: 447px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 140%; }	
#termino { position: absolute; left: -438px; top: 447px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 140%; }		
#meio { position: fixed; left: 0px; top:0px; right: 0px; height: 160px; text-align:center;} 
#meio_malha { position: fixed; left: 0px; top:0px; right: 0px; height: 160px; text-align:center;}	
#historico_malha { position: fixed; left: 0px; top:0px; right: 0px; height: 160px; text-align:center;font-size: 90%; margin:auto;font-family:'lucida grande',verdana,helvetica,arial,sans-serif;}		
</style>
<div class="corpo">
<div id="nome">
<?php echo h($student['Student']['nome']); ?>
</div>
<div id="nome_assinatura">
<?php echo h($student['Student']['nome']); ?>
</div>	
<div id="cidade_data">
Teresina - PI , 13 de outubro 2017.
</div>
	
	<?php foreach ($student['Course'] as $course): ?>
			<div id="inicio">
			<?php echo ($this->Time->format('d/m/Y',$course['inicio'])); ?>	
			</div>	
			<div id="termino">
			<?php echo ($this->Time->format('d/m/Y',$course['termino'])); ?>
			</div>
			<div id="dir_cep">
			<?php echo $course['dir_cep']; ?>
			</div>
			<div id="dir_ensino">
			<?php echo $course['dir_ensino']; ?>
			</div>
			<div id="cmd_geral">
			<?php echo $course['cmd_geral']; ?>
			</div>
	<?php endforeach; ?>	

<div id="meio"><img src="img/certificado.jpg" width=100% /></div>
<div id="meio_malha" style="page-break-before: always;padding:40px;">
<img src="img/certificado_malha_sgt_2017.jpg" width=100% />		
</div>
<div id="historico_malha" style="page-break-before: always;padding:40px;">
		<div style="text-align:center;margin-top:50px;margin-bottom:50px;font-size:110%;">
			HISTÓRICO CURRICULAR DO CURSO DE FORMAÇÃO DE SARGENTOS-PM CFS/2017
		</div>
	<div style="margin-top:10px;">
<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th style="text-align:left;padding-left:4px;"><?php echo __('Nome:'); ?> </th>	
	</tr>
	<tr>	
			<td style="text-align:left;padding-left:4px;"><?php echo h($student['Student']['nome']); ?></td>
	</tr>
</table>	
</div>
	<div class="related" style="margin-top:30px;">
	<?php if (!empty($student['Subject'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th style="text-align:left;padding-left:4px;">Nº</th>
		<th style="text-align:left;padding-left:4px;"><?php echo __('Curso'); ?></th>
		<th style="text-align:left;padding-left:4px;"><?php echo __('Disciplina'); ?></th>
		
		<th style="text-align:left;padding-left:4px;"><?php echo ('NT'); ?></th>
		
		<th style="text-align:left;padding-left:4px;"><?php echo ('RC'); ?></th>
		<th style="text-align:left;padding-left:4px;"><?php echo ('NF'); ?></th>
		
	</tr>
	<?php 
		$c=0;
		foreach ($student['Subject'] as $subject): 
		$c++;
		?>
		<tr>
			<td><?php echo $c; ?>.</td>
			<td><?php echo $subject['Course']['nomecurso']; ?></td>
			<td style="text-align:left;"><?php echo $subject['nomedisciplina']; ?></td>
			
			<td><?php echo h($subject['StudentsSubject']['nota']); ?>&nbsp;</td>
			
			<td><?php echo h($subject['StudentsSubject']['recuperacao']); ?>&nbsp;</td>
			<td><?php echo h($subject['StudentsSubject']['notafinal']); ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div style="text-align:center;margin-top:150px;margin-bottom:50px;font-size:80%;">
		Daniel Christian Soares Marques - Maj PM<br>
		Coordenador do CFS Polo Parnaíba
	</div>
</div>		
</div>	
</div>