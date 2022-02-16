<?php $__env->startSection('head-block'); ?>
<title>Find Contact`s</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h1>Find Contact`s Page</h1>

<form action='<?php echo e(route("contacts-done")); ?>' method='POST'>
    <?php echo csrf_field(); ?>
    
    <ul>
    <?php for($i = 0; $i < count($userList); $i++): ?>
    <?php if($userList[$i]): ?>
        <li>
            <label><?php echo e($userList[$i]); ?></label>
            <input type='checkbox' name='<?php echo e($i); ?>' value='<?php echo e($userList[$i]); ?>'>
        </li>
    <?php endif; ?>
    <?php endfor; ?>
    </ul>

    <button type='submit' class='btn btn-success'>Add contact's</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/contacts.blade.php ENDPATH**/ ?>