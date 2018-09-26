<?php $__env->startSection('title', '| Login'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php echo Form::open(); ?>


			<?php echo e(Form::lablel('name', 'Name:')); ?>

			<?php echo e(Form::email('text', null, ['class' => 'form-control'])); ?>


			<?php echo e(Form::lablel('email', 'Email:')); ?>

			<?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>


			<?php echo e(Form::lablel('password', "Password:")); ?>

			<?php echo e(Form::lablel('password', ['class' => 'form-control'])); ?>


			<?php echo e(Form::lablel('password_confirmation', "Comfirm Password:")); ?>

			<?php echo e(Form::lablel('password', ['class' => 'form-control'])); ?>


			<?php echo e(Form::submit('Register', ['class' => 'btn btn-primary btn-block form-spacing-top'])); ?>

		</div>
	</div>
	<?php echo Form::close; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>