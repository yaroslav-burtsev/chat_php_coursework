<?php $__env->startSection('head-block'); ?>
<title>Chat</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h1>Chatting</h1>
<a href='/contacts'>Find Contacts</a>
<?php if(isset($loginContacts)): ?>
<form action='<?php echo e(route("chatroom")); ?>' method='POST'>
    <?php echo csrf_field(); ?>

    <div>
        <?php $__currentLoopData = $loginContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label><?php echo e($contact); ?></label>
            <input type='radio' name = 'contact' value='<?php echo e($contact); ?>' }}/>
            <br/>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <button type='submit'>Start chat</button>
</form>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/chat.blade.php ENDPATH**/ ?>