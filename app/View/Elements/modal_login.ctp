<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-login">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center" id="loginTitle"><?php echo __('Login') ?></h4>
			</div>
			<div class="modal-body">
				<?php echo $this->Form->create('User', array('action' => 'login', 'class' => 'form-horizontal', 'role' => 'form')) ?>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label"><?php echo __('Email'); ?></label>
						<div class="col-sm-8">
							<?php	echo $this->Form->input('email', array(
								'class' => 'form-control',
								'label' => false,
								'placeholder' => __('Email'),
								'required' => 'required',
								'type' => 'text'
							));
					 		?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"><?php echo __('Password'); ?></label>
						<div class="col-sm-8">
							<?php echo $this->Form->input('password', array(
								'class' => 'form-control',
								'label' => false,
								'placeholder' => __('Password'),
								'required' => 'required',
								'type' => 'password'
							));
							?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-4">
							<button type="submit" class="btn btn-default col-sm-12"><?php echo __('Accept'); ?></button>
						</div>
						<div class="col-sm-4">
							<button type="button" class="btn btn-default col-sm-12" data-dismiss="modal"><?php echo __('Close') ?></button>
						</div>
					</div>
				<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>