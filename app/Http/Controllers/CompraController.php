<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Estoque;
use App\Models\Fornecedor;
use App\Models\Movimentacao;
use App\Models\Produto;
use DB;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all();
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        $estoques = Estoque::all();
        return view('compra.index', compact('compras', 'fornecedores', 'produtos', 'estoques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();
        return view('compra.create', compact('produtos', 'fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'produto_id' => 'required|integer|exists:produto,id',
            'fornecedor_id' => 'required|integer|exists:fornecedor,id',
            'quantidade' => 'required|numeric|min:0.01',
            'valor' => 'required|numeric|min:0.01',
        ]);

        // Início de transação para garantir consistência
        DB::beginTransaction();

        try {
            // 1. Criar a linha na tabela `compra`
            $compra = Compra::create([
                'produto_id' => $request->produto_id,
                'fornecedor_id' => $request->fornecedor_id,
                'quantidade' => $request->quantidade,
                'valor' => $request->valor,
            ]);

            // 2. Buscar o registro do estoque relacionado ao produto
            $estoque = Estoque::firstOrCreate(
                ['produto_id' => $request->produto_id],
                ['quantidade' => 0, 'valor' => 0]
            );

            // Atualizar o valor médio do estoque (se necessário)
            $novaQuantidade = $estoque->quantidade + $request->quantidade;
            $estoque->valor = (($estoque->quantidade * $estoque->valor) + ($request->quantidade * $request->valor)) / $novaQuantidade;
            $estoque->quantidade = $novaQuantidade;
            $estoque->save();

            // 3. Criar a linha na tabela `movimentacao`
            Movimentacao::create([
                'quantidade' => $request->quantidade,
                'valor' => $request->valor,
                'data' => now(),
                'tipo' => 1, // Define o tipo como 'entrada'
                'estoque_id' => $estoque->id,
            ]);

            // Confirmar a transação
            DB::commit();

            return redirect()->route('compra.index')->with('success', 'Compra registrada com sucesso!');
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao registrar compra: ' . $e->getMessage());
        }
    }




    public function edit(string $id)
    {
        $compra = Compra::findOrFail($id);
        $produtos = Produto::all();
        $fornecedores = Fornecedor::all();

        return view('compra.edit', compact('compra', 'produtos', 'fornecedores'));
    }


    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'produto_id' => 'required|integer|exists:produto,id',
            'fornecedor_id' => 'required|integer|exists:fornecedor,id',
            'quantidade' => 'required|numeric|min:0.01',
            'valor' => 'required|numeric|min:0.01',
        ]);

        // Início de transação para garantir consistência
        DB::beginTransaction();

        try {
            // Buscar a compra existente
            $compra = Compra::findOrFail($id);

            // Buscar o estoque associado ao produto atual da compra
            $estoque = Estoque::where('produto_id', $compra->produto_id)->firstOrFail();

            // Reverter a compra antiga no estoque
            $estoque->quantidade -= $compra->quantidade;
            if ($estoque->quantidade > 0) {
                $estoque->valor = (($estoque->quantidade * $estoque->valor) - ($compra->quantidade * $compra->valor)) / $estoque->quantidade;
            } else {
                $estoque->valor = 0;
            }
            $estoque->save();

            // Atualizar os dados da compra
            $compra->update([
                'produto_id' => $request->produto_id,
                'fornecedor_id' => $request->fornecedor_id,
                'quantidade' => $request->quantidade,
                'valor' => $request->valor,
            ]);

            // Se o produto mudou, buscar ou criar o estoque do novo produto
            if ($compra->produto_id !== $estoque->produto_id) {
                $estoque = Estoque::firstOrCreate(
                    ['produto_id' => $request->produto_id],
                    ['quantidade' => 0, 'valor' => 0]
                );
            }

            // Atualizar o estoque com os novos valores da compra
            $novaQuantidade = $estoque->quantidade + $request->quantidade;
            $estoque->valor = (($estoque->quantidade * $estoque->valor) + ($request->quantidade * $request->valor)) / $novaQuantidade;
            $estoque->quantidade = $novaQuantidade;
            $estoque->save();

            // Atualizar a movimentação associada
            $movimentacao = Movimentacao::where('estoque_id', $estoque->id)
                ->where('tipo', 1) // Tipo 'entrada'
                ->where('quantidade', $compra->quantidade)
                ->where('valor', $compra->valor)
                ->first();

            if ($movimentacao) {
                $movimentacao->update([
                    'quantidade' => $request->quantidade,
                    'valor' => $request->valor,
                    'data' => now(),
                ]);
            } else {
                // Criar uma nova movimentação se não existir
                Movimentacao::create([
                    'quantidade' => $request->quantidade,
                    'valor' => $request->valor,
                    'data' => now(),
                    'tipo' => 1,
                    'estoque_id' => $estoque->id,
                ]);
            }

            // Confirmar a transação
            DB::commit();

            return redirect()->route('compra.index')->with('success', 'Compra atualizada com sucesso!');
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao atualizar compra: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        // Início de transação para garantir consistência
        DB::beginTransaction();

        try {
            // Buscar a compra pelo ID
            $compra = Compra::findOrFail($id);

            // Buscar o estoque associado ao produto da compra
            $estoque = Estoque::where('produto_id', $compra->produto_id)->firstOrFail();

            // Reverter a compra no estoque
            $estoque->quantidade -= $compra->quantidade;
            if ($estoque->quantidade > 0) {
                $estoque->valor = (($estoque->quantidade * $estoque->valor) - ($compra->quantidade * $compra->valor)) / $estoque->quantidade;
            } else {
                $estoque->valor = 0;
            }
            $estoque->save();

            // Remover a movimentação associada à compra
            Movimentacao::where('estoque_id', $estoque->id)
                ->where('tipo', 1) // Tipo 'entrada'
                ->where('quantidade', $compra->quantidade)
                ->where('valor', $compra->valor)
                ->delete();

            // Excluir a compra
            $compra->delete();

            // Confirmar a transação
            DB::commit();

            return redirect()->route('compra.index')->with('success', 'Compra excluída com sucesso!');
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao excluir compra: ' . $e->getMessage());
        }
    }

}
