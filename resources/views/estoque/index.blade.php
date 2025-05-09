@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Relatório Produtos em Estoque</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            Código
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Quantidade
                        </th>
                        <th>
                            Unidade
                        </th>
                        <th>
                            Valor Unitário
                        </th>
                        <th>
                            Valor Total
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($estoques as $estoque)
                            <tr>
                                <td>{{$estoque->produto_id}}</td>
                                <td>{{$estoque->produto->nome}}</td>
                                <td>{{number_format($estoque->quantidade, 2, ',', '.')}}</td>
                                <td>{{$estoque->produto->unidade->sigla}}</td>
                                <td>{{number_format($estoque->valor, 2, ',', '.')}}</td>
                                <td>{{number_format($estoque->valor * $estoque->quantidade, 2, ',', '.')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
