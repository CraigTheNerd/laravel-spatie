<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-2">
                <div class="flex">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="px-4 py-2 text-slate-700 text-sm bg-slate-300 hover:bg-slate-400 rounded-md">Users</a>
                </div>
                <div class="flex flex-col py-2 pt-6">



                    <div class="mt-6 bg-slate-100 w-1/2 rounded p-6">
                        <div><b>User Name:&nbsp;</b> <?php echo e($user->name); ?></div>
                        <div><b>User Email:&nbsp;</b> <?php echo e($user->email); ?></div>
                    </div>



                    <div class="mt-6 bg-slate-100 w-1/2 rounded p-6">
                        <h1 class="text-2xl font-semibold">
                            Roles
                        </h1>
                        <div class="flex space-x-2 mt-4 p-2">
                            <?php if($user->roles): ?>
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="<?php echo e(route('admin.users.roles.remove', [$user->id, $user_role->id])); ?>" onsubmit="return confirm('Are you sure?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"><?php echo e($user_role->name); ?></button>
                                    </form>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="<?php echo e(route('admin.users.roles', $user->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="sm:col-span-6">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Permissions</label>
                                    <select id="role" name="role" autocomplete="role-name" class="mt-1 block w-full py-2 px-3">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->name); ?>">
                                                <?php echo e($role->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm">This field is required</span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-6 py-2 text-sm bg-green-200 text-green-700 font-bold hover:bg-green-300 rounded-md">Assign Permission</button>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10 bg-slate-100 rounded p-6">
                        <h1 class="text-2xl font-semibold">
                            Permissions
                        </h1>
                        <div class="flex space-x-4 mt-4 p-2 border-none">
                            <?php if($user->permissions): ?>
                                <?php $__currentLoopData = $user->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="<?php echo e(route('admin.users.permissions.revoke', [$user->id, $user_permission->id])); ?>" onsubmit="return confirm('Are you sure?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"><?php echo e($user_permission->name); ?></button>
                                    </form>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="max-w-xl mt-6 border-none">
                            <form method="POST" action="<?php echo e(route('admin.users.permissions', $user->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="sm:col-span-6">
                                    <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                    <select id="permission" name="permission" autocomplete="permission-name" class="mt-1 block w-full py-2 px-3">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($permission->name); ?>">
                                                <?php echo e($permission->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['permission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm">This field is required</span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-6 py-2 text-sm bg-green-200 text-green-700 font-bold hover:bg-green-300 rounded-md">Assign Permission</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>





            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>







<?php /**PATH /Users/Craig/Sites/localhost/spatie.lan/spatie/resources/views/admin/users/role.blade.php ENDPATH**/ ?>