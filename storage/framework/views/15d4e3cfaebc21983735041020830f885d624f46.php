<?php $__env->startSection('head-block'); ?>
<title>Web Chat</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    LaravelChat
    <div class='links'>
        <a href='<?php echo e(route("reg")); ?>' >Register</a>
        <br/>
        <a href='<?php echo e(route("login")); ?>'>Login</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/index.blade.php ENDPATH**/ ?>