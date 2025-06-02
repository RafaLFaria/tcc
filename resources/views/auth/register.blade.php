<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-image: url('/img/background.svg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-color: #ececec;
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    .box-area {
        width: 930px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 30px;
    }

    .right-box {
        padding: 40px 30px 40px 40px;
    }

    ::placeholder {
        font-size: 16px;
    }

    .rounded-4 {
        border-radius: 20px;
    }

    .rounded-5 {
        border-radius: 30px;
    }

    @media (max-width: 768px) {
        body {
            background-image: none;
        }

        .box-area {
            width: 90%;
            margin: 0 auto;
        }

        .left-box {
            height: 150px;
            overflow: hidden;
            display: none;
        }

        .right-box {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        body {
            background-image: none;
        }

        .box-area {
            width: 95%;
        }
    }
</style>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="imagex/png" href="{{ asset('img/academia.ico') }}">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Rancho fundo</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: rgb(114, 222, 87);">
                <div class="featured-image col-mb-8">
                    <img src="tema\assets\img\dois.jpg" class="img-fluid" style="width: 300px; margin-right: 15px">
                </div>

            </div>

            <div class="col-md-6 right-box">
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="header-text mb-4">
                        <h2>Bem Vindo!</h2>
                        <p>Crie sua conta para começar.</p>
                    </div>

                    <div class="input-group mb-3">
                        <x-input id="name" class="form-control form-control-lg bg-light fs-6" type="text" name="name"
                            :value="old('name')" required autofocus placeholder="Nome" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="email" class="form-control form-control-lg bg-light fs-6" type="email" name="email"
                            :value="old('email')" required placeholder="Email" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="password" class="form-control form-control-lg bg-light fs-6" type="password"
                            name="password" required placeholder="Senha" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input id="password_confirmation" class="form-control form-control-lg bg-light fs-6"
                            type="password" name="password_confirmation" required placeholder="Confirmar Senha" />
                    </div>

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" style="background-color: rgb(114, 222, 87);">{{ __('Registrar') }}</button>
                    </div>
                    <div class="row">
                        <small>Já possui cadastro? <a href="{{ route('login') }}">Log in</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
