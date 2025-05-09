@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Cadastro de Funcionário</h2>
        </div>
        <div class="pl-3">
            <a href="{{ route('funcionarios.create') }}" class="btn mb-3">Adicionar funcionario</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td>{{ $funcionario->name }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>
                                    <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir este funcionario?')">Excluir</button>
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
