<div class="studentsCourses view">
<h2><?php echo __('Students Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentsCourse['Student']['id'], array('controller' => 'students', 'action' => 'view', $studentsCourse['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentsCourse['Course']['id'], array('controller' => 'courses', 'action' => 'view', $studentsCourse['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($studentsCourse['StudentsCourse']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Students Course'), array('action' => 'edit', $studentsCourse['StudentsCourse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Students Course'), array('action' => 'delete', $studentsCourse['StudentsCourse']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $studentsCourse['StudentsCourse']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Students Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
