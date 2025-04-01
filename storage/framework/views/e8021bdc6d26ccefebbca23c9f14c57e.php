

<?php $__env->startSection('content'); ?>

<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="alert alert-warning"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

<form action="<?php echo e(route('marks.update', $mark->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <fieldset>
        <label for="mark">Osztályzat</label>
        <input type="text" name="mark" id="mark" value="<?php echo e(old('mark', $mark->mark)); ?>">
    </fieldset>
    <fieldset>
        <label for="student_id">Tanuló</label>
        <select id="student_id" name="student_id" required>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($student->id); ?>" <?php echo e($mark->student_id == $student->id ? 'selected' : ''); ?>>
                    <?php echo e($student->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </fieldset>
    <fieldset>
        <label for="subject_id">Tantárgy</label>
        <select id="subject_id" name="subject_id" required>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($subject->id); ?>" <?php echo e($mark->subject_id == $subject->id ? 'selected' : ''); ?>>
                    <?php echo e($subject->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </fieldset>
<button typ="submit">Mentés</button>
</form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/marks/edit.blade.php ENDPATH**/ ?>