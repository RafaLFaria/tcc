@extends('dashboard')
@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-12">
                <h1>Cadastrar Unidade</h1>
                <form action="{{ route('unidade.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="sigla">Sigla</label>
                        <input type="text" class="form-control" name="sigla" placeholder="Sigla">
                    </div>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ route('unidade.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
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
            </div>

        </div>
    </div>
@endsection
