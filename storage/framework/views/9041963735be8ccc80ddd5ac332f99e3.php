

<?php $__env->startSection('content'); ?>

<h1>Osztályzatok
    <a href="<?php echo e(route('marks.create')); ?>" title="Új jegy">✏️</a>
</h1>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<ul>
    <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="actions">
        <?php echo e($mark->students->name); ?> - <?php echo e($mark->subjects->name); ?> - <?php echo e($mark->mark); ?>

        <a href="<?php echo e(route('marks.show', $mark->id)); ?>" class="button">Megjelenít</a>
        <a href="<?php echo e(route('marks.edit', $mark->id)); ?>" class="button">Módosít</a>
        <form action="<?php echo e(route('marks.destroy', $mark->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/marks/index.blade.php ENDPATH**/ ?>