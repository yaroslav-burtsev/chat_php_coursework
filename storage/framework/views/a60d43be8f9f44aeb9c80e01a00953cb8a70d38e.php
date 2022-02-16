<?php $__env->startSection('head-block'); ?>
<title>Contacts</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h1>Contact page</h1>
<form action="<?php echo e(route('contact-form')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <button type="submit">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/contact.blade.php ENDPATH**/ ?>