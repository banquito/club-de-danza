<?php 
// $sections = array('1' => 'Audición', '2' => 'Convocatoria');
// /datos/Documentos/Colectivo Libre/Workspace/club-de-danza/app/webroot/js/angular/controllers/homesearches_controller.js
?>
<?php echo $this->Html->script(array('angular/controllers/homesearches_controller'), array('inline'=>false)); ?>

<div class="row" data-ng-controller="HomesearchesController">
	<div class="col-sm-12">
		<h1>Administrador de Secciones</h1>
		
		<?php echo $this->Form->create('Homesearch', array('action' => 'admin', 'data-ng-submit' => 'submit($event)', 'name'=>'registerForm', 'role' => 'form')); ?>
		<?php //echo $this->Form->create('User', array('action' => 'add', 'class' => 'form-horizontal', 'data-ng-submit' => 'submit($event)', 'name'=>'registerForm', 'role' => 'form')); ?>
			
			<!-- Caja -->
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Caja</label>
						<div class="col-sm-8">
							<?php echo $this->Form->select('caja'
								, array()
								, array('class' => 'form-control'
									, 'data-ng-cloak'
									, 'data-ng-model' => 'caja'
									, 'data-ng-options' => 'c as c.title for c in cajas'
									, 'label' => false
							));
					 		?>
						</div>
					</div>
				</div>
			</div>

			<!-- Sección -->
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Sección</label>
						<div class="col-sm-8">
							<?php echo $this->Form->select('section'
								// , $sections
								, array()
								, array('class' => 'form-control'
									, 'data-ng-cloak'
									, 'data-ng-model' => 'section'
									, 'data-ng-options' => 's as s.title for s in sections'
									, 'label' => false
							));
					 		?>
						</div>
					</div>
				</div>
			</div>

			<!-- Subseccion -->
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Sub-Sección</label>
						<div class="col-sm-8">
							<?php echo $this->Form->select('subsection'
								, array()
								, array('class' => 'form-control'
									, 'data-ng-cloak'
									, 'data-ng-model' => 'section.subsection'
									, 'data-ng-options' => 'sub as sub.title for sub in section.subsections'
									, 'label' => false
							));
					 		?>
						</div>
					</div>
				</div>
			</div>

			<!-- Elementos -->
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Elementos</label>
						<div class="col-sm-8">
							<?php echo $this->Form->select('element'
								, array()
								, array('class' => 'form-control'
									, 'data-ng-cloak'
									, 'data-ng-model' => 'element'
									, 'data-ng-options' => 'e as e.name for e in section.elements'
									, 'label' => false
							));
					 		?>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2 col-sm-offset-3">
					<button type="submit"><?php echo __('Submit') ?></button>
				</div>
				<div class="col-sm-7 alert alert-danger" data-ng-show="errorMessage" data-ng-cloak>
					<span data-ng-bind="errorMessage"></span>
				</div>
			</div>

			<?php echo $this->Form->end(); ?>

	</div>
</div>