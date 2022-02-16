<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldContent('page-name'); ?>
<?php echo $__env->yieldContent('form-arguments'); ?>
    <?php echo csrf_field(); ?>

    <div class='main'>
        <div class='field'>
            <label for='login' class='login-label'>Enter the login</label>
            <input type='text' name='login' placeholder='login' id='login' class='form-control'>
        </div>

        <div class='field'>
            <label for='psw' class='login-label'>Enter the password</label>
            <input type='password' name='psw' placeholder='password' id='login' class='form-control'>
        </div>  
    </div>

    <br/>
    <br/>
    <br/>

    <button type='submit'>
        <?php echo $__env->yieldContent('button-name'); ?>
    </button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burtsevyaroslav/Documents/php/chat/resources/views/layouts/account_form.blade.php ENDPATH**/ ?>