<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Routes'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('short_name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('description');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('type');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('url');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($routes as $route): ?>
			<tr>
				<td><?php echo h($route['Route']['id']); ?>&nbsp;</td>
				<td><?php echo h($route['Route']['short_name']); ?>&nbsp;</td>
				<td><?php echo h($route['Route']['name']); ?>&nbsp;</td>
				<td><?php echo h($route['Route']['description']); ?>&nbsp;</td>
				<td><?php echo h($route['Route']['type']); ?>&nbsp;</td>
				<td><?php echo h($route['Route']['url']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $route['Route']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $route['Route']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Route')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>