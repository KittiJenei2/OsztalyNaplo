

<?php $__env->startSection('content'); ?>

<h1>Tanulók
    <a href="<?php echo e(route('students.create')); ?>" title="Új tanuló">🤓</a>
</h1>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<ul>
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="actions">
        <?php echo e($student->name); ?> - <?php echo e($student->schoolclasses->name); ?>

        <a href="<?php echo e(route('students.show', $student->id)); ?>" class="button">Megjelenít</a>
        <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="button">Módosít</a>
        <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/students/index.blade.php ENDPATH**/ ?>