@extends('dashboard')
@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-12">
                <h1>Registrar Funcionário</h1>
                <form action="{{ route('funcionarios.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" placeholder="Senha" required>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Atenção!</strong><br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
