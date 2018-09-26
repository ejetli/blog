<?php $__env->startSection('title', '| Ceate New Post'); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			<form name="ceate" action="/posts"  method="post">
                <?php echo e(csrf_field()); ?>

				<div class="form-group">
					<label for="title">Titel</label>
					<input type="text" name="title" required id="title" class="form-control" placeholder="Titel">
				</div>
				<div class="form-group">
					<label for="slug">Slug</label>
					<input type="slug" name="slug" required id="slug" class="form-control" placeholder="Slug" maxlength="255" minlength="5">
				</div>

				<div class="form-group">
					<label for="category_id">Category</label>
					<select class="form-control" name="category_id">
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea name="body" id="body" required class="form-control" rows="5" placeholder="Body"></textarea>
				</div>
				<input class="btn btn-success btn-lg btn-block" type="submit" value="Create post">
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<!--<?php $__env->startSection('scripts'); ?>
   <script>
   	 onsubmit="return validateForm()"
    function validateForm() {
        var x = document.forms["create"]["title"].value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
    }
   </script>

<?php $__env->stopSection(); ?>

-->




<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>