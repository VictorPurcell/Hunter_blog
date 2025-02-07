<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Hunter x Hunter Blog'); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts para estilo anime -->
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Estilos personalizados -->
    <style>
        :root {
            --hunter-green: #1a472a;
            --nen-red: #c70039;
            --dark-bg: #0a0a0a;
            --gold-accent: #ffd700;
        }

        /* ESTILOS DO BOTÃO COM AURA */
        .hunter-btn-lg {
            background: var(--nen-red);
            color: white !important;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border: 2px solid var(--gold-accent);
            transition: all 0.3s;
        }
        .hunter-btn-lg:hover {
            background: var(--gold-accent);
            color: var(--dark-bg) !important;
        }

        .hunter-banner {
            background: linear-gradient(rgba(10,10,10,0.9), rgba(10,10,10,0.9)),
                        url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9165d67c-996f-42fd-a1b4-ce81cc3cca5e/d80agtf-0be5bb80-6d90-42ba-ae39-cfbabaffdf94.jpg/v1/fill/w_900,h_639,q_75,strp/hxh___reunion_x_sky_by_akayashi_d80agtf-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NjM5IiwicGF0aCI6IlwvZlwvOTE2NWQ2N2MtOTk2Zi00MmZkLWExYjQtY2U4MWNjM2NjYTVlXC9kODBhZ3RmLTBiZTViYjgwLTZkOTAtNDJiYS1hZTM5LWNmYmFiYWZmZGY5NC5qcGciLCJ3aWR0aCI6Ijw9OTAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.597SfG02FMYzvxg53JTmrTu6mI8pFJBTJqDoVHa-CVc');
            background-size: cover;
        }

        .hunter-btn {
            position: relative;
            overflow: hidden;
            background: var(--nen-red);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .hunter-btn::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 215, 0, 0.4) 50%, transparent 70%);
            animation: aura 3s infinite;
        }
        @keyframes aura {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        body {
            background: var(--dark-bg) url('https://i.imgur.com/7QZ4J8W.png') fixed;
            background-size: cover;
            color: white;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .hunter-nav {
            background: rgba(10, 10, 10, 0.95);
            border-bottom: 3px solid var(--gold-accent);
            padding: 1rem 0;
        }
        .hunter-brand {
            font-family: 'Bangers', cursive;
            font-size: 2rem;
            color: var(--gold-accent) !important;
            text-shadow: 2px 2px 4px rgba(199, 0, 57, 0.5);
        }
        .hunter-nav .nav-link {
            color: var(--gold-accent) !important;
            margin: 0 15px;
            transition: all 0.3s;
            position: relative;
        }
        .hunter-nav .nav-link:hover {
            color: var(--nen-red) !important;
            transform: translateY(-2px);
        }
        .hunter-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--nen-red);
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
        }
        .hunter-nav .nav-link:hover::after {
            width: 100%;
        }

        .hunter-footer {
            background: rgba(10, 10, 10, 0.95);
            border-top: 3px solid var(--gold-accent);
            margin-top: auto;
            padding: 1.5rem 0;
        }

        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--nen-red);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .scroll-to-top:hover {
            transform: scale(1.1);
            background: var(--gold-accent);
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg hunter-nav">
        <div class="container">
            <a class="navbar-brand hunter-brand" href="<?php echo e(url('/')); ?>">
                <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/31568c55-9bda-4664-a302-4bc78a636d3a/dgioyom-6ea39cca-075c-4505-b378-5a5c1f455935.jpg/v1/fit/w_591,h_591,q_70,strp/gon_and_killua_by_logoanime_dgioyom-375w-2x.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NTkxIiwicGF0aCI6IlwvZlwvMzE1NjhjNTUtOWJkYS00NjY0LWEzMDItNGJjNzhhNjM2ZDNhXC9kZ2lveW9tLTZlYTM5Y2NhLTA3NWMtNDUwNS1iMzc4LTVhNWMxZjQ1NTkzNS5qcGciLCJ3aWR0aCI6Ijw9NTkxIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.uZ_NIXPf4Nxde1F-hXDvuedzHu8kAx92HUekMe6Hhsk" width="40" height="40" class="d-inline-block align-top" alt="Hunter Logo">
                HUNTER BLOG
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('characters')); ?>"><i class="fas fa-users"></i> Personagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('nen')); ?>"><i class="fas fa-fire"></i> Nen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('blog.index')); ?>"><i class="fas fa-book"></i> Blog</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('profile.show')); ?>"><i class="fas fa-user"></i> Perfil</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container py-5 flex-grow-1">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="hunter-footer">
        <div class="container text-center">
            <div class="social-icons mb-3">
                <a href="#" class="text-warning mx-3"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="text-warning mx-3"><i class="fab fa-discord fa-2x"></i></a>
                <a href="#" class="text-warning mx-3"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
            <p class="mb-0">
                © 2024 Hunter x Hunter Blog - <span class="text-warning">"Um Hunter deve caçar seus sonhos!"</span>
            </p>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <div class="scroll-to-top">
        <i class="fas fa-chevron-up text-dark"></i>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Scripts personalizados -->
    <script>
        // Scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
            });
        });

        // Botão scroll to top
        window.addEventListener('scroll', () => {
            const scrollBtn = document.querySelector('.scroll-to-top');
            scrollBtn.style.display = window.scrollY > 500 ? 'flex' : 'none';
        });
        document.querySelector('.scroll-to-top').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/victor/Documentos/OFM_ATIVIDADES/hunter_blog/resources/views/layouts/app.blade.php ENDPATH**/ ?>