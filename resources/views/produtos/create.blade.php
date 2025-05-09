@extends('dashboard')
@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-12">
                <h1>Adicionar Produto</h1>
                <form action="{{ route('produtos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="unidade_id">Unidade de Medida</label>
                        <select class="form-control" name="unidade_id" required>
                            @foreach ($unidades as $unidade)
                                <option value="{{ $unidade->id }}">{{ $unidade->sigla }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                    </div>
                    <div class="form-group">
                        <label for="cod_barras">Código de Barras</label>
                        <input type="text" class="form-control" name="cod_barras" placeholder="Código de Barras">
                    </div>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
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
