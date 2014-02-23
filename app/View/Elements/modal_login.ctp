<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="loginTitle"><?php echo __('Login') ?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->create('User', array('action' => 'login', 'class' => 'form-horizontal', 'role' => 'form')) ?>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label"><?php echo __('Nombre de Usuario'); ?></label>
						<div class="col-sm-4">
							<?php	echo $this->Form->input('username', array(
								'class' => 'form-control',
								'label' => false,
								'placeholder' => __('Nombre de Usuario'),
								'required' => 'required',
								'type' => 'text'
							));
					 		?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label"><?php echo __('Contraseña'); ?></label>
						<div class="col-sm-4">
							<?php echo $this->Form->input('password', array(
								'class' => 'form-control',
								'label' => false,
								'placeholder' => __('Contraseña'),
								'required' => 'required',
								'type' => 'password'
							));
							?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-2">
							<button type="submit" class="btn btn-default"><?php echo __('Aceptar'); ?></button>
						</div>
						<div class="col-sm-2">
							<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close') ?></button>
						</div>
					</div>
				<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>