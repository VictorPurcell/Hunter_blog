<?php $__env->startSection('content'); ?>
<style>
    .hunter-login {
        background: rgba(26, 71, 42, 0.9); /* Verde Hunter com transparência */
        border: 2px solid var(--gold-accent);
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(199, 0, 57, 0.3); /* Sombra vermelha do Nen */
    }

    .hunter-login-header {
        background: linear-gradient(45deg, var(--dark-bg), var(--hunter-green));
        border-bottom: 2px solid var(--gold-accent);
        font-family: 'Bangers', cursive;
        letter-spacing: 2px;
    }

    .hunter-input {
        background: rgba(10, 10, 10, 0.8) !important;
        border: 1px solid var(--gold-accent) !important;
        color: var(--gold-accent) !important;
    }

    .hunter-input:focus {
        box-shadow: 0 0 10px var(--nen-red) !important;
        border-color: var(--nen-red) !important;
    }

    .hunter-checkbox .form-check-input:checked {
        background-color: var(--nen-red);
        border-color: var(--gold-accent);
    }

    .hunter-links a {
        color: var(--gold-accent) !important;
        transition: all 0.3s;
    }

    .hunter-links a:hover {
        color: var(--nen-red) !important;
        text-shadow: 0 0 8px rgba(199, 0, 57, 0.5);
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card hunter-login">
            <!-- Cabeçalho Estilizado -->
            <div class="card-header hunter-login-header text-center">
                <img src="https://i.imgur.com/XWQ7D7L.png" width="50" alt="Símbolo Hunter" class="mb-2">
                <h3 class="text-warning mb-0"><?php echo e(__('Acesso Hunter')); ?></h3>
            </div>

            <!-- Corpo do Formulário -->
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Campo Usuário -->
                    <div class="mb-4">
                        <label for="username" class="form-label text-warning"><?php echo e(__('Nome de Usuário')); ?></label>
                        <input id="username" type="text"
                               class="form-control hunter-input <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="username"
                               value="<?php echo e(old('username')); ?>"
                               required autofocus
                               placeholder="Ex: GonFreecss">

                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback" style="color: var(--nen-red)">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Campo Senha -->
                    <div class="mb-4">
                        <label for="password" class="form-label text-warning"><?php echo e(__('Senha Secreta')); ?></label>
                        <input id="password" type="password"
                               class="form-control hunter-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="password"
                               required
                               placeholder="••••••••">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback" style="color: var(--nen-red)">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Lembrar-me -->
                    <div class="mb-4 hunter-checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="form-check-label text-warning" for="remember">
                                <?php echo e(__('Ativar Nen Memory')); ?>

                            </label>
                        </div>
                    </div>

                    <!-- Botão de Login -->
                    <button type="submit" class="btn btn-lg w-100 hunter-btn"
                            style="background: var(--nen-red); color: white">
                        <?php echo e(__('Liberar Aura')); ?>

                    </button>
                </form>
            </div>

            <!-- Links Inferiores -->
            <div class="card-footer hunter-links text-center">
                <p class="mb-1">Novo Hunter?
                    <a href="<?php echo e(route('register')); ?>" class="fw-bold"><?php echo e(__('Faça seu Exame Hunter')); ?></a>
                </p>
                <p class="mb-0">
                    <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Esqueceu o Janken?')); ?></a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/victor/Documentos/OFM_ATIVIDADES/hunter_blog/resources/views/auth/login.blade.php ENDPATH**/ ?>