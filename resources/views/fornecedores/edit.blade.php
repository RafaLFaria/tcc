@extends('dashboard')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-primary">Editar Fornecedor</h1>
        <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $fornecedor->nome }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $fornecedor->cnpj }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $fornecedor->email }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" name="celular" id="celular" value="{{ $fornecedor->celular }}" required>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection