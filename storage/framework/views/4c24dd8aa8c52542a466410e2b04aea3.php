

<?php $__env->startSection('title', $craft->name); ?>

<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="row">
        <div class="hover"></div>
        <div class="title"><?php echo e($craft->name); ?></div>
        <div class="row--small grid between">
            <div class="content">
                <img src="<?php echo e(asset('img/elifant.png')); ?>" alt="<?php echo e($craft->name); ?>" style="margin-right: 20px; margin-bottom: 20px;">
                <?php echo nl2br(e($craft->description)); ?>

            </div>
            <ul class="menu">
                <li><a href="<?php echo e(route('craft.show', 1)); ?>">Архитектурное моделирование</a></li>
                <li><a href="<?php echo e(route('craft.show', 2)); ?>">Кулинария</a></li>
                <li><a href="<?php echo e(route('craft.show', 3)); ?>">Резьба по дереву</a></li>
            </ul>
        </div>

        <div class="row shedule">
            <div class="row--small">
                <h2>Расписание</h2>
                <div class="drivers">
                    <?php $__empty_1 = true; $__currentLoopData = $masterClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="driver grid">
                            <div class="driver-left grid">
                                <div class="driver-photo">
                                    <img src="<?php echo e($class->teacher->photo ? asset('storage/' . $class->teacher->photo) : asset('img/driver1.png')); ?>" alt="<?php echo e($class->teacher->name); ?>">
                                </div>
                                <div class="driver-text">
                                    <div class="driver-name"><?php echo e($class->teacher->name); ?></div>
                                    <div class="driver-desc">
                                        <strong><?php echo e($class->title); ?></strong><br>
                                        <?php echo e($class->description); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="driver-right">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php
                                        $isBooked = Auth::user()->bookedClasses->contains($class->id);
                                    ?>
                                    
                                    <?php if($isBooked): ?>
                                        <form method="POST" action="<?php echo e(route('master-class.cancel', $class->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="driver-btn" style="background: #f44336; border-color: #f44336;">Отменить</button>
                                        </form>
                                    <?php elseif($class->available_seats > 0): ?>
                                        <form method="POST" action="<?php echo e(route('master-class.book', $class->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="driver-btn">Записаться</button>
                                        </form>
                                    <?php else: ?>
                                        <button class="driver-btn" disabled style="opacity: 0.5; cursor: not-allowed;">Мест нет</button>
                                    <?php endif; ?>
                                    <div class="driver-time">
                                        <?php echo e($class->date->format('d.m.Y')); ?> <?php echo e($class->time->format('H:i')); ?><br>
                                        <?php echo e($class->price); ?> ₽ | Свободно: <?php echo e($class->available_seats); ?>/<?php echo e($class->max_participants); ?>

                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="driver-btn" style="display: inline-block; text-decoration: none;">Записаться</a>
                                    <div class="driver-time"><?php echo e($class->date->format('d.m.Y')); ?> <?php echo e($class->time->format('H:i')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="driver" style="text-align: center; padding: 40px;">
                            <p>В данный момент нет доступных мастер-классов. Скоро появятся новые!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crazyhands\resources\views/master-classes/craft.blade.php ENDPATH**/ ?>