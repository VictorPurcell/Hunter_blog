@extends('layouts.app')

@section('content')
<style>
    /* Estilos Temáticos */
    :root {
        --hunter-green: #1a472a;
        --nen-red: #c70039;
        --dark-bg: #0a0a0a;
        --gold-accent: #ffd700;
    }

    body {
        background: var(--dark-bg) url('https://imgur.com/1he3rhf') no-repeat center center fixed;
        background-size: cover;
        color: white;
    }

    .hunter-nav {
        background: rgba(10, 10, 10, 0.9);
        border-bottom: 2px solid var(--gold-accent);
    }

    .hunter-card {
        background: rgba(26, 71, 42, 0.9);
        border: 2px solid var(--gold-accent);
        border-radius: 15px;
        transition: transform 0.3s;
    }

    .hunter-card:hover {
        transform: scale(1.05);
    }

    .hunter-btn {
        background: var(--nen-red);
        border: none;
        color: white;
        transition: all 0.3s;
    }

    .hunter-btn:hover {
        background: var(--gold-accent);
        color: var(--dark-bg);
    }

    .character-card {
        background: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        padding: 15px;
        margin: 10px;
    }

    .hunter-title {
        font-family: 'Arial Black', sans-serif;
        text-shadow: 2px 2px 4px var(--nen-red);
    }
</style>

<!-- Conteúdo Principal -->
<div class="container mt-5">
    <div class="row">
        <!-- Destaques -->
        <div class="col-md-8">
            <div class="hunter-card p-4 mb-4">
                <h1 class="hunter-title text-center mb-4">Bem-vindo ao Mundo dos Hunters!</h1>
                <div class="row">
                    <!-- Post Destacado -->
                    <div class="col-md-6 mb-4">
                        <div class="character-card">
                            <img src="https://i.gifer.com/7b54.gif" class="img-fluid mb-3" alt="Gon Freecss">
                            <h4 class="text-warning">Análise: O Juramento de Gon</h4>
                            <p>Descubra como Gon quebrou as regras do Nen...</p>
                            <a href="#" class="btn hunter-btn">Ler Mais</a>
                        </div>
                    </div>
                    <!-- Galeria de Nen -->
                    <div class="col-md-6 mb-4">
                        <div class="character-card">
                            <img src="https://media.giphy.com/media/k6xVneTVnmUGM0wICk/giphy.gif" class="img-fluid mb-3" alt="Tipos de Nen">
                            <h4 class="text-warning">Guia dos Tipos de Nen</h4>
                            <p>Domine Enhancement, Emission e mais!</p>
                            <a href="#" class="btn hunter-btn">Explorar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar com Personagens -->
        <div class="col-md-4">
            <div class="hunter-card p-4">
                <h4 class="text-warning mb-4">Time Protagonista</h4>
                <div class="character-card mb-3">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/473d80f5-6c0c-4ba8-a6d3-072e9afc5153/d79der0-c10885ef-0a1a-4b5e-856a-4d3f2295b408.gif" class="img-fluid" alt="Killua Zoldyck">
                    <h5 class="mt-2">Killua Zoldyck</h5>
                    <small>Assassino Profissional</small>
                </div>
                <div class="character-card mb-3">
                    <img src="https://i.pinimg.com/originals/cd/11/40/cd1140abe0d65d16e234a31b09a157c4.gif" class="img-fluid" alt="Kurapika">
                    <h5>Kurapika</h5>
                    <small>Vingador dos Kurta</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Estilizado -->
<footer class="hunter-nav text-center py-3 mt-5">
    <p class="mb-0">© 2024 Hunter x Hunter Blog - Todos os direitos reservados à Yoshihiro Togashi</p>
</footer>
@endsection
