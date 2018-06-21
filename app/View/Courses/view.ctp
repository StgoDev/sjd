<div class="col-md-12 painel">
<h2><?php echo __('Encarregado'); ?></h2>
  
<?php echo $this->Html->link(__('Voltar'), array('action' => 'index'),array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('Adicionar'), array('action' => 'add'),array('class' => 'btn btn-default')); ?> 
<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $course['Course']['id']),array('class' => 'btn btn-default')); ?> 
<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $course['Course']['id']), array('class' => 'btn btn-default','confirm' => __('Are you sure you want to delete # %s?', $course['Course']['id']))); ?> 	
	  
<div class="well" style="margin-top: 20px;"> 
	<dl>
		
		<dt><?php echo __('Encarregado:'); ?></dt>
		<dd>
			<?php echo h($course['Course']['nomecurso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unidade:'); ?></dt>
		<dd>
			<?php echo h($course['Course']['unidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano:'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('Y',$course['Course']['ano'])); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>

<div class="related">
	<h2><?php echo __('Procedimentos'); ?></h2>
	<?php if (!empty($course['Subject'])): ?>
	<table class="table table-striped table-bordered table-hover" style="margin-top:20px;">
	<tr>
		<th style="width:22px;">Nº</th>
    <th style="width:22px;"></th>
		<th><?php echo __('Procedimento'); ?></th>
     <th>Nº/Port.</th>
		<th><?php echo __('Recebimento'); ?></th>
		<th><?php echo __('Prazo Final'); ?></th>
		<th><?php echo __('CH'); ?></th>
		<th class="actions"><?php echo __('&nbsp;'); ?></th>
	</tr>
	<?php 
		$cc;
		foreach ($course['Subject'] as $subject): 
		$cc++;
		?>
		<tr>
			<td><?php echo $cc; ?>.</td>
      <td><?php 
      $data1 = date('Y-m-d'); 
      $data2 = $subject['prazofinal'];
      $data3 = $subject['prazolimite'];
      
      //print_r($data3);
      if($data1 > $data2):?>
      <?php echo $this->Html->image('icon-alert.gif', array('alt' => 'alerta','width' => 22));?>
      <?php elseif ($data1 >= $data3):?>	
      <?php echo $this->Html->image('error.gif', array('alt' => 'alerta','width' => 22));?>
      <?php else:?>
      <?php echo $this->Html->image('icon-ok.png', array('alt' => 'alerta','width' => 22));?>
			<?php endif;?></td>
			<td><?php echo $subject['nomedisciplina']; ?></td>
      <td>00-00000-00/00/0000</td>
			<td><?php echo $this->Time->format($subject['recebimento'],'%e de %B de %Y'); ?></td>
      <td><?php echo $this->Time->format($subject['prazofinal'],'%e de %B de %Y'); ?></td>
			<td><?php echo $subject['cargahoraria']; ?></td>	
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'subjects', 'action' => 'view', $subject['id']),array('class' => 'btn btn-default')); ?>
			  <?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'subjects','action' => 'delete', $subject['id'],$course['Course']['id']), array('class' => 'btn btn-default','confirm' => __('Are you sure you want to delete # %s?', $subject['nomedisciplina']))); ?>
			
      </td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<?php echo $this->Html->link(__('+ Procedimento'), array('controller' => 'subjects', 'action' => 'add',$course['Course']['id']),array('class' => 'btn btn-default')); ?> </li>
		
	</div>
	
</div>
</div>
