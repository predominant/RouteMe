<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Shape', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Shape')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('lat');
				echo $this->BootstrapForm->input('lon');
				echo $this->BootstrapForm->input('sequence');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Shapes')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>