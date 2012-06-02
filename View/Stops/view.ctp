<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Stop');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Code'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['code']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Description'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['description']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Lat'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['lat']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Lon'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['lon']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Zone Id'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['zone_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Url'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['url']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Location Type'); ?></dt>
			<dd>
				<?php echo h($stop['Stop']['location_type']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Stop')), array('action' => 'edit', $stop['Stop']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Stop')), array('action' => 'delete', $stop['Stop']['id']), null, __('Are you sure you want to delete # %s?', $stop['Stop']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Stops')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Stop Times')), array('controller' => 'stop_times', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('controller' => 'stop_times', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
<div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Stop Times')); ?></h3>
	<?php if (!empty($stop['StopTime'])):?>
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
		<?php foreach ($stop['StopTime'] as $stopTime): ?>
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
