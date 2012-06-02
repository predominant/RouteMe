<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Trips'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('route_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('service_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('trip_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('trip_headsign');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('direction_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('block_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('shape_id');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($trips as $trip): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($trip['Route']['name'], array('controller' => 'routes', 'action' => 'view', $trip['Route']['id'])); ?>
				</td>
				<td><?php echo h($trip['Trip']['service_id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($trip['Trip'][''], array('controller' => 'trips', 'action' => 'view', $trip['Trip']['id'])); ?>
				</td>
				<td><?php echo h($trip['Trip']['trip_headsign']); ?>&nbsp;</td>
				<td><?php echo h($trip['Trip']['direction_id']); ?>&nbsp;</td>
				<td><?php echo h($trip['Trip']['block_id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($trip['Shape']['id'], array('controller' => 'shapes', 'action' => 'view', $trip['Shape']['id'])); ?>
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $trip['Trip']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trip['Trip']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trip['Trip']['id']), null, __('Are you sure you want to delete # %s?', $trip['Trip']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Routes')), array('controller' => 'routes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Route')), array('controller' => 'routes', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Shapes')), array('controller' => 'shapes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Shape')), array('controller' => 'shapes', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Stop Times')), array('controller' => 'stop_times', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('controller' => 'stop_times', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>