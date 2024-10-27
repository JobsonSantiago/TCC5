<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Configurações de Conta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .dashboard-container {
            display: flex;
            margin-top: 80px;
            /* Espaço para a navbar fixa */
        }

        .sidebar {
            width: 200px;
            background-color: #fff;
            padding: 30px 20px;
            height: 100vh;
            border-right: 1px solid #dee2e6;
            position: fixed;
        }

        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .greeting {
            font-size: 1.2rem;
            color: #333;
            margin-top: 10px;
        }

        .sidebar-links li {
            list-style: none;
            margin-bottom: 15px;
        }

        .sidebar-links a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }

        .sidebar-links a:hover {
            color: #1567be;
        }

        .sidebar-links .active a {
            color: #1567be;
            font-weight: 700;
        }

        .main-content {
            margin-left: 220px;
            padding: 40px;
            flex-grow: 1;
        }

        .section-title {
            font-weight: 600;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .data-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            color: #333;
            border-radius: 4px;
        }

        .btn-save {
            background-color: #333;
            color: #fff;
            border: none;
            font-weight: 600;
        }

        .btn-save:hover {
            background-color: #555;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            font-weight: 600;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Navbar adjustments */
        .navbar {
            height: 80px;
            /* Altura fixa para a navbar */
            background: linear-gradient(to right, #007bff, #0056b3);
            overflow: hidden;
            /* Garante que a logo não aumente a altura da navbar */
        }

        .logo-image {
            height: 140px;
            margin-top: -40px;
        }

        .profile-logo {
            height: 60px;
            width: 60px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid d-flex justify-content-center">
            <!-- Logo -->
            <a class="navbar-brand" href="home">
                <img src="images/logo_cb.png" alt="Logo" class="logo-image">
            </a>
        </div>
    </nav>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile-section">
                <img src="images/conta_tcc.png" alt="Perfil" class="profile-logo">
                <p class="greeting">Olá, {{ auth()->user()->name }}!</p>
            </div>
            <ul class="sidebar-links">
                <li class="active"><a href="dashboard">Dados pessoais</a></li>
                <li><a href="meus_favoritos">Favoritos</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1 class="section-title">Configurações de Conta</h1>

            <!-- Profile Information Form -->
            <div class="data-card">
                <h2 class="mb-3">Informações do perfil</h2>
                <p>Atualize as informações de perfil e endereço de e-mail da sua conta.</p>
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">Seu endereço de e-mail não está verificado.
                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900">Clique aqui para reenviar o e-mail de verificação.</button>
                            </p>
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-save">Salvar</button>
                </form>
            </div>

            <!-- Update Password Form -->
            <div class="data-card">
                <h2 class="mb-3">Atualizar senha</h2>
                <p>Certifique-se de que sua conta esteja usando uma senha longa e forte para permanecer segura.</p>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="current-password" class="form-label">Senha atual</label>
                        <input type="password" class="form-control" id="current-password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="new-password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirme sua Senha</label>
                        <input type="password" class="form-control" id="confirm-password" name="new_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-save">Salvar</button>
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="data-card">
                <h2 class="mb-3">Deletar Conta</h2>
                <p>Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, baixe todos os dados ou informações que deseja.</p>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-delete">Deletar Conta</button>
                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <br>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Você tem certeza que deseja deletar sua conta?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Uma vez que sua conta for deletada, todos os seus recursos e dados serão permanentemente excluídos. Por favor, insira sua senha para confirmar que você deseja deletar sua conta permanentemente.') }}
                            </p>

                            <div class="mt-6">
                                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-3/4"
                                    placeholder="{{ __('Senha') }}" />

                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancelar') }}
                                </x-secondary-button>

                                <button type="submit" class="btn btn-delete">Deletar</button>

                            </div>
                        </form>
                    </x-modal>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>