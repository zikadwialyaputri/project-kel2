@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3 mb-0">Dashboard</h1>
            <p class="text-muted mb-0">
                Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }}).
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card flex-fill">
                <div class="card-body">
                    <h5 class="card-title mb-2">Total Buku</h5>
                    <p class="h3 mb-0">{{ \App\Models\Book::count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card flex-fill">
                <div class="card-body">
                    <h5 class="card-title mb-2">Total Peminjaman Aktif</h5>
                    <p class="h3 mb-0">{{ \App\Models\Loan::where('status', 'borrowed')->count() }}</p>
                </div>
            </div>
        </div>

        @if (auth()->user()->role === 'admin')
            <div class="col-md-4">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Total Staff</h5>
                        <p class="h3 mb-0">{{ \App\Models\User::where('role', 'staff')->count() }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
