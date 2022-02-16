<?php $__env->startSection('head-block'); ?>
<title>Login</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-name'); ?>
<h1>LogIn</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('form-arguments'); ?>
<form action="<?php echo e(route('login-done')); ?>" method='POST'>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('button-name'); ?>
Login
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.account_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/login.blade.php ENDPATH**/ ?>