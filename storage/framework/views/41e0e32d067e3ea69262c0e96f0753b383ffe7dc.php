<?php $__env->startSection('head-block'); ?>
<title>Chatroom</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h1>Chatroom with <?php echo e($contact); ?> </h1>
<form action='<?php echo e(route("chatroom-send")); ?>' method='POST'>
    <?php echo csrf_field(); ?>

    <input type='text' name='message'/>
    <input type='hidden' name='contact' value='<?php echo e($contact); ?>'/>
    <button type='submit'>Send</button>
</form>

<br/>

<?php if(isset($messages)): ?>
<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($message[0] == $currentLogin): ?>
        <label style='background-color: darkgrey; border: solid darkblue;'><?php echo e($message[0]); ?></label>
        <label style='background-color: purple; border: solid darkblue;'><?php echo e($message[2]); ?></label>
    <?php else: ?>
        <label style='background-color: green; border: solid darkblue;'><?php echo e($message[0]); ?></label>    
        <label style='background-color: purple; border: solid darkblue;'><?php echo e($message[2]); ?></label>
    <?php endif; ?>
    <br/>
    <br/>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/chatroom.blade.php ENDPATH**/ ?>