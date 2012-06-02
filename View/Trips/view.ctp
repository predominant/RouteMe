<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Trip');?></h2>
		<dl>
			<dt><?php echo __('Route'); ?></dt>
			<dd>
				<?php echo $this->Html->link($trip['Route']['name'], array('controller' => 'routes', 'action' => 'view', $trip['Route']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Service Id'); ?></dt>
			<dd>
				<?php echo h($trip['Trip']['service_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Trip'); ?></dt>
			<dd>
				<?php echo $this->Html->link($trip['Trip'][''], array('controller' => 'trips', 'action' => 'view', $trip['Trip']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Trip Headsign'); ?></dt>
			<dd>
				<?php echo h($trip['Trip']['trip_headsign']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Direction Id'); ?></dt>
			<dd>
				<?php echo h($trip['Trip']['direction_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Block Id'); ?></dt>
			<dd>
				<?php echo h($trip['Trip']['block_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Shape'); ?></dt>
			<dd>
				<?php echo $this->Html->link($trip['Shape']['id'], array('controller' => 'shapes', 'action' => 'view', $trip['Shape']['id'])); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Trip')), array('action' => 'edit', $trip['Trip']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Trip')), array('action' => 'delete', $trip['Trip']['id']), null, __('Are you sure you want to delete # %s?', $trip['Trip']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('action' => 'add')); ?> </li>
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
<div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Stop Times')); ?></h3>
	<?php if (!empty($trip['StopTime'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Trip Id'); ?></th>
				<th><?php echo __('Arrival Time'); ?></th>
				<th><?php echo __('Departure Time'); ?></th>
				<th><?php echo __('Stop Id'); ?></th>
				<th><?php echo __('Stop Sequence'); ?></th>
				<th><?php echo __('Pickup Type'); ?></th>
				<th><?php echo __('Drop Off Type'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($trip['StopTime'] as $stopTime): ?>
			<tr>
				<td><?php echo $stopTime['trip_id'];?></td>
				<td><?php echo $stopTime['arrival_time'];?></td>
				<td><?php echo $stopTime['departure_time'];?></td>
				<td><?php echo $stopTime['stop_id'];?></td>
				<td><?php echo $stopTime['stop_sequence'];?></td>
				<td><?php echo $stopTime['pickup_type'];?></td>
				<td><?php echo $stopTime['drop_off_type'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'stop_times', 'action' => 'view', $stopTime['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'stop_times', 'action' => 'edit', $stopTime['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stop_times', 'action' => 'delete', $stopTime['id']), null, __('Are you sure you want to delete # %s?', $stopTime['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('controller' => 'stop_times', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Trips')); ?></h3>
	<?php if (!empty($trip['Trip'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Route Id'); ?></th>
				<th><?php echo __('Service Id'); ?></th>
				<th><?php echo __('Trip Id'); ?></th>
				<th><?php echo __('Trip Headsign'); ?></th>
				<th><?php echo __('Direction Id'); ?></th>
				<th><?php echo __('Block Id'); ?></th>
				<th><?php echo __('Shape Id'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($trip['Trip'] as $trip): ?>
			<tr>
				<td><?php echo $trip['route_id'];?></td>
				<td><?php echo $trip['service_id'];?></td>
				<td><?php echo $trip['trip_id'];?></td>
				<td><?php echo $trip['trip_headsign'];?></td>
				<td><?php echo $trip['direction_id'];?></td>
				<td><?php echo $trip['block_id'];?></td>
				<td><?php echo $trip['shape_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'trips', 'action' => 'view', $trip['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'trips', 'action' => 'edit', $trip['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trips', 'action' => 'delete', $trip['id']), null, __('Are you sure you want to delete # %s?', $trip['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
