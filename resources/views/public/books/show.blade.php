@extends('layouts.app') {{-- Assuming a public layout, or use welcome.blade.php as base --}}

@section('content')
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <h1>Detail Buku</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover" class="img-fluid">
                    @else
                        <div class="text-center p-4 bg-light">No Cover</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text"><strong>Kode Buku:</strong> {{ $book->kode_buku }}</p>
                    <p class="card-text"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                    <p class="card-text"><strong>Penerbit:</strong> {{ $book->penerbit ?: 'Tidak ada' }}</p>
                    <p class="card-text"><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit ?: 'Tidak ada' }}</p>
                    <p class="card-text"><strong>Kategori:</strong> {{ $book->kategori ?: 'Tidak ada' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
