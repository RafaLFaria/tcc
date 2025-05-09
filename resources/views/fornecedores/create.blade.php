@extends('dashboard')

@section('content')
    <div class="card mr-50 col-12">
        <div class="card-header">
            <h2 class="card-title text-center">Cadastrar Fornecedor</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('fornecedores.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="CNPJ" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="celular" placeholder="Celular" required>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
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
            </div>
        </div>
    </div>
@endsection
