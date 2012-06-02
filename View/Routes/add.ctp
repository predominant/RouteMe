<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Route', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Route')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('short_name');
				echo $this->BootstrapForm->input('name');
				echo $this->BootstrapForm->input('description');
				echo $this->BootstrapForm->input('type');
				echo $this->BootstrapForm->input('url');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Routes')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>