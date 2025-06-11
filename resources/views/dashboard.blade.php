<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('tema/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('tema/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title', 'Dashboard')
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
        name="viewport" />
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('tema/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tema/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <style>
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

        /* Cor do ícone na aba ativa */
        .nav li.active i.nc-icon {
            color: rgb(34, 167, 67) !important;
            /* Use a cor desejada (color3 neste exemplo) */
        }

        .nav li.active i.bi {
            color: rgb(34, 167, 67) !important;
            /* Use a cor desejada (color3 neste exemplo) */
        }

        /* Mantém a cor original do texto */
        .nav li.active p {
            color: inherit !important;
            /* Mantém a cor padrão do texto */
        }

        /* Corrige o hover para não afetar o ícone */
        .nav li:not(.active) a:hover i.nc-icon {
            color: inherit !important;
        }

        ;
    </style>
</head>

<body class="d-flex flex-column min-vh-100" style="">
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-color="white">
            <div class="logo">
                <a href="{{ url('dashboard') }}" class="simple-text logo-normal">
                    <img src="{{ asset('tema/assets/img/logoPad.png') }}" alt="Logo" style="width: 55px; height: 45px;">
                    Rancho Fundo
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="{{ url('dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Início</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('perfil') ? 'active' : '' }}">
                        <a href="{{ url('perfil') }}">
                            <i class="bi bi-person"></i>
                            <p>Perfil Usuário</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('produtos') ? 'active' : '' }}">
                        <a href="{{ url('produtos') }}">
                            <i class="nc-icon nc-box"></i>
                            <p>Cadastrar Produtos</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('unidade') ? 'active' : '' }}">
                        <a href="{{ url('unidade') }}">
                            <i class="bi bi-journal-text"></i>
                            <p>Cadastrar Unidades</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('fornecedores') ? 'active' : '' }}">
                        <a href="{{ url('fornecedores') }}">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>Cadastrar Fornecedores</p>
                        </a>
                    </li>
                    @if (Auth::user() && Auth::user()->is_admin)
                        <li class="{{ Request::is('funcionarios') ? 'active' : '' }}">
                            <a href="{{ url('funcionarios') }}">
                                <i class="bi bi-person-add"></i>
                                <p>Cadastrar Funcionário</p>
                            </a>
                        </li>

                    @endif
                    <li class="{{ Request::is('compra') ? 'active' : '' }}">
                        <a href="{{ url('compra') }}">
                            <i class="bi bi-basket2"></i>
                            <p>Lançar Compra</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('baixa') ? 'active' : '' }}">
                        <a href="{{ url('baixa') }}">
                            <i class="nc-icon nc-simple-remove"></i>
                            <p>Lançar Baixa</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('estoque') ? 'active' : '' }}">
                        <a href="{{ url('estoque') }}">
                            <i class="bi bi-clipboard-data"></i>
                            <p>Estoque</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('movimentacao') ? 'active' : '' }}">
                        <a href="{{ url('movimentacao') }}">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Movimentação</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Main Panel -->
        <div class="main-panel" style="height: 100vh;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">@yield('title')</a>
                    </div>
                </div>
            </nav>
            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- Footer -->
            <footer class="footer" style="position: absolute; bottom: 1; width: 100%;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                © {{ date('Y') }}, made by Rafaela Faria
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('tema/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('tema/assets/js/paper-dashboard.min.js?v=2.0.1') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbarToggle = document.querySelector('.navbar-toggle');
            const body = document.body;

            if (navbarToggle) {
                navbarToggle.addEventListener('click', function () {
                    if (body.classList.contains('nav-open')) {
                        body.classList.remove('nav-open');
                        document.getElementById('bodyClick')?.remove();
                    } else {
                        body.classList.add('nav-open');
                        const div = document.createElement('div');
                        div.id = 'bodyClick';
                        div.onclick = function () {
                            body.classList.remove('nav-open');
                            div.remove();
                        };
                        document.body.appendChild(div);
                    }
                });
            }
        });
    </script>
</body>

</html>
