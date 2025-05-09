@extends('dashboard')
@section('content')
    <div class="container bootstrap snippet">
        <div class="profile-header text-center">
            <h1>{{ auth()->user()->name }}</h1>
        </div>

        @livewire('profile.update-profile-information-form')

        <div class="section-border"></div>

        @livewire('profile.update-password-form')
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Para sair da sessão clique em Logout.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
