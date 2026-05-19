

<?php $__env->startSection('title', 'Личный кабинет ведущего'); ?>

<?php $__env->startSection('content'); ?>
<div class="main dp">
    <div class="row">
        <div class="hover"></div>
        <div class="title"></div>
        <div class="row--small grid between">
            <div class="content driver-page">
                <div class="driver-page-photo">
                    <img src="<?php echo e($user->photo ? asset('storage/' . $user->photo) : asset('img/driver-page.png')); ?>" alt="<?php echo e($user->name); ?>">
                </div>  
                <div class="driver-page-name"><?php echo e($user->name); ?></div>
                <div class="driver-page-text">
                    <div class="driver-page-my">Мои мастер-классы</div>
                    <table class="driver-page-table">
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $masterClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($class->date->format('d.m.Y')); ?> <?php echo e($class->time->format('H:i')); ?></td>
                                    <td>
                                        <b><?php echo e($class->title); ?></b>
                                        <?php $__empty_2 = true; $__currentLoopData = $class->participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <p>
                                                <?php echo e($loop->iteration); ?>. <?php echo e($participant->name); ?><br>
                                                email: <?php echo e($participant->email); ?><br>
                                                tel: <?php echo e($participant->phone); ?>

                                            </p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                            <p>Нет записанных участников</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2">У вас пока нет мастер-классов</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="driver-page-btn-wrapper">
                    <a href="<?php echo e(route('master-class.create')); ?>" class="driver-page-btn btn">Добавить мастер-класс</a>
                </div>
            </div>
            <ul class="menu">
                <li><a href="<?php echo e(route('craft.show', 1)); ?>">Архитектурное моделирование</a></li>
                <li><a href="<?php echo e(route('craft.show', 2)); ?>">Кулинария</a></li>
                <li><a href="<?php echo e(route('craft.show', 3)); ?>">Резьба по дереву</a></li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crazyhands\resources\views/profile/teacher.blade.php ENDPATH**/ ?>