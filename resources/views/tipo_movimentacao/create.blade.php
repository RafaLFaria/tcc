@extends('dashboard')
@section('content')

        <div class="container mt-5">
            <h1 class="mb-4">Adicionar Tipo de Movimentação</h1>

            <form action="{{ route('tipo_movimentacao.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" required maxlength="7" placeholder="Digite a descrição">
                </div>
                <button type="submit" class="btn w-100">Adicionar</button>
            </form>
        </div>
    </div>
@endsection