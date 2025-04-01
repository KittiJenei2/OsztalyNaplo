

<?php $__env->startSection('content'); ?>

<h1>Tantárgyak
    <a href="<?php echo e(route('subjects.create')); ?>" title="Új osztály">📚</a>
</h1>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<ul>
    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="actions">
        <?php echo e($subject->name); ?>

        <a href="<?php echo e(route('subjects.show', $subject->id)); ?>" class="button">Megjelenítés</a> 
        <a href="<?php echo e(route('subjects.edit', $subject->id)); ?>" class="button">Módosítás</a>
        <form action="<?php echo e(route('subjects.destroy', $subject->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="danger" onclick="return confirm('Biztosan? ')">Törlés</button>
        </form>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/subjects/index.blade.php ENDPATH**/ ?>