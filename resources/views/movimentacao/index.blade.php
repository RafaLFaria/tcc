@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center"> Relatório de Movimentações Realizadas</h2>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('movimentacao.index') }}" class="mb-4">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="search">Nome do Produto</label>
                        <input type="text" name="search" id="search" class="form-control"
                            value="{{ request('search') }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tipo">Tipo de Movimentação</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="">Todos</option>
                            <option value="1" {{ request('tipo') == 1 ? 'selected' : '' }}>Compra</option>
                            <option value="2" {{ request('tipo') == 2 ? 'selected' : '' }}>Baixa</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="data_inicio">Data Início</label>
                        <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                            value="{{ request('data_inicio') }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="data_fim">Data Fim</label>
                        <input type="date" name="data_fim" id="data_fim" class="form-control"
                            value="{{ request('data_fim') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ordenar_por">Ordenar Por</label>
                        <select name="ordenar_por" id="ordenar_por" class="form-control">
                            <option value="">Selecione</option>
                            <option value="data_asc" {{ request('ordenar_por') == 'data_asc' ? 'selected' : '' }}>Data
                                (Menor para Maior)</option>
                            <option value="data_desc" {{ request('ordenar_por') == 'data_desc' ? 'selected' : '' }}>Data
                                (Maior para Menor)</option>
                            <option value="nome_asc" {{ request('ordenar_por') == 'nome_asc' ? 'selected' : '' }}>Nome (A-Z)
                            </option>
                            <option value="nome_desc" {{ request('ordenar_por') == 'nome_desc' ? 'selected' : '' }}>Nome
                                (Z-A)</option>
                            <option value="quantidade_asc"
                                {{ request('ordenar_por') == 'quantidade_asc' ? 'selected' : '' }}>Quantidade (Menor para
                                Maior)</option>
                            <option value="quantidade_desc"
                                {{ request('ordenar_por') == 'quantidade_desc' ? 'selected' : '' }}>Quantidade (Maior para
                                Menor)</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('movimentacao.index') }}" class="btn btn-secondary">Limpar Filtros</a>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Nome do Produto</th>
                        <th>Tipo Movimentação</th>
                        <th>Quantidade</th>
                        <th>Unidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor Total</th>
                        <th>Data Movimentação</th>
                    </thead>
                    <tbody>
                        @php
                            $totalQuantidade = 0;
                            $totalValor = 0;
                        @endphp

                        @foreach ($movimentacoes as $movimentacao)
                            <tr>
                                <td>{{ $movimentacao->estoque->produto->nome }}</td>
                                <td>
                                    @if ($movimentacao->tipo == 1)
                                        <b style="color:#85bb65">Compra</b>
                                    @elseif ($movimentacao->tipo == 2)
                                        <b style="color: rgb(241, 79, 79)">Baixa</b>
                                    @else
                                        Tipo Não Identificado
                                    @endif
                                </td>
                                <td>
                                    @php
                                        // Se a movimentação for tipo 2 (baixa), a quantidade é negativa
                                        $quantidade = $movimentacao->tipo == 2 ? -$movimentacao->quantidade : $movimentacao->quantidade;
                                        $totalQuantidade += $quantidade; // Acumula a quantidade com o sinal correto
                                    @endphp
                                    {{ number_format($quantidade, 2, ',', '.') }}
                                </td>
                                <td>{{ $movimentacao->estoque->produto->unidade->sigla }}</td>
                                <td>
                                    @php
                                        // Verifica se a quantidade é maior que 0 antes de realizar a divisão
                                        if ($movimentacao->tipo == 2 && $movimentacao->quantidade > 0) {
                                            $valorUnitario = $movimentacao->valor / $movimentacao->quantidade;
                                        } else {
                                            // Define um valor padrão ou trata o caso de quantidade igual a 0
                                            $valorUnitario = $movimentacao->valor;
                                        }
                                
                                        // Acumula o valor total, considerando a movimentação
                                        $totalValor += $movimentacao->tipo == 2 
                                            ? -($valorUnitario * $movimentacao->quantidade) 
                                            : ($valorUnitario * $movimentacao->quantidade);
                                    @endphp
                                    {{ number_format($valorUnitario, 2, ',', '.') }}
                                </td>
                                                              
                                <td>
                                    {{ number_format($valorUnitario * $quantidade, 2, ',', '.') }}
                                </td>                                
                                <td>{{ $movimentacao->data ? \Carbon\Carbon::parse($movimentacao->data)->format('H:i d/m/Y') : 'Data inválida' }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                            <td><b style="color: rgb(40, 158, 255)">{{ number_format($totalQuantidade, 2, ',', '.') }}</b></td>
                            <td></td>
                            <td></td>
                            <td><b style="color: rgb(40, 158, 255)">{{ number_format($totalValor, 2, ',', '.') }}</b></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
