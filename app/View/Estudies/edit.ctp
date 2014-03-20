<?php //debug($this->request->data, $showHtml = null, $showFrom = true) ?>
<?php echo $this->Html->script(array('ncEditor', 'vendors/nicEdit', 'mapadeladanza'), array('inline'=>false)); ?>
<?php echo $this->Html->scriptBlock('videoAux='.sizeof($this->request->data['Video'])); ?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Edit Estudy'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Estudy', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<?php echo $this->Form->input('id'); ?>
			
			<div class="form-group">
				<label for="name" class="col-sm-4 control-label"><?php echo __('Name'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('name', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Estudy name'),
						'required' => 'required',
						'maxlength' => 50,
						'type' => 'text'
					));
			 		?>
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-4 control-label"><?php echo __('Description'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('description', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Description'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			
			<!-- Imagen -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Image'); ?></label>
				<div class="col-sm-8">
					<div class="row row-image-name">
						<div class="col-sm-12">
							<span class="label <?php echo ($this->request->data['Estudy']['image']) ? 'label-primary' : 'label-danger'; ?>">
								<?php echo ($imageName = $this->request->data['Estudy']['image']) ? $imageName : __('No image'); ?>
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<?php echo $this->Form->input('image', array(
								'label' => false,
								'placeholder' => __('Image'),
								'required' => FALSE,
								'type' => 'file'
							));
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="street" class="col-sm-4 control-label"><?php echo __('Street'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('street', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Street'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="floor" class="col-sm-4 control-label"><?php echo __('Floor'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('floor', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Floor'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="department" class="col-sm-4 control-label"><?php echo __('Department'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('department', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Department'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<!-- <div class="form-group">
				<label for="timetable" class="col-sm-4 control-label"><?php echo __('Timetable'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('timetable', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Timetable'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div> -->

			<!-- Timetables -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Timetable'); ?></label>
				<div class="col-sm-7">
					<div class="row row-image-name">
						<div class="col-sm-12">
							<!-- <span class="label <?php //echo ($this->request->data['Practiceroom']['image']) ? 'label-primary' : 'label-danger'; ?>">
								<?php //echo ($imageName = $this->request->data['Practiceroom']['image']) ? $imageName : __('No image'); ?>
							</span> -->

							<?php if(isset($this->request->data['Timetable']) && sizeof($this->request->data['Timetable']) > 0): ?>
									<?php foreach ($this->request->data['Timetable'] as $key => $timetable): ?>
										<span class="label label-primary"><?php echo $timetable['name']; ?> | 
											<?php
											echo $this->Html->Link('x'
												, array('controller' => 'EstudiesTimetables'
													, 'action' => 'remove'
													, $timetable['EstudiesTimetable']['id']
												)
											);
											?></span>
										&nbsp;
									<?php endforeach; ?>
							<?php endif; ?>


						</div>
					</div>
					<div class="row">
						<div class="col-sm-12" id="timeTables">
							<input type="file" class="btn btn-default" name="data[Timetable][]">
						</div>
					</div>
				</div>
				<div class="col-sm-1">
					<button id="moreTimeTables" type="button" class="btn btn-default">+</button>
				</div>
			</div>

			<!-- Website -->
			<div class="form-group">
				<label for="website" class="col-sm-4 control-label"><?php echo __('Website'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('website', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Website'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-4 control-label"><?php echo __('Email'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('email', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Email'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-4 control-label"><?php echo __('Phone'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('phone', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Phone'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="state_id" class="col-sm-4 control-label"><?php echo __('State'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('state_id', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('State'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="Dancestyle" class="col-sm-4 control-label"><?php echo __('Dancestyle'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('Dancestyle', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Dancestyle'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			
			<!-- Videos -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Video'); ?></label>
				<div class="col-sm-7">
					<div class="row row-image-name">
						<div class="col-sm-12">
							<?php if(isset($this->request->data['Video']) && sizeof($this->request->data['Video']) > 0): ?>
									<?php foreach ($this->request->data['Video'] as $key => $video): ?>
										<span class="label label-primary"><?php echo $video['name']; ?> | 
											<?php
											echo $this->Html->Link('x'
												, array('controller' => 'EstudiesVideos'
													, 'action' => 'remove'
													, $video['EstudiesVideo']['id']
												)
											);
											?></span>
										&nbsp;
									<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12" id="videos">
							<input type="text" class="col-sm-6" name="data[Video][<?php echo sizeof($this->request->data['Video']) ?>][name]" placeholder="Nombre">
							<input type="text" class="col-sm-6" name="data[Video][<?php echo sizeof($this->request->data['Video']) ?>][file]" placeholder="Video">
						</div>
					</div>
				</div>
				<div class="col-sm-1">
					<button id="moreVideos" type="button" class="btn btn-default">+</button>
				</div>
			</div>

			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Paid'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('paid', array(
						'class' => 'form-control',
						'label' => false,
						// 'placeholder' => __('Paid'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-2">
					<button type="submit" class="btn btn-default"><?php echo __('Aceptar'); ?></button>
				</div>
				<div class="col-sm-offset-4 col-sm-2">
					<a href="/notas/listar" class="btn btn-default"><?php echo __('Cancelar'); ?></a>
				</div>
			</div>
		<?php echo $this->Form->end() ?>
	</div>
</div>


<!-- <div class="estudies form">
<?php echo $this->Form->create('Estudy'); ?>
	<fieldset>
		<legend><?php echo __('Edit Estudy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('image');
		echo $this->Form->input('street');
		echo $this->Form->input('floor');
		echo $this->Form->input('department');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('timetable');
		echo $this->Form->input('paid');
		echo $this->Form->input('state_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Dancestyle');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Estudy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Estudy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Estudies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->