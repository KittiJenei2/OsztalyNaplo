<?php $__env->startSection('content'); ?>

<h1>Új jegy hozzáadása</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('marks.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <fieldset>
        <label for="mark">Érdemjegy</label>
        <input type="text" name="mark" id="mark">
    </fieldset>
    <fieldset>
        <label for="student_id">Tanuló kiválasztása</label>
        <select name="student_id" id="student_id">
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($student->id); ?>"><?php echo e($student->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </fieldset>
    <fieldset>
        <label for="subject_id">Tantárgy kiválasztása</label>
        <select name="subject_id" id="subject_id">
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/marks/create.blade.php ENDPATH**/ ?>