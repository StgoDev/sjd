<style type="text/css"> 
		h3 {
		text-align:center;
		}
		figure {
		display: inline-block;
		margin: 5px; /* adjust as needed */
		}
		figure img {
		vertical-align: top;
		}
		figure figcaption {
		text-align: center;
		}
</style> 
<div class="studentsSubjects index" style="width:100%;padding:0;text-align: center;">
		<h3><?php echo __('MODELO DA PLACA CFS 2017'); ?></h3>
		<?php 
		$c=0;
		foreach ($studentsSubjects as $studentsSubject): 
		$c++;
		?>
		<figure>
		<?php 
		if(!empty($studentsSubject['Student']['foto_dir'])) {
		echo $this->Html->image('../files/student/foto/' . $studentsSubject['Student']['foto_dir'] . '/' . 'thumb_' .$studentsSubject['Student']['foto']); 
		} elseif (empty($student['Student']['foto_dir'])) {
		echo $this->Html->image('../img/sem_foto.png', array('url' => array('controller' => 'students', 'action' => 'view', $student['Student']['id']))); 	
		}
		?>
		<figcaption>
		3ºSGT<br><?php echo ($studentsSubject['Student']['nomeguerra']); ?>
		</figcaption>
		</figure>
		<?php endforeach; ?>
</div>

