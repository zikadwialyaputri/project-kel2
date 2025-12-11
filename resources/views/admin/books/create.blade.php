@extends('layouts.admin')

@section('title', 'Tambah Buku')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1 class="h3 mb-0">Tambah Buku</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.books.form', ['submit' => 'Tambah Buku'])
        </form>
    </div>
</div>
@endsection
