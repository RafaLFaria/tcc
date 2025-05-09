@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Cadastro de Unidades</h2>
        </div>
        <div class="pl-3">
            <a href="{{ route('unidade.create') }}" class="btn mb-3">Adicionar Unidade</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidades as $unidade)
                        <tr>
                            <td>{{ $unidade->nome }}</td>
                            <td>{{ $unidade->sigla }}</td>
                            <td>
                                <a href="{{ route('unidade.edit', $unidade->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('unidade.destroy', $unidade->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir esta unidade?')">Deletar</button>
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
