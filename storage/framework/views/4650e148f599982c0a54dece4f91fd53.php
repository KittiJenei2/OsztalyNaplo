

<?php $__env->startSection('content'); ?>

<h1><?php echo e($student->name); ?></h1>
<h2>Osztály: <?php echo e($student->schoolclasses->name); ?></h2>

<p><?php echo e($student->gender); ?></p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/students/show.blade.php ENDPATH**/ ?>