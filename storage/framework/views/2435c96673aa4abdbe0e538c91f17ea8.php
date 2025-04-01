

<?php $__env->startSection('content'); ?>

<h1>Osztályokhoz rendelt tantárgyak
    <a href="<?php echo e(route('classes_subjects.create')); ?>" title="Új hozzárendelés">🖋️</a>
</h1>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<ul>
    <?php $__currentLoopData = $classes_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $csub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="actions">
        <?php echo e($csub->schoolclasses->name); ?> - <?php echo e($csub->subjects->name); ?>

        <a href="<?php echo e(route('classes_subjects.show', $csub->id)); ?>" class="button">Megjelenít</a>
        <a href="<?php echo e(route('classes_subjects.edit', $csub->id)); ?>" class="button">Módosít</a>
        <form action="<?php echo e(route('classes_subjects.destroy', $csub->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/classes_subjects/index.blade.php ENDPATH**/ ?>