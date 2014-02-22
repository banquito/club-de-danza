<div class="bannersBannercategories form">
<?php echo $this->Form->create('BannersBannercategory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Banners Bannercategory'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('banner_id');
		echo $this->Form->input('bannercategory_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BannersBannercategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BannersBannercategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Banners Bannercategories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Banners'), array('controller' => 'banners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('controller' => 'banners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bannercategories'), array('controller' => 'bannercategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bannercategorie'), array('controller' => 'bannercategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
