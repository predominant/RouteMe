<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Trip', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Trip')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('route_id');
				echo $this->BootstrapForm->input('service_id');
				echo $this->BootstrapForm->input('trip_id');
				echo $this->BootstrapForm->input('trip_headsign');
				echo $this->BootstrapForm->input('direction_id');
				echo $this->BootstrapForm->input('block_id');
				echo $this->BootstrapForm->input('shape_id');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Routes')), array('controller' => 'routes', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Route')), array('controller' => 'routes', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Shapes')), array('controller' => 'shapes', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Shape')), array('controller' => 'shapes', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Stop Times')), array('controller' => 'stop_times', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('controller' => 'stop_times', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>