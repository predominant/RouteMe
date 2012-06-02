<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Shape', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Edit %s', __('Shape')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('lat');
				echo $this->BootstrapForm->input('lon');
				echo $this->BootstrapForm->input('sequence');
				echo $this->BootstrapForm->hidden('id');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Shape.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Shape.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Shapes')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Trips')), array('controller' => 'trips', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Trip')), array('controller' => 'trips', 'action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>