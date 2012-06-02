<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Stops'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('code');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('description');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('lat');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('lon');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('zone_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('url');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('location_type');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($stops as $stop): ?>
			<tr>
				<td><?php echo h($stop['Stop']['id']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['code']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['name']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['description']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['lat']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['lon']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['zone_id']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['url']); ?>&nbsp;</td>
				<td><?php echo h($stop['Stop']['location_type']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $stop['Stop']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stop['Stop']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stop['Stop']['id']), null, __('Are you sure you want to delete # %s?', $stop['Stop']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New %s', __('Stop')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Stop Times')), array('controller' => 'stop_times', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('controller' => 'stop_times', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>