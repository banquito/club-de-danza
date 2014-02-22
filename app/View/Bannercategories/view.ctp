<div class="bannercategories view">
<h2><?php echo __('Bannercategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bannercategory['Bannercategory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bannercategory['User']['name'], array('controller' => 'users', 'action' => 'view', $bannercategory['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bannercategory'), array('action' => 'edit', $bannercategory['Bannercategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bannercategory'), array('action' => 'delete', $bannercategory['Bannercategory']['id']), null, __('Are you sure you want to delete # %s?', $bannercategory['Bannercategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bannercategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bannercategory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('controller' => 'banners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('controller' => 'banners', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Banners'); ?></h3>
	<?php if (!empty($bannercategory['Banner'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bannercategory['Banner'] as $banner): ?>
		<tr>
			<td><?php echo $banner['id']; ?></td>
			<td><?php echo $banner['title']; ?></td>
			<td><?php echo $banner['image']; ?></td>
			<td><?php echo $banner['link']; ?></td>
			<td><?php echo $banner['published']; ?></td>
			<td><?php echo $banner['created']; ?></td>
			<td><?php echo $banner['modified']; ?></td>
			<td><?php echo $banner['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'banners', 'action' => 'view', $banner['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'banners', 'action' => 'edit', $banner['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'banners', 'action' => 'delete', $banner['id']), null, __('Are you sure you want to delete # %s?', $banner['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Banner'), array('controller' => 'banners', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
