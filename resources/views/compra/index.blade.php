@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Relatório de Compras</h2>
        </div>
        <div class="pl-3">
            <a href="{{ route('compra.create') }}" class="btn mb-3">Realizar Compra</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Fornecedor</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Valor Unitário</th>
                            <th>Valor Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                            <tr>
                                <td>{{ $compra->id }}</td>
                                <td>{{ $compra->fornecedor->nome ?? 'Fornecedor não encontrado' }}</td>
                                <td>{{ $compra->produto->nome ?? 'Produto não encontrado' }}</td>
                                <td>{{ $compra->quantidade }}</td>
                                <td>{{ $compra->produto->unidade->sigla }}</td>
                                <td>{{ number_format($compra->valor, 2, ',', '.') }}</td>
                                <td>{{ number_format($compra->valor * $compra->quantidade, 2, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('compra.destroy', $compra->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir esta compra?')">Excluir</button>
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
