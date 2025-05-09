<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Movimentacao;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Lista de produtos
    public function getProdutos()
    {
        $produtos = Produto::with('estoque', 'unidade')->get();

        // Retorna os dados como JSON
        return response()->json([
            'success' => true,
            'data' => $produtos
        ], 200);
    }

    // Lista de fornecedores
    public function getFornecedores()
    {
        $fornecedores = Fornecedor::all();

        // Retorna os dados como JSON
        return response()->json([
            'success' => true,
            'data' => $fornecedores
        ], 200);
    }

    // Relatório de movimentações
    public function getRelatorio(Request $request)
    {
        $query = Movimentacao::query();

        // Filtros
        if ($request->filled('search')) {
            $query->whereHas('estoque.produto', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('data_inicio')) {
            $query->whereDate('data', '>=', $request->data_inicio);
        }

        if ($request->filled('data_fim')) {
            $query->whereDate('data', '<=', $request->data_fim);
        }

        // Ordenação
        if ($request->filled('ordenar_por')) {
            $ordenarPor = $request->ordenar_por;
            switch ($ordenarPor) {
                case 'data_asc':
                    $query->orderBy('data', 'asc');
                    break;
                case 'data_desc':
                    $query->orderBy('data', 'desc');
                    break;
                case 'nome_asc':
                    $query->whereHas('estoque.produto', function ($q) {
                        $q->orderBy('nome', 'asc');
                    });
                    break;
                case 'nome_desc':
                    $query->whereHas('estoque.produto', function ($q) {
                        $q->orderBy('nome', 'desc');
                    });
                    break;
                case 'quantidade_asc':
                    $query->orderBy('quantidade', 'asc');
                    break;
                case 'quantidade_desc':
                    $query->orderBy('quantidade', 'desc');
                    break;
            }
        }

        $movimentacoes = $query->with(['estoque.produto.unidade'])->get();

        // Retorna os dados como JSON
        return response()->json([
            'success' => true,
            'data' => $movimentacoes
        ], 200);
    }

    public function getFuncionarios()
    {
        $funcionarios = User::all();

        // Retorna os dados como JSON
        return response()->json([
            'success' => true,
            'data' => $funcionarios
        ], 200);
    }

}
