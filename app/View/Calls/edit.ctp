<?php echo $this->Html->script(array('ncEditor', 'vendors/nicEdit', 'mapadeladanza'), array('inline'=>false)); ?>
<?php echo $this->Html->scriptBlock('videoAux='.sizeof($this->request->data['Video'])); ?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Edit Call'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Call', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<?php echo $this->Form->input('id'); ?>
			
			<div class="form-group">
				<label for="title" class="col-sm-4 control-label"><?php echo __('Title'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('title', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Call title'),
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
							<span class="label <?php echo ($this->request->data['Call']['image']) ? 'label-primary' : 'label-danger'; ?>">
								<?php echo ($imageName = $this->request->data['Call']['image']) ? $imageName : __('No image'); ?>
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
			<!-- Photos -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Photos'); ?></label>
				<div class="col-sm-7">
					<div class="row row-image-name">
						<div class="col-sm-12">
							<!-- <span class="label <?php //echo ($this->request->data['Practiceroom']['image']) ? 'label-primary' : 'label-danger'; ?>">
								<?php //echo ($imageName = $this->request->data['Practiceroom']['image']) ? $imageName : __('No image'); ?>
							</span> -->

							<?php if(isset($this->request->data['Photo']) && sizeof($this->request->data['Photo']) > 0): ?>
									<?php foreach ($this->request->data['Photo'] as $key => $photo): ?>
										<span class="label label-primary"><?php echo $photo['name']; ?> | 
											<?php
											echo $this->Html->Link('x'
												, array('controller' => 'CallsPhotos'
													, 'action' => 'remove'
													, $photo['CallsPhoto']['id']
												)
											);
											?></span>
										&nbsp;
									<?php endforeach; ?>
							<?php endif; ?>


						</div>
					</div>
					<div class="row">
						<div class="col-sm-12" id="photos">
							<input type="file" class="btn btn-default" name="data[Photo][]">
						</div>
					</div>
				</div>
				<div class="col-sm-1">
					<button id="morePhotos" type="button" class="btn btn-default">+</button>
				</div>
			</div>
			<div class="form-group">
				<label for="company" class="col-sm-4 control-label"><?php echo __('Company'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('company', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Company'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="gender" class="col-sm-4 control-label"><?php echo __('Gender'); ?></label>
				<div class="col-sm-8">
					<?php 
					echo $this->Form->input('gender', array('class'=>'form-control'
						, 'label' => FALSE
						, 'options' => array('Femenino', 'Masculino', 'Otro')
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="age-start" class="col-sm-4 control-label"><?php echo __('Age start'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('age-start', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Age start'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="age-end" class="col-sm-4 control-label"><?php echo __('Age end'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('age-end', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Age end'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="element-date" class="col-sm-4 control-label"><?php echo __('Call date'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerCall'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('element-date', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Call date'),
							'type' => 'text',
							'value' => $this->Time->format('d/m/Y h:i', $this->request->data['Call']['element-date'])
							// 'required' => 'required',
						));
						?>
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
			<div class="form-group">
				<label for="inscription-start" class="col-sm-4 control-label"><?php echo __('Inscription start'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerInscriptionStart'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('inscription-start', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Inscription start'),
							'type' => 'text',
							'value' => $this->Time->format('d/m/Y h:i', $this->request->data['Call']['inscription-start'])
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="inscription-end" class="col-sm-4 control-label"><?php echo __('Inscription end'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerInscriptionEnd'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('inscription-end', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Inscription end'),
							'type' => 'text',
							'value' => $this->Time->format('d/m/Y h:i', $this->request->data['Call']['inscription-end'])
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="inscription-place" class="col-sm-4 control-label"><?php echo __('Inscription place'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('inscription-place', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Inscription place'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
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
												, array('controller' => 'CallsVideos'
													, 'action' => 'remove'
													, $video['CallsVideo']['id']
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

			<!-- Attachment -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Attachment'); ?></label>
				<div class="col-sm-7">
					<div class="row row-image-name">
						<div class="col-sm-12">
							<?php if(isset($this->request->data['Attachment']) && sizeof($this->request->data['Attachment']) > 0): ?>
									<?php foreach ($this->request->data['Attachment'] as $key => $attachment): ?>
										<span class="label label-primary"><?php echo $attachment['name']; ?> | 
											<?php
											echo $this->Html->Link('x'
												, array('controller' => 'AttachmentsCalls'
													, 'action' => 'remove'
													, $attachment['AttachmentsCall']['id']
												)
											);
											?></span>
										&nbsp;
									<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12" id="attachments">
							<input type="file" class="btn btn-default" name="data[Attachment][]">
						</div>
					</div>
				</div>
				<div class="col-sm-1">
					<button id="moreAttachments" type="button" class="btn btn-default">+</button>
				</div>
			</div>

			<!-- Profession -->
			<div class="form-group">
				<label for="Profession" class="col-sm-4 control-label"><?php echo __('Profession'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('Profession', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Profession'),
						// 'required' => 'required',
					));
					?>
				</div>
			</div>
			
			<!-- Salient -->
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Salient'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->checkbox('salient', array(
						'class' => 'form-control',
						'label' => false,
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


<!-- <div class="calls form">
<?php echo $this->Form->create('Call'); ?>
	<fieldset>
		<legend><?php echo __('Edit Call'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('image');
		echo $this->Form->input('company');
		echo $this->Form->input('gender');
		echo $this->Form->input('age-start');
		echo $this->Form->input('age-end');
		echo $this->Form->input('element-date');
		echo $this->Form->input('street');
		echo $this->Form->input('floor');
		echo $this->Form->input('department');
		echo $this->Form->input('inscription-date-start');
		echo $this->Form->input('inscription-date-end');
		echo $this->Form->input('inscription-place');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('state_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Dancestyle');
		echo $this->Form->input('Profession');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Call.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Call.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calls'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dancestyles'), array('controller' => 'dancestyles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dancestyle'), array('controller' => 'dancestyles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professions'), array('controller' => 'professions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profession'), array('controller' => 'professions', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->