

<?php $__env->startSection('title', 'Мои записи'); ?>

<?php $__env->startSection('content'); ?>
<div class="main dp">
    <div class="row">
        <div class="hover"></div>
        <div class="title"></div>
        <div class="row--small grid between">
            <div class="content driver-page">
                <div class="driver-page-photo">
                    <img src="<?php echo e(asset('img/driver-page.png')); ?>" alt="<?php echo e($user->name); ?>">
                </div>  
                <div class="driver-page-name"><?php echo e($user->name); ?></div>
                <div class="driver-page-text">
                    <div class="driver-page-my">Мои записи на мастер-классы</div>
                    <table class="driver-page-table">
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($booking->masterClass->date->format('d.m.Y')); ?> <?php echo e($booking->masterClass->time->format('H:i')); ?></td>
                                    <td>
                                        <b><?php echo e($booking->masterClass->title); ?></b>
                                        <p>
                                            Вид творчества: <?php echo e($booking->masterClass->craft->name); ?><br>
                                            Ведущий: <?php echo e($booking->masterClass->teacher->name); ?><br>
                                            Стоимость: <?php echo e($booking->masterClass->price); ?> ₽
                                        </p>
                                        <form method="POST" action="<?php echo e(route('master-class.cancel', $booking->masterClass->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn" style="padding: 5px 15px; font-size: 12px;">Отменить запись</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2">У вас пока нет записей на мастер-классы</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crazyhands\resources\views/profile/visitor.blade.php ENDPATH**/ ?>