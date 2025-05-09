@extends('dashboard')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-primary">Editar Tipo de Movimentação</h1>

        <form action="{{ route('tipo_movimentacao.update', $tipoMovimentacao) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control" value="{{ $tipoMovimentacao->descricao }}" required maxlength="7">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('tipo_movimentacao.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection