<?php $__env->startSection('title', '| Contact'); ?>

<?php $__env->startSection('content'); ?>

            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Me</h1>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label name="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>

                         <div class="form-group">
                            <label name="subject">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>

                         <div class="form-group">
                            <label name="message">Message:</label>
                            <textarea type="text" id="message" name="message" rows="5" class="form-control">Type your message here...</textarea>
                        </div>

                        <input type="submit" value="Send Message" class="btn btn-success">
                    </form>
                </div>
            </div> <!--end of row--> 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>