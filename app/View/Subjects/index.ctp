<div class="col-md-12 painel">
  <h2>
   <?php echo __('Procedimentos'); ?> 
  </h2>
  <?php echo $this->Form->create(array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => false,
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-inline'
)); ?>
	<?php echo $this->Form->input('course', array('label'=>'Exibir:','placeholder'=>'Encarregado','required'=>false,'class'=>'form-control')); ?>
	<?php echo $this->Form->input('nomedisciplina', array('label'=>'Filtar:','placeholder'=>'Procedimento','required'=>false,'class'=>'form-control'));; ?>
	&nbsp;<?php echo $this->Form->submit('Mostrar', array(  
		'div' => 'form-group',
		'class' => 'btn btn-default'
	)); ?>
<?php echo $this->Form->end(); ?>
 
  
  <?php echo $this->Html->link(__('Encarregados'), array('controller' => 'courses', 'action' => 'index'),array('class' => 'btn btn-default')); ?><br>
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" style="margin-top:20px;">
	<thead>
	<tr>
			<th style="width:22px;">Nº</th>
      <th style="width:22px;"></th>
			<th><?php echo $this->Paginator->sort('course_id','Encarregado'); ?></th>
			<th><?php echo $this->Paginator->sort('nomedisciplina','Procedimento'); ?></th>
      <th>Nº/Port.</th>
			<th><?php echo $this->Paginator->sort('recebimento','Recebimento'); ?></th>
      <th><?php echo $this->Paginator->sort('cargahoraria','Duração'); ?></th>
      <th><?php echo $this->Paginator->sort('prazofinal','Prazo Final'); ?></th>
		  <th>Resta</th>
			<th>Situação</th>
			<th class="actions"><?php echo __('Controles'); ?></th>
	</tr>
	</thead>
	<tbody>
	
	<?php 
		$c=0;
		foreach ($subjects as $subject): 
		$c++;
	?>
	<tr>
		<td>
      <?php echo $c;?>.
    </td>
    <td><?php 
      $data1 = date('Y-m-d'); 
      $data2 = $subject['Subject']['prazofinal'];
      $data3 = $subject['Subject']['prazolimite'];
      
      //print_r($data3);
      if($data1 > $data2):?>
      <?php echo $this->Html->image('icon-alert.gif', array('alt' => 'alerta','width' => 22));?>
      <?php elseif ($data1 >= $data3):?>	
      <?php echo $this->Html->image('error.gif', array('alt' => 'alerta','width' => 22));?>
      <?php else:?>
      <?php echo $this->Html->image('icon-ok.png', array('alt' => 'alerta','width' => 22));?>
			<?php endif;?></td>
		<td>
			<?php echo $this->Html->link($subject['Course']['nomecurso'], array('controller' => 'courses', 'action' => 'view', $subject['Course']['id'])); ?>
		</td>
		<td><?php echo h($subject['Subject']['nomedisciplina']); ?>&nbsp;</td>
    <td>0000/00</td>
		<td><?php echo h($this->Time->format($subject['Subject']['recebimento'],'%e de %B de %Y')); ?>&nbsp;</td>
    <td><?php echo h($subject['Subject']['cargahoraria']); ?>&nbsp;dia(s).</td>
    <td><?php echo h($this->Time->format($subject['Subject']['prazofinal'],'%e de %B de %Y')); ?>&nbsp;</td>
    <td>
      <?php
          $hoje=date('Y-m-d');
          //print_r($hoje);
          $diff  = date_diff( date_create($hoje), date_create($subject['Subject']['prazofinal']) );
          echo $diff->format('%R%a dia(s)');
      ?>
    </td>
    <td>
      <?php 
      $data1 = date('Y-m-d'); 
      $data2 = $subject['Subject']['prazofinal'];
      $data3 = $subject['Subject']['prazolimite'];
      
      //print_r($data3);
      if($data1 > $data2):?>
      DEVOLVIDO
      <?php elseif ($data1 >= $data3):?>	
      PRORROGADO
      <?php else:?>
      EM ANDAMENTO
			<?php endif;?> 
    </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $subject['Subject']['id']),array('class' => 'btn btn-default')); ?>
      <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $subject['Subject']['id']),array('class' => 'btn btn-default')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
  </div>

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
	
</div>


	
