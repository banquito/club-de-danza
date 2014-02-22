<div class="bannersBannercategories view">
<h2><?php echo __('Banners Bannercategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bannersBannercategory['BannersBannercategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banner'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bannersBannercategory['Banner']['title'], array('controller' => 'banners', 'action' => 'view', $bannersBannercategory['Banner']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bannercategory Id'); ?></dt>
		<dd>
			<?php echo h($bannersBannercategory['BannersBannercategory']['bannercategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bannersBannercategory['BannersBannercategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bannersBannercategory['BannersBannercategory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banners Bannercategory'), array('action' => 'edit', $bannersBannercategory['BannersBannercategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banners Bannercategory'), array('action' => 'delete', $bannersBannercategory['BannersBannercategory']['id']), null, __('Are you sure you want to delete # %s?', $bannersBannercategory['BannersBannercategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners Bannercategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banners Bannercategory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('controller' => 'banners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('controller' => 'banners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bannercategories'), array('controller' => 'bannercategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bannercategorie'), array('controller' => 'bannercategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
