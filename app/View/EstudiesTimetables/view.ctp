<div class="estudiesTimetables view">
<h2><?php echo __('Estudies Timetable'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estudiesTimetable['EstudiesTimetable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estudy'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesTimetable['Estudy']['name'], array('controller' => 'estudies', 'action' => 'view', $estudiesTimetable['Estudy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timetable'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estudiesTimetable['Timetable']['name'], array('controller' => 'timetables', 'action' => 'view', $estudiesTimetable['Timetable']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estudiesTimetable['EstudiesTimetable']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estudiesTimetable['EstudiesTimetable']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estudies Timetable'), array('action' => 'edit', $estudiesTimetable['EstudiesTimetable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estudies Timetable'), array('action' => 'delete', $estudiesTimetable['EstudiesTimetable']['id']), null, __('Are you sure you want to delete # %s?', $estudiesTimetable['EstudiesTimetable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies Timetables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudies Timetable'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('controller' => 'estudies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudy'), array('controller' => 'estudies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timetables'), array('controller' => 'timetables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timetable'), array('controller' => 'timetables', 'action' => 'add')); ?> </li>
	</ul>
</div>
