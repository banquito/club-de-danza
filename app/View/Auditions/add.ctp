<?php echo $this->Html->script(array('ncEditor', 'vendors/nicEdit'), array('inline'=>false)); ?>

<div class="row row-header-h1">
	<div class="col-sm-12">
		<h1><?php echo __('Add Audition'); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->Form->create('Audition', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file')) ?>
			<div class="form-group">
				<label for="title" class="col-sm-4 control-label"><?php echo __('Title'); ?></label>
				<div class="col-sm-8">
					<?php	echo $this->Form->input('title', array(
						'class' => 'form-control',
						'label' => false,
						'placeholder' => __('Audition title'),
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
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Image'); ?></label>
				<div class="col-sm-8">
					<?php echo $this->Form->input('image', array(
						'class' => 'btn btn-default col-sm-12',
						'label' => false,
						'placeholder' => __('Image'),
						'required' => 'required',
						'type' => 'file'
					));
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Company'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Gender'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Age start'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Age end'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Audition date'); ?></label>
				<div class="col-sm-8">
					<div class='input-group date' id='datetimepickerAudition'>
						<span class="input-group-addon">
							<span data-icon-element="" class="fa fa-calendar"></span>
						</span>
						<!-- <input type='text' class="form-control" data-ng-keydown="birthdayKeydown($event)" name="data[User][birthday]" /> -->
						<?php echo $this->Form->input('element-date', array(
							'class' => 'form-control',
							'label' => false,
							'placeholder' => __('Audition date'),
							'type' => 'text'
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Street'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Floor'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Department'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Inscription start'); ?></label>
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
							'type' => 'text'
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Inscription end'); ?></label>
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
							'type' => 'text'
							// 'required' => 'required',
						));
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Inscription place'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Website'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Email'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Phone'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('State'); ?></label>
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
				<label for="image" class="col-sm-4 control-label"><?php echo __('Dancestyle'); ?></label>
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
			<div class="form-group">
				<label for="image" class="col-sm-4 control-label"><?php echo __('Profession'); ?></label>
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