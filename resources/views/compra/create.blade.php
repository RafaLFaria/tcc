@extends('dashboard')
@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-12">
                <h1>Cadastrar Compra</h1>
                <form action="{{ route('compra.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="produto_id">Produto a ser Comprado</label>
                        <select class="form-control" name="produto_id" required>
                            @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fornecedor_id">Fornecedor</label>
                        <select class="form-control" name="fornecedor_id" required>
                            @foreach ($fornecedores as $fornecedor)
                                <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor unitário</label>
                        <input type="text" class="form-control" name="valor" placeholder="Valor unitário">
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" class="form-control" name="quantidade" placeholder="Quantidade">
                    </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Atenção!</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-success">Registrar</button>
            <a href="{{ route('compra.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
