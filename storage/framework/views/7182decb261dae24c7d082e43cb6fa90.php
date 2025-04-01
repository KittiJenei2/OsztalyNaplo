<?php $__env->startSection('content'); ?>

<h1>Új tanuló hozzáadása</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('students.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <fieldset>
        <label for="name">Tanuló neve</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="gender">Tanuló neme</label>
        <input type="text" name="gender" id="gender">
    </fieldset>
    <fieldset>
        <label for="sclass_id">Tanuló osztálya</label>
        <select name="sclass_id" id="sclass_id">
            <?php $__currentLoopData = $schoolclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sclass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($sclass->id); ?>"><?php echo e($sclass->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </fieldset>
    <button typ="submit">Mentés</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/students/create.blade.php ENDPATH**/ ?>