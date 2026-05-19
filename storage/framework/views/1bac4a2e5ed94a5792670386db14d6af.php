

<?php $__env->startSection('title', 'Вход'); ?>

<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="row">
        <div class="row--small">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <h2>Вход в личный кабинет</h2>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <button class="btn">Войти</button>
                </div>
                
                <div class="form-group" style="text-align: center;">
                    <a href="<?php echo e(route('register')); ?>" style="color: #20416c;">Нет аккаунта? Зарегистрироваться</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crazyhands\resources\views/auth/login.blade.php ENDPATH**/ ?>