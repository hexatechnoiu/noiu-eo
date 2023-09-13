<!DOCTYPE html>
<html lang="en" class="!scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e($title); ?></title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/App.js']); ?>

        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    </head>
    <body>

    
    <div id="progress" class="fixed bottom-5 right-5 sm:bottom-10 sm:right-10 z-50 h-12 w-12 justify-center items-center bg-neutral-40 rounded-full shadow-md hidden hover:block cursor-pointer">
        <span id="progress-value" class="h-10 w-10 bg-white rounded-full grid place-items-center text-primary-20 text-2xl"><i class="fa-solid fa-arrow-up"></i></span>
    </div>

        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="lg:ml-[250px]">
                <?php echo $__env->yieldContent('container'); ?>
            </div>

        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    </body>
</html>
<?php /**PATH D:\Praktik Kerja Lapangan (PKL)\noiu-eo\resources\views/layouts/main.blade.php ENDPATH**/ ?>