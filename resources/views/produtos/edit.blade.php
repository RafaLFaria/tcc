@extends('dashboard')
@section('content')
    <div class="container mt-5">
        <h1>Editar Produto</h1>
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}" required>
            </div>
            <div class="form-group">
                <label for="unidade_id">Unidade de Medida</label>
                <select class="form-control" name="unidade_id" required>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ $unidade->id == $produto->unidade_id ? 'selected' : '' }}>
                            {{ $unidade->sigla }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $produto->descricao }}"
                    required>
            </div>
            <div class="form-group">
                <label for="cod_barras">Código de Barras</label>
                <input type="text" class="form-control" name="cod_barras" id="cod_barras"
                    value="{{ $produto->cod_barras }}">
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
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
@endsection
