{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin_dashboard') }}">Dashboard</a>
                    </li>

                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h1 class="mt-3">Hoşgeldiniz, Admin!</h1>
            </div>
        </div>
    </div>
@endsection
