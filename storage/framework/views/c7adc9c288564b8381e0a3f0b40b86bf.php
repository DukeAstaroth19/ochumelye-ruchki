<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клуб любителей творчества «ОчУмелые ручки» - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
    <div class="header">
        <div class="row grid middle between">
            <div class="logo">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Логотип">
            </div>
            <div class="title">
                Клуб любителей творчества «ОчУмелые ручки»
            </div>
            <div class="auth">
    <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(route('profile')); ?>"><?php echo e(Auth::user()->name); ?></a>
        <?php if(Auth::user()->role == 'teacher'): ?>
            <a href="<?php echo e(route('master-class.create')); ?>" style="margin-left: 10px;">+ Добавить МК</a>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" style="background: none; border: none; color: #00044c; font-weight: bold; cursor: pointer; padding-left: 10px;">Выйти</button>
        </form>
    <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">Вход</a>
    <?php endif; ?>
</div>
        </div>
    </div>
    
    <div class="row row--nogutter">
        <div class="menu-burger">
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>  
    </div>
    
    <div class="row row--nogutter top-line">
        <div class="line"></div>
    </div>

    <?php if(session('success')): ?>
        <div style="background: #4CAF50; color: white; padding: 10px; text-align: center; margin: 10px auto; max-width: 1100px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div style="background: #f44336; color: white; padding: 10px; text-align: center; margin: 10px auto; max-width: 1100px;">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <div class="row row--nogutter">
        <div class="line"></div>
    </div>
    
    <div class="footer">
        <div class="row">
            <div class="row--small grid between">
                <div class="address">Наш адрес: ВДНХ, 120в</div>
                <div class="tel">Тел: 89123456765</div>
                <div class="copy">(с) Copyright, 2017</div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.burger')?.addEventListener('click', function() {
            const menu = document.querySelector('.main .menu');
            if (menu) {
                if (menu.style.display === 'none' || getComputedStyle(menu).display === 'none') {
                    menu.style.display = 'block';
                } else {
                    menu.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\crazyhands\resources\views/layouts/app.blade.php ENDPATH**/ ?>