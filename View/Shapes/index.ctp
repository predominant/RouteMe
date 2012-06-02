<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Shapes'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('lat');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('lon');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('sequence');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($shapes as $shape): ?>
			<tr>
				<td><?php echo h($shape['Shape']['id']); ?>&nbsp;</td>
				<td><?php echo h($shape['Shape']['lat']); ?>&nbsp;</td>
				<td><?php echo h($shape['Shape']['lon']); ?>&nbsp;</td>
				<td><?php echo h($shape['Shape']['sequence']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $shape['Shape']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shape['Shape']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $shape['Shape']['id']), null, __('Are you sure you want to delete # %s?', $shape['Shape']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Shape')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>