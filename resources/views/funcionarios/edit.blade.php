@extends('dashboard')
@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-12">
                <h1>Editar Funcionário</h1>
                <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" value="{{ $funcionario->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{ $funcionario->email }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha (deixe em branco para manter a atual)</label>
                        <input type="password" class="form-control" name="password" placeholder="Nova senha">
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
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
