@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header text-center">
            <h2 class="card-title">Cadastro de Produtos</h2>
        </div>
        <div class="pl-3 text-left">
            <a href="{{ route('produtos.create') }}" class="btn mb-3">Adicionar Produto</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Unidade</th>
                            <th>Descrição</th>
                            <th>Cod Barra</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->unidade->sigla ?? 'Unidade não encontrada' }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->cod_barra ?? 'Não cadastrado' }}</td>
                                <td>
                                    <a href="{{ route('produtos.edit', $produto->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir este produto?')">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
