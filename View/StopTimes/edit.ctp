<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('StopTime', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Edit %s', __('Stop Time')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('trip_id');
				echo $this->BootstrapForm->input('arrival_time');
				echo $this->BootstrapForm->input('departure_time');
				echo $this->BootstrapForm->input('stop_id');
				echo $this->BootstrapForm->input('stop_sequence');
				echo $this->BootstrapForm->input('pickup_type');
				echo $this->BootstrapForm->input('drop_off_type');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StopTime.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StopTime.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Stop Times')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Stops')), array('controller' => 'stops', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop')), array('controller' => 'stops', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>