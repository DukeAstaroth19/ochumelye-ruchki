

<?php $__env->startSection('title', 'Добавить мастер-класс'); ?>

<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="row">
        <div class="row--small">
            <h1>Тестовая страница добавления мастер-класса</h1>
            <p>Если вы видите этот текст, значит маршрут работает!</p>
            
            <form method="POST" action="<?php echo e(route('master-class.store')); ?>">
                <?php echo csrf_field(); ?>
                <h2>Форма добавления мастер-класса</h2>
                
                <div class="form-group">
                    <label>Вид творчества</label>
                    <select name="craft_id" required>
                        <option value="">Выберите вид творчества</option>
                        <?php $__currentLoopData = $crafts ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $craft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($craft->id); ?>"><?php echo e($craft->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Название мастер-класса</label>
                    <input type="text" name="title" required style="width: 100%;">
                </div>
                
                <div class="form-group">
                    <label>Описание мастер-класса</label>
                    <textarea name="description" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Дата</label>
                    <input type="date" name="date" required>
                </div>
                
                <div class="form-group">
                    <label>Время</label>
                    <input type="time" name="time" required>
                </div>
                
                <div class="form-group">
                    <label>Количество человек в группе</label>
                    <input type="number" name="max_participants" required min="1">
                </div>
                
                <div class="form-group">
                    <label>Стоимость мастер-класса</label>
                    <input type="number" name="price" required min="0" step="100">
                </div>
                
                <div class="form-group">
                    <button class="btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\crazyhands\resources\views/master-classes/create.blade.php ENDPATH**/ ?>