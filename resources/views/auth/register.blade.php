@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f4f4f9;">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
        <div class="card shadow-lg" style="padding: 20px; border-radius: 15px;">
            <div class="card-header text-center">
                <h3>{{ __('Cadastrar-se') }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Linha 1: Nome Completo e Nome de Usuário -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{ __('Nome Completo') }}</label>
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}"
                                   required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label">{{ __('Nome de Usuário') }}</label>
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror"
                                   name="username" value="{{ old('username') }}"
                                   required>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Linha 2: E-mail e CPF -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">{{ __('Endereço de E-mail') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                            <input id="cpf" type="text"
                                   class="form-control @error('cpf') is-invalid @enderror"
                                   name="cpf" value="{{ old('cpf') }}"
                                   required maxlength="11" minlength="11"
                                   oninput="this.value = this.value.replace(/\D/g, '')">
                            @error('cpf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Linha 3: Data de Nascimento e Senha -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dob" class="form-label">{{ __('Data de Nascimento') }}</label>
                            <input id="dob" type="date"
                                   class="form-control @error('dob') is-invalid @enderror"
                                   name="dob" value="{{ old('dob') }}"
                                   required>
                            @error('dob')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">{{ __('Senha') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Linha 4: Confirmar Senha -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password-confirm" class="form-label">{{ __('Confirmar Senha') }}</label>
                            <input id="password-confirm" type="password"
                                   class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Botão de Registro -->
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
                <p>{{ __('Já tem uma conta?') }} <a href="{{ route('login') }}">{{ __('Faça login') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
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
@endsection
