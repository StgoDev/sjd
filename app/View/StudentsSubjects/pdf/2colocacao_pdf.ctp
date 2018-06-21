<style>
body {
color: #000;
font-family:'lucida grande',verdana,helvetica,arial,sans-serif;
font-size:90%;
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
	
@page { margin: 60px 50px; }
#header { position: fixed; left: 0px; top: -40px; right: 0px; height: 150px; text-align: center; }
#footer { position: fixed; left: 0px; bottom: -160px; right: 0px; height: 150px; text-align:center;border-top:1px solid #000;font-size: 70%;}
#footer .page:after { content: counter(page, upper-roman); }
	
#img_left { position: absolute; left: 0px; top: 20px; right: -550px; height: 150px; text-align: center;z-index: 9999;font-size: 90%;  }		
#img_right { position: absolute; left: -550px; top: 20px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 90%; }		
#img_right_visto { position: absolute; left: -550px; top: 110px; right: 0px; height: 150px; text-align: center;z-index: 9999;font-size: 90%; }			
</style>
<div id="footer">
<p class="page">&nbsp;&nbsp;página&nbsp;-&nbsp;</p>
</div>

			<div id="img_left">
			<img src="img/cep_pmpi.jpg" width=50 height=80 />
			</div>
			<div id="img_right">
			<img src="img/pmpi.jpg" width=50 height=80 />
			</div>
			<div id="img_right_visto">
			<img src="img/visto.png" width=160 height=80 />
			</div>

<div class="studentsSubjects index">
<div style="margin-top:20px;margin-bottom:40px;">		
		<h3 style="text-align:center;">
			POLICIA MILITAR DO PIAUÍ<br>
			DIRETORIA DE ENSINO, INSTRUÇÃO E PESQUISA<br>
			CENTRO DE FORMAÇÃO E APERFEIÇOAMENTO DE PRAÇAS<br>
			COORDENADORIA GERAL DE ENSINO<br>
			PÓLO REGIONAL DE ENSINO - 2º BPM<br>
		</h3>	
</div>	
	
<h3 style="text-align:center;">ATA DE CONCLUSÃO DO CURSO DE FORMAÇÃO DE SARGENTOS - CFS 2017 - POLOPARNAÍBA</h3>
	
<div style="margin-top:20px;">		
		<p  style="text-align: justify;line-height: 25px;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aos treze dias do mês de outubro do ano de 2017, 
			no Quartel do 2º Batalhão Policial Militar, na sala da Seção Técnica de Ensino, reunidos o 
			TEN CEL PM ADRIANO URSULINO DE LUCENA, Diretor Adjunto de Ensino do 2º Batalhão Policial Militar, o MAJ PM DANIEL CHRISTIAN SOARES MARQUES,  
			Coordenador Adjunto de Curso e o 1ºSGT PM FRANCISCO ALBERTO VERAS DOS SANTOS, Auxiliar do Coordenador Adjunto de Curso, sob a presidência do primeiro, 
			deu-se início às 08h00 a lavratura da presente ata de encerramento do <b>CURSO DE FORMAÇÃO DE SARGENTOS 2017</b>, realizado nas dependências do 2º BPM "Major Osmar", 
			localizado na cidade de Parnaíba - PI, à Estrada Rosápoles, S/Nº, Bairro Joaz Souza, no dia 13 de outubro de 2017.
		</p>
		<p  style="text-align: justify;line-height: 25px;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O Diretor Adjunto do 2º BPM reconhece que durante a realização do 
			<b>CURSO DE FORMAÇÃO DE SARGENTOS 2017</b>, dos 58 (cinquenta e oito) alunos constantes na relação enviada pela DEIP,
			todos se apresentaram neste polo conforme publicado no Boletim Interno nº 38 de 03/04/2017 desta Unidade. Dos alunos que foram matriculados, 58 (cinquenta e oito)
			tiveram suas matrículas homologadas, não houve desistências, os 58 (cinquenta e oito) alunos concluíram o curso com aproveitamento físico e intelectual,
			os quais foram classificados por ordem de M.I (Merecimento Intelectual), avaliados em função das notas de aprovação nas diversas disciplinas do curso, 
			conforme Art. 88  do Decreto Estadual n° 11.333, de 12 de março de 2004 (Regimento Interno do CFAP). Chegando-se ao seguinte resultado:
	  </p>
</div>	
<table cellpadding="0" cellspacing="0">
<thead>
<tr>	
<th>Aluno</th>
<th>QTD Notas</th>		
<th>Média</th>
<th>Obs</th>
</tr>
</thead>
<tbody>
<?php 
	$c=0;
	foreach ($studentsSubjects as $studentsSubject): 
	$c++;
?>
<tr>
<td>
<b><?php echo $c;?>.</b>		
<?php echo $studentsSubject['Student']['nome']; ?>
</td>
<td style="text-align:center;"><b><?php echo ($studentsSubject['0']['qtd_nota']); ?></b>&nbsp;</td>  	
<td style="text-align:center;"><b><?php echo number_format($studentsSubject['0']['media'],3); ?></b>&nbsp;</td>  	
<td><?php if (!empty($studentsSubject['0']['qtd_se'])): ?>
	<b>S.E.&nbsp;<?php echo ($studentsSubject['0']['qtd_se']); ?></b>
	<?php endif; ?>
	&nbsp;</td> 
</tr>
<?php endforeach; ?>
</tbody>
</table>
<div style="margin-top:10px;">		
		<p style="text-align: justify;font-size:10px;"><b>OBS:</b</p>
		<p style="text-align: justify;font-size:10px;">
		S.E.1 - SEGUNDA EPOCA EM <b>(UM)</b> DISCIPLINA<br>
		S.E.2 - SEGUNDA EPOCA EM <b>(DUAS)</b> DISCIPLINA<br>
		S.E.3 - SEGUNDA EPOCA EM <b>(TRÊS)</b> DISCIPLINA<br>
	  </p>
</div>	
<div style="margin-top:20px;">		
		<h3 style="text-align:center;">OBSERVAÇÕES</h3>
		<p  style="text-align: justify;line-height: 25px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Não houve média final igual, foram adotados três casas decimais como critério de classificação do primeiro ao último colocado do referido curso de formação, 
		sendo que do 55º (quinquagésimo quinto) ao 58º (quinquagésimo oitavo) foram reclassificados conforme resultado final das disciplinas em que ficaram de recuperação, 
		ou seja, em <b>uma</b>, <b>duas</b> e em <b>três</b> disciplinas, conforme prescreve o art. 89 do Regimento Interno do CFAP.
	  </p>
		<p  style="text-align: justify;line-height: 25px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feita esta observação lavrou-se a relação de classificação da média final de conclusão de curso.
		Não tendo nada mais a acrescentar deu-se por encerrada a lavratura da presente Ata de Conclusão de Curso às 11h00 do mesmo dia, que após lida e achado conforme, para constar, 
		vai devidamente assinada pelo Ten Cel PM ADRIANO URSULINO DE LUCENA, Diretor de Ensino, 
		o MAJ PM DANIEL CHRISTIAN SOARES MARQUES, Coordenador Adjunto de Curso e o 
		1ºSGT PM FRANCISCO ALBERTO VERAS DOS SANTOS, Auxiliar do Coordenador Adjunto de Curso que a digitei.	
		</p>
</div>
<div style="margin-top:30px;">		
		<p style="text-align: center;">
			<img src="img/assinaturas/TCLUCENA.jpg" width=200 height=80 />
		</p>
		<p style="text-align: center;font-size:14px;">Diretor Adjunto de Ensino</p>
</div>
<div style="margin-top:30px;">		
		<p style="text-align: center;">
		<img src="img/assinaturas/majchristian.jpg" width=300 height=80 />
		</p>
		<p style="text-align: center;font-size:14px;">Coordenador Adjunto de Curso</p>
</div>
<div style="margin-top:40px;">		
		<p style="text-align: center;">
		<img src="img/assinaturas/1sgtfalberto.jpg" width=330 height=130 />
		</p>
		<p style="text-align: center;font-size:14px;">Auxiliar do Coordenador Adjunto de Curso</p>
</div>			
</div>
