<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Stop Times'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('trip_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('arrival_time');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('departure_time');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('stop_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('stop_sequence');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('pickup_type');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('drop_off_type');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($stopTimes as $stopTime): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($stopTime['Trip'][''], array('controller' => 'trips', 'action' => 'view', $stopTime['Trip']['id'])); ?>
				</td>
				<td><?php echo h($stopTime['StopTime']['arrival_time']); ?>&nbsp;</td>
				<td><?php echo h($stopTime['StopTime']['departure_time']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($stopTime['Stop']['name'], array('controller' => 'stops', 'action' => 'view', $stopTime['Stop']['id'])); ?>
				</td>
				<td><?php echo h($stopTime['StopTime']['stop_sequence']); ?>&nbsp;</td>
				<td><?php echo h($stopTime['StopTime']['pickup_type']); ?>&nbsp;</td>
				<td><?php echo h($stopTime['StopTime']['drop_off_type']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $stopTime['StopTime']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stopTime['StopTime']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stopTime['StopTime']['id']), null, __('Are you sure you want to delete # %s?', $stopTime['StopTime']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Stops')), array('controller' => 'stops', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop')), array('controller' => 'stops', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>