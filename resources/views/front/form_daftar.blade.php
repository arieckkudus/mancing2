@extends('layouts.form-daftar')

@section('content')
    <div class="app-content p-md-3 p-lg-4">
        <div class="container-fluid px-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div style="display: flex; flex-direction: column;">
                        <a href="{{ route('form_daftar_individu') }}">daftar individu</a>
                        <a href="{{ route('form_daftar_komunitas') }}">daftar komunitas</a>
                        <a href="{{ route('form_daftar_usaha') }}">daftar usaha</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
