<!Doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body style="padding: 60px 0;">
    <div id="app">

    <?php $__env->startComponent('components.dashboard.header'); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php if(Auth::guard('admins')->check()): ?>
    <div class="col-3 mt-3">
        <?php $__env->startComponent('components.dashboard.sidebar'); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
    <?php endif; ?>
        <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel-todo-app\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>