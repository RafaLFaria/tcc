@extends('dashboard')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 ">Tipos de Movimentação</h1>
        <a href="{{ route('tipo_movimentacao.create') }}" class="btn btn-primary mb-3">Adicionar Tipo de Movimentação</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tiposMovimentacao as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td>{{ $tipo->descricao }}</td>
                        <td>
                            <a href="{{ route('tipo_movimentacao.edit', $tipo) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('tipo_movimentacao.destroy', $tipo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este tipo de movimentação?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection