<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osztálynapló</title>

    <!-- Scripts 
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery-3.7.1.js')); ?>"></script>-->

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" >
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?php echo e(route('schoolclasses.index')); ?>">Osztályok</a></li>

                <li><a href="<?php echo e(route('subjects.index')); ?>">Tantárgyak</a></li>

                <li><a href="<?php echo e(route('students.index')); ?>">Tanulók</a></li>

                <li><a href="<?php echo e(route('marks.index')); ?>">Jegyek</a></li>

                <li><a href="<?php echo e(route('classes_subjects.index')); ?>">Hozzárendelés</a></li>

                <?php if(auth()->guard()->check()): ?>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit">Kijelentkezés</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('/login')); ?>">Bejelentkezés</a></li>
                    <li><a href="<?php echo e(url('/register')); ?>">Regisztráció</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
<footer>
    <p>&copy;2025 osztálynapló</p>
</footer>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\OsztalyNaplo-main\resources\views/layout.blade.php ENDPATH**/ ?>