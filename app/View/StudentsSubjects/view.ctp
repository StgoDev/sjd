<div class="studentsSubjects view">
<h2><?php echo __('Students Subject'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentsSubject['Subject']['id'], array('controller' => 'subjects', 'action' => 'view', $studentsSubject['Subject']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentsSubject['Student']['id'], array('controller' => 'students', 'action' => 'view', $studentsSubject['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['nota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trabalho'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['trabalho']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recuperacao'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['recuperacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notafinal'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['notafinal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($studentsSubject['StudentsSubject']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Students Subject'), array('action' => 'edit', $studentsSubject['StudentsSubject']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Students Subject'), array('action' => 'delete', $studentsSubject['StudentsSubject']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $studentsSubject['StudentsSubject']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Students Subjects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Subject'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
