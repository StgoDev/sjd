<div class="col-md-12 painel">
		  <h2><?php echo __('Procedimento'); ?></h2>
      
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $subject['Subject']['id']),array('class' => 'btn btn-default','confirm' => __('Deseja realmente editar o arquivo %s?', $subject['Subject']['nomedisciplina']))); ?> 
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $subject['Subject']['id']), array('class' => 'btn btn-default','confirm' => __('Deseja realmente apagar o arquivo %s?', $subject['Subject']['nomedisciplina']))); ?> 				
			
      <div class="well" style="margin-top: 20px;">
			<dl>
				<dt><?php echo __('Encarregado:'); ?></dt>
				<dd>
					<?php echo $this->Html->link($subject['Course']['nomecurso'], array('controller' => 'courses', 'action' => 'view', $subject['Course']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Procedimento:'); ?></dt>
				<dd>
					<?php echo h($subject['Subject']['nomedisciplina']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Recebimento:'); ?></dt>
				<dd>
					<?php echo h($this->Time->format($subject['Subject']['recebimento'],'%e de %B de %Y')); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Prazo Final:'); ?></dt>
				<dd>
					<?php echo h($this->Time->format($subject['Subject']['prazofinal'],'%e de %B de %Y')); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Prazo:'); ?></dt>
				<dd>
					<?php echo h($subject['Subject']['cargahoraria']); ?>
					&nbsp;
				</dd>
			</dl>
      </div>
  
      <div class="related">
	    <h2><?php echo __('Arquivos'); ?></h2>
      <?php echo $this->Html->link(__('+ Arquivos'), array('controller' => 'reports', 'action' => 'add',$subject['Subject']['id']),array('class' => 'btn btn-default','confirm' => __('Quer adicionar um arquivo ao procedimento %s?', $subject['Subject']['nomedisciplina']))); ?>
			<?php if (!empty($subject['Report'])): ?>
			<table class="table table-striped table-bordered table-hover" style="margin-top:20px;">
			<thead>
       <tr>
				<th><?php echo __('Titulo'); ?></th>
				<th><?php echo __('Adicionado'); ?></th>				
				<th class="actions"><?php echo __('Controles'); ?></th>
			</tr>
      </thead>  
			<?php foreach ($subject['Report'] as $report): ?>
				<tr>
					<td>
            <?php
            echo $this->Html->link(
            $this->Html->image('pdficon.png', array('alt' => 'PDF','width' => 30)),
            array('controller' => 'reports', 'action' => 'view', $report['id']),array('escapeTitle' => false, 'title' => 'Baixar PDF','target'=>'_blank'));?>
            <?php echo $report['titulo']; ?>
          </td>
					<td><?php echo ($this->Time->format('d/m/Y',$report['created'])); ?></td>
					
					<td class="actions">
           <?php echo $this->Html->link(__('Ver'), array('controller' => 'reports', 'action' => 'view', $report['id']),array('class' => 'btn btn-default')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
			<?php endif; ?>
			
			
	</fieldset>
</div>
</div>