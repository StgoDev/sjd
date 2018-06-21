<div class="rooms view">
	<fieldset>
		<legend><?php echo __('Room'); ?></legend>
			<h2>	
					<?php echo $this->Html->link($room['Course']['nomecurso'], array('controller' => 'courses', 'action' => 'view', $room['Course']['id'])); ?>
				<br>
					<?php echo h($room['Room']['nomesala']); ?>
			</h2>		
	</fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room'), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room'), array('action' => 'delete', $room['Room']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $room['Room']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<fieldset>
	
	<legend><?php echo __('Related Students'); ?></legend>
	<?php if (!empty($room['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Nomeguerra'); ?></th>
		<th><?php echo __('Antiguidade'); ?></th>
		<th><?php echo __('Nascimento'); ?></th>
		<th><?php echo __('Rg'); ?></th>
		<th><?php echo __('Inclusao'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($room['Student'] as $student): ?>
		<tr>
			
			<td><?php echo $student['nome']; ?></td>
			<td><?php echo $student['nomeguerra']; ?></td>
			<td><?php echo $student['antiguidade']; ?></td>
			<td><?php echo $student['nascimento']; ?></td>
			<td><?php echo $student['rg']; ?></td>
			<td><?php echo $student['inclusao']; ?></td>
			<td><?php echo $student['unidade']; ?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	</fieldset>	
</div>
