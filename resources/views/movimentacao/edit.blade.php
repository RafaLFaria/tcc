@extends('dashboard')
@section('content')
<div class="container">
    <h1>Editar Movimentação</h1>

    <form action="{{ route('movimentacao.update', $movimentacao) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="{{ $movimentacao->quantidade }}" required>
        </div>
        <div class="form-group">
            <label for="data_movimentacao">Data da Movimentação</label>
            <input type="date" name="data_movimentacao" class="form-control" value="{{ $movimentacao->data_movimentacao }}" required>
        </div>
        <div class="form-group">
            <label for="id_usuario">Usuário</label>
            <select name="id_usuario" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $movimentacao->id_usuario == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_produto">Produto</label>
            <select name="id_produto" class="form-control" required>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ $movimentacao->id_produto == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_tipo_movimentacao">Tipo de Movimentação</label>
            <select name="id_tipo_movimentacao" class="form-control" required>
                @foreach($tiposMovimentacao as $tipo)
                    <option value="{{ $tipo->id }}" {{ $movimentacao->id_tipo_movimentacao == $tipo->id ? 'selected' : '' }}>{{ $tipo->descricao }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection