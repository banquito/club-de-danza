<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="registerTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="registerTitle"><?php echo __('Register') ?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->create('User', array('action' => 'add', 'class' => 'form-horizontal', 'role' => 'form')); ?>
					<div class="form-group">
						<label for="username" class="col-sm-3 control-label">Nombre de Usuario</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('username', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">Contraseña</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('password', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-sm-3 control-label">Apellido</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('lastname', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="gender" class="col-sm-3 control-label">Sexo</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('gender', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="birthday" class="col-sm-3 control-label">Cumpleaños</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('birthday', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>FALSE)); ?>
						</div>
					</div>
				<?php echo $this->Form->end(__('Submit')); ?>
			</div>
		</div>
	</div>
</div>