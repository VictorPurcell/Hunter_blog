<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f4f4f9;">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
        <div class="card shadow-lg" style="padding: 20px; border-radius: 15px;">
            <div class="card-header text-center">
                <h3><?php echo e(__('Cadastrar-se')); ?></h3>
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Linha 1: Nome Completo e Nome de Usuário -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label"><?php echo e(__('Nome Completo')); ?></label>
                            <input id="name" type="text"
                                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="name" value="<?php echo e(old('name')); ?>"
                                   required autocomplete="name" autofocus>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label"><?php echo e(__('Nome de Usuário')); ?></label>
                            <input id="username" type="text"
                                   class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="username" value="<?php echo e(old('username')); ?>"
                                   required>
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Linha 2: E-mail e CPF -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label"><?php echo e(__('Endereço de E-mail')); ?></label>
                            <input id="email" type="email"
                                   class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="email" value="<?php echo e(old('email')); ?>"
                                   required autocomplete="email">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6">
                            <label for="cpf" class="form-label"><?php echo e(__('CPF')); ?></label>
                            <input id="cpf" type="text"
                                   class="form-control <?php $__errorArgs = ['cpf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="cpf" value="<?php echo e(old('cpf')); ?>"
                                   required maxlength="11" minlength="11"
                                   oninput="this.value = this.value.replace(/\D/g, '')">
                            <?php $__errorArgs = ['cpf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Linha 3: Data de Nascimento e Senha -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dob" class="form-label"><?php echo e(__('Data de Nascimento')); ?></label>
                            <input id="dob" type="date"
                                   class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="dob" value="<?php echo e(old('dob')); ?>"
                                   required>
                            <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label"><?php echo e(__('Senha')); ?></label>
                            <input id="password" type="password"
                                   class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="password" required autocomplete="new-password">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Linha 4: Confirmar Senha -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password-confirm" class="form-label"><?php echo e(__('Confirmar Senha')); ?></label>
                            <input id="password-confirm" type="password"
                                   class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Botão de Registro -->
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <?php echo e(__('Cadastrar')); ?>

                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
                <p><?php echo e(__('Já tem uma conta?')); ?> <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Faça login')); ?></a></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* Estilo do container */
    .container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f4f4f9;
    }

    /* Ajuste da largura do card */
    .col-12 {
        width: 100%;
    }
    .col-md-10, .col-lg-8, .col-xl-6 {
        max-width: 90%;
    }

    /* Estilo do card */
    .card {
        padding: 30px;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Ajuste dos campos */
    .form-control {
        height: 40px;
        font-size: 14px;
    }
    .form-label {
        font-size: 14px;
    }
    .btn {
        font-size: 14px;
        padding: 12px;
    }
    .card-header, .card-footer {
        font-size: 16px;
        padding: 10px;
    }
    .mb-3 {
        margin-bottom: 1rem;
    }
    .invalid-feedback {
        font-size: 12px;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .col-md-6 {
            width: 100%;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/victor/Documentos/OFM_ATIVIDADES/hunter_blog/resources/views/auth/register.blade.php ENDPATH**/ ?>