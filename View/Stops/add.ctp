<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Stop', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Stop')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('code');
				echo $this->BootstrapForm->input('name');
				echo $this->BootstrapForm->input('description');
				echo $this->BootstrapForm->input('lat');
				echo $this->BootstrapForm->input('lon');
				echo $this->BootstrapForm->input('zone_id');
				echo $this->BootstrapForm->input('url');
				echo $this->BootstrapForm->input('location_type');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Stops')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Stop Times')), array('controller' => 'stop_times', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Stop Time')), array('controller' => 'stop_times', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>