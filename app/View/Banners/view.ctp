<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo h($banner['Banner']['title']); ?></h1>
		<div></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo $this -> Time -> format('d-m-Y', h($banner['Banner']['created'])); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo h($banner['Banner']['link']); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php $image = '/' . IMAGES_URL . ($banner['Banner']['image'] ? 'banners/'.$banner['Banner']['image'] : 'layouts/sinfoto.jpg'); ?>
		<img alt="imagen-nota" class="img-responsive" src="<?php echo $image; ?>" />
	</div>
</div>




<div class="banners view">
<h2><?php echo __('Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($banner['User']['name'], array('controller' => 'users', 'action' => 'view', $banner['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bannercategories'), array('controller' => 'bannercategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bannercategory'), array('controller' => 'bannercategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bannercategories'); ?></h3>
	<?php if (!empty($banner['Bannercategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($banner['Bannercategory'] as $bannercategory): ?>
		<tr>
			<td><?php echo $bannercategory['id']; ?></td>
			<td><?php echo $bannercategory['name']; ?></td>
			<td><?php echo $bannercategory['created']; ?></td>
			<td><?php echo $bannercategory['modified']; ?></td>
			<td><?php echo $bannercategory['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bannercategories', 'action' => 'view', $bannercategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bannercategories', 'action' => 'edit', $bannercategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bannercategories', 'action' => 'delete', $bannercategory['id']), null, __('Are you sure you want to delete # %s?', $bannercategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bannercategory'), array('controller' => 'bannercategories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
