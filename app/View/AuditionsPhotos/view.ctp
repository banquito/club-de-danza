<div class="auditionsPhotos view">
<h2><?php echo __('Auditions Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($auditionsPhoto['AuditionsPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsPhoto['Audition']['title'], array('controller' => 'auditions', 'action' => 'view', $auditionsPhoto['Audition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsPhoto['Photo']['name'], array('controller' => 'photos', 'action' => 'view', $auditionsPhoto['Photo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($auditionsPhoto['AuditionsPhoto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($auditionsPhoto['AuditionsPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditionsPhoto['User']['name'], array('controller' => 'users', 'action' => 'view', $auditionsPhoto['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Auditions Photo'), array('action' => 'edit', $auditionsPhoto['AuditionsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Auditions Photo'), array('action' => 'delete', $auditionsPhoto['AuditionsPhoto']['id']), null, __('Are you sure you want to delete # %s?', $auditionsPhoto['AuditionsPhoto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions Photos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auditions Photo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Auditions'), array('controller' => 'auditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audition'), array('controller' => 'auditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
