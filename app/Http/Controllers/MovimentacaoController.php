<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Estoque;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index(Request $request)
    {
        // Inicializa a consulta base
        $movimentacoes = Movimentacao::query();

        // Aplica os filtros de pesquisa
        if ($search = $request->input('search')) {
            $movimentacoes->whereHas('estoque.produto', function ($query) use ($search) {
                $query->where('nome', 'like', '%' . $search . '%');
            });
        }

        if ($tipo = $request->input('tipo')) {
            $movimentacoes->where('tipo', $tipo);
        }

        if ($dataInicio = $request->input('data_inicio')) {
            $movimentacoes->whereDate('data', '>=', $dataInicio);
        }

        if ($dataFim = $request->input('data_fim')) {
            $movimentacoes->whereDate('data', '<=', $dataFim);
        }

        // Ordenação
        if ($ordenarPor = $request->input('ordenar_por')) {
            switch ($ordenarPor) {
                case 'data_asc':
                    $movimentacoes->orderBy('data', 'asc');
                    break;
                case 'data_desc':
                    $movimentacoes->orderBy('data', 'desc');
                    break;
                case 'nome_asc':
                    $movimentacoes->join('estoque', 'estoque.id', '=', 'movimentacao.estoque_id')
                        ->join('produto', 'produto.id', '=', 'estoque.produto_id')
                        ->orderBy('produto.nome', 'asc');
                    break;
                case 'nome_desc':
                    $movimentacoes->join('estoque', 'estoque.id', '=', 'movimentacao.estoque_id')
                        ->join('produto', 'produto.id', '=', 'estoque.produto_id')
                        ->orderBy('produto.nome', 'desc');
                    break;
                case 'quantidade_asc':
                    $movimentacoes->orderBy('quantidade', 'asc');
                    break;
                case 'quantidade_desc':
                    $movimentacoes->orderBy('quantidade', 'desc');
                    break;
            }
        }

        // Carrega as movimentações com os relacionamentos necessários
        $movimentacoes = $movimentacoes->with('estoque.produto.unidade')->get();

        return view('movimentacao.index', compact('movimentacoes'));
    }

}

