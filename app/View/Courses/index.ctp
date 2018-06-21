<div class="col-md-12 painel">
	    <h2><?php echo __('Encarregados'); ?></h2>
       <?php echo $this->Html->link(__('+ Encarregado'), array('action' => 'add'),array('class' => 'btn btn-default')); ?>
			<table class="table table-striped table-bordered table-hover" style="margin-top:20px;">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('nomecurso','Encarregado'); ?></th>
					<th><?php echo $this->Paginator->sort('unidade'); ?></th>
					
					<th class="actions"><?php echo __('Controles'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($courses as $course): ?>
			<tr>
				<td><?php echo h($course['Course']['nomecurso']); ?>&nbsp;</td>
				<td><?php echo h($course['Course']['unidade']); ?>&nbsp;</td>
				
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $course['Course']['id']),array('class' => 'btn btn-default')); ?>
					<!--?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $course['Course']['id'])); ?>
					<!--?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $course['Course']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $course['Course']['id']))); ?-->
				</td>
			</tr>
		<?php endforeach; ?>
			</tbody>
			</table>
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
