<?php $__env->startSection('container'); ?>

    <section class="flex flex-col items-center justify-center px-6 py-10 mx-auto md:h-screen">
        <div class="w-full bg-white rounded-lg shadow-xl border border-neutral-20 my-4 sm:max-w-md">
        <img src="<?php echo e(asset('img/logo-eo-blue.svg')); ?>" class="h-16 mt-6 mx-auto" alt="NOIU Logo" />

            <?php if(session()->has('success')): ?>
                <div class="bg-green-600 text-white p-1.5">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-black md:text-2xl">
                    Sign in to Your Account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(session()->has('loginError')): ?>
                        <div class="bg-red-900 text-white p-1.5">
                            <?php echo e(session('loginError')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input value="<?php echo e(old('email')); ?>" type="email" name="email" id="email" class="bg-white border border-neutral-20 text-black sm:text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-900">
                            <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
                        <input type="password" name="password" id="password" placeholder="Your Password" class="bg-white border border-neutral-20 text-black sm:text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-900">
                            <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Sign in
                    </button>
                    <p class="text-sm text-center font-light text-neutral-60">
                        Don’t have an account yet?
                        <a href="register" class="font-medium text-primary-40 hover:opacity-70 duration-[400ms]">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Praktik Kerja Lapangan (PKL)\noiu-eo\resources\views/auth/login.blade.php ENDPATH**/ ?>