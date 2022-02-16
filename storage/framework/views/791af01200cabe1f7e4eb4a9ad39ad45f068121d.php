<?php $__env->startSection('head-block'); ?>
<title>Main</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h1>Main Page</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('aside'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('aside'); ?>
<p>Additional text</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/home.blade.php ENDPATH**/ ?>