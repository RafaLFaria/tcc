@extends('dashboard')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-primary">Adicionar Movimentação</h1>

        <form action="{{ route('movimentacao.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" name="quantidade" class="form-control" required placeholder="Digite a quantidade">
            </div>

            <div class="form-group mb-3">
                <label for="data_movimentacao" class="form-label">Data da Movimentação</label>
                <input type="date" name="data_movimentacao" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="id_usuario" class="form-label">Usuário</label>
                <select name="id_usuario" class="form-control" required>
                    <option value="" disabled selected>Selecione o usuário</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="id_produto" class="form-label">Produto</label>
                <select name="id_produto" class="form-control" required>
                    <option value="" disabled selected>Selecione o produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="id_tipo_movimentacao" class="form-label">Tipo de Movimentação</label>
                <select name="id_tipo_movimentacao" class="form-control" required>
                    <option value="" disabled selected>Selecione o tipo de movimentação</option>
                    @foreach ($tiposMovimentacao as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Adicionar</button>
        </form>
    </div>
    </div>
@endsection
