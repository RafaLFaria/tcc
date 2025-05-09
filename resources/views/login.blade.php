<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>

    <!-- Ícones e fontes -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Arquivos CSS -->
    <link href="{{ asset('tema/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tema/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #D2B48C;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #8B4513;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #8B4513;
        }

        .text-muted {
            color: #6c757d !important;
            font-size: 14px;
        }

        .login-footer {
            margin-top: 15px;
            text-align: center;
        }

        .login-footer a {
            color: #8B4513;
            font-size: 14px;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <x-guest-layout>
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Senha') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-button class="ms-4">
                            {{ __('Entrar') }}
                        </x-button>

                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>

    </div>

    <!-- Arquivos JS principais -->
    <script src="{{ asset('tema/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/paper-dashboard.min.js?v=2.0.1') }}"></script>
</body>

</html>
