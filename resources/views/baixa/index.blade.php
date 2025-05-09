@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Relatório de Baixas</h2>
        </div>
        <div class="pl-3">
            <a href="{{ route('baixa.create') }}" class="btn mb-3">Realizar baixa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Valor Unitário</th>
                            <th>Valor Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baixas as $baixa)
                            <tr>
                                <td>{{ $baixa->id }}</td>
                                <td>{{ $baixa->produto->nome ?? 'Produto não encontrado' }}</td>
                                <td>{{ $baixa->quantidade }}</td>
                                <td>{{ $baixa->produto->unidade->sigla }}</td>
                                <td>{{ number_format($baixa->valor / $baixa->quantidade, 2, ',', '.') }}</td>
                                <td>{{ number_format($baixa->valor, 2, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('baixa.destroy', $baixa->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir esta baixa?')">Excluir</button>
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
