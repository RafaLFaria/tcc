@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Cadastro de Fornecedores</h2>
        </div>
        <div class="pl-3">
            <a href="{{ route('fornecedores.create') }}" class="btn mb-3">Adicionar Fornecedor</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->cnpj }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>{{ $fornecedor->celular }}</td>
                                <td>
                                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">Excluir</button>
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
