<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Estoque;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with( 'estoque', 'unidade')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('produtos.create', compact('unidades'));

    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:45',
            'descricao' => 'string|max:60|nullable',
            'imagem' => 'string|nulablle',
            'cod_barras' => 'string|max:45|nullable',
            'unidade_id' => 'integer|exists:unidade,id',
        ]);
        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }
    
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $unidades = Unidade::all();
        return view('produtos.edit', compact('produto', 'unidades'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:45',
            'descricao' => 'string|max:60',
            'cod_barras' => 'string|max:45|nullable',
            'unidade_id'=> 'integer|exists:unidade,id',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso!');
    }
}
