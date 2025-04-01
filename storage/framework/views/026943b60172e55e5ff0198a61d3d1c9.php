

<?php $__env->startSection('content'); ?>

<h1>Osztályok
    <a href="<?php echo e(route('schoolclasses.create')); ?>" title="Új osztály">🏫</a>
</h1>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<ul>
    <?php $__currentLoopData = $schoolclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sclass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="actions">
    <?php echo e($sclass->name); ?> - <?php echo e($sclass->year); ?> 
    <a href="<?php echo e(route('schoolclasses.show', $sclass->id)); ?>" class="button">Megjelenítés</a> 
    <a href="<?php echo e(route('schoolclasses.edit', $sclass->id)); ?>" class="button">Módosítás</a>
    <form action="<?php echo e(route('schoolclasses.destroy', $sclass->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="danger">Törlés</button>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/schoolclasses/index.blade.php ENDPATH**/ ?>