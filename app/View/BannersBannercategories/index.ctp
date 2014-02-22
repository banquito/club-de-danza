<div class="bannersBannercategories index">
	<h2><?php echo __('Banners Bannercategories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('banner_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bannercategory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bannersBannercategories as $bannersBannercategory): ?>
	<tr>
		<td><?php echo h($bannersBannercategory['BannersBannercategory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bannersBannercategory['Banner']['title'], array('controller' => 'banners', 'action' => 'view', $bannersBannercategory['Banner']['id'])); ?>
		</td>
		<td><?php echo h($bannersBannercategory['BannersBannercategory']['bannercategory_id']); ?>&nbsp;</td>
		<td><?php echo h($bannersBannercategory['BannersBannercategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($bannersBannercategory['BannersBannercategory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bannersBannercategory['BannersBannercategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bannersBannercategory['BannersBannercategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bannersBannercategory['BannersBannercategory']['id']), null, __('Are you sure you want to delete # %s?', $bannersBannercategory['BannersBannercategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Banners Bannercategory'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Banners'), array('controller' => 'banners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('controller' => 'banners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bannercategories'), array('controller' => 'bannercategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bannercategorie'), array('controller' => 'bannercategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
