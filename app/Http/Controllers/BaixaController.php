<?php

namespace App\Http\Controllers;

use App\Models\Baixa;
use App\Models\Estoque;
use App\Models\Movimentacao;
use App\Models\Produto;
use DB;
use Illuminate\Http\Request;

class BaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baixas = Baixa::all();
        return view('baixa.index', compact('baixas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        return view('baixa.create', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'produto_id' => 'required|integer|exists:produto,id',
            'quantidade' => 'required|numeric|min:0.01',
        ]);

        // Início de transação para garantir consistência
        DB::beginTransaction();

        try {
            // 1. Buscar o registro do estoque relacionado ao produto
            $estoque = Estoque::where('produto_id', $request->produto_id)->first();

            if (!$estoque || $estoque->quantidade < $request->quantidade) {
                throw new \Exception('Estoque insuficiente para realizar a baixa.');
            }

            // Calcular o valor da baixa com base no valor unitário do estoque
            $valorUnitario = $estoque->valor;
            $valorTotal = $valorUnitario * $request->quantidade;

            // 2. Criar a linha na tabela `baixa`
            $baixa = Baixa::create([
                'produto_id' => $request->produto_id,
                'quantidade' => $request->quantidade,
                'valor' => $valorTotal,
                'data' => now(),
            ]);

            // 3. Atualizar o estoque reduzindo a quantidade
            $estoque->quantidade -= $request->quantidade;

            // Atualizar o valor do estoque (mantém o mesmo valor unitário)
            $estoque->valor = ($estoque->quantidade > 0) ? $valorUnitario : 0;
            $estoque->save();

            // 4. Criar a linha na tabela `movimentacao`
            Movimentacao::create([
                'quantidade' => $request->quantidade,
                'valor' => $valorTotal,
                'data' => now(),
                'tipo' => 2, // Define o tipo como 'saida'
                'estoque_id' => $estoque->id,
            ]);

            // Confirmar a transação
            DB::commit();

            return redirect()->route('baixa.index')->with('success', 'Baixa registrada com sucesso!');
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao registrar baixa: ' . $e->getMessage());
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Início de transação para garantir consistência
        DB::beginTransaction();

        try {
            // 1. Buscar a baixa pelo ID
            $baixa = Baixa::findOrFail($id);

            // 2. Buscar o estoque relacionado ao produto da baixa
            $estoque = Estoque::where('produto_id', $baixa->produto_id)->firstOrFail();

            // Reverter a baixa no estoque
            $estoque->quantidade += $baixa->quantidade;

            // Atualizar o valor do estoque (mantém o mesmo valor unitário ou ajusta conforme necessário)
            // Verificar se a quantidade no estoque é maior que 0 para evitar divisão por zero
            if ($estoque->quantidade > 0) {
                // Atualizar o valor do estoque com base no valor da baixa
                $estoque->valor = (($estoque->quantidade * $estoque->valor) + $baixa->valor) / $estoque->quantidade;
            } else {
                // Se o estoque ficou vazio, definimos o valor como 0
                $estoque->valor = 0;
            }

            $estoque->save();


            // 3. Remover a movimentação associada à baixa
            Movimentacao::where('estoque_id', $estoque->id)
                ->where('tipo', 2) // Tipo 'saida'
                ->where('quantidade', $baixa->quantidade)
                ->where('valor', $baixa->valor)
                ->delete();

            // 4. Excluir a baixa
            $baixa->delete();

            // Confirmar a transação
            DB::commit();

            return redirect()->route('baixa.index')->with('success', 'Baixa excluída com sucesso!');
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao excluir baixa: ' . $e->getMessage());
        }
    }

}
