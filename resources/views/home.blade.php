<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('tema/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('tema/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('tema/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tema/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('tema/assets/demo/demo.css') }}" rel="stylesheet" />

    <style>
        body {
            background-color: rgb(154, 210, 140);
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 75px) {
            .h-custom {
                height: 100%;
            }
        }

        .container {
            position: relative;
            width: 650px;
            height: 400px;
        }

        img {
            position: absolute;
            bottom: -50;
            animation: pulo 2.5s infinite alternate;
        }

        @keyframes pulo {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-25px);
            }
        }

        .btn-custom {
            background-color: rgb(39, 139, 19);
            width: 400px;
            height: 50px;
            font-size: 1.1em;
            border-radius: 10px;
        }

        .color1 {
            #4d433d
        }

        ;

        .color2 {
            #525c5a
        }

        ;

        .color3 {
            #56877d
        }

        ;

        .color4 {
            #8ccc81
        }

        ;

        .color5 {
            #bade57
        }

        ;
    </style>
</head>

<body class="color4">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="container bg-custom  d-flex justify-content-center">
                    <img src="{{ asset('tema/assets/img/logoPad.png') }}" alt="Imagem Pulando" style="width: 400px">
                </div>

                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="text-center">
                        <h1>Bem-vindo(a)!</h1>
                        <h4><strong>Cuidar do estoque não precisa ser complicado.</strong><br>
                            A gente sabe que, no dia a dia do campo, tempo é valioso. Por isso, criamos uma plataforma
                            simples e eficiente pra te ajudar a controlar tudo que entra e sai da sua loja.
                            <br>
                            Com o nosso sistema, você tem o controle na palma da mão: sabe o que tem, o que falta e o
                            que está pra chegar — tudo de forma rápida e sem complicação.
                        </h4>
                        <a href="{{route('login')}}" class="btn btn-custom">Fazer Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 color4">
            <!-- Copyright -->
            <div class="credits ml-auto color4">
                <span class="copyright">
                    ©
                    <script>document.write(new Date().getFullYear())</script>, made by Rafa Faria
                </span>
            </div>
            <!-- Copyright -->
        </div>
    </section>

    <!-- Core JS Files -->
    <script src="{{ asset('tema/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('tema/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
    <script src="{{ asset('tema/assets/demo/demo.js') }}"></script>

</body>

</html>
