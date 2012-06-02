<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Route');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($route['Route']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Short Name'); ?></dt>
			<dd>
				<?php echo h($route['Route']['short_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($route['Route']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Description'); ?></dt>
			<dd>
				<?php echo h($route['Route']['description']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Type'); ?></dt>
			<dd>
				<?php echo h($route['Route']['type']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Url'); ?></dt>
			<dd>
				<?php echo h($route['Route']['url']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Route')), array('action' => 'edit', $route['Route']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Route')), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Routes')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Route')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
<div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Trips')); ?></h3>
	<?php if (!empty($route['Trip'])):?>
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
		<?php foreach ($route['Trip'] as $trip): ?>
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
