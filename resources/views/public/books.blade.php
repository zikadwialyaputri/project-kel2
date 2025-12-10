@extends('layouts.public')

@section('content')
    <div class="container py-4">
        <h1 class="mb-3">Katalog Buku</h1>

        <form method="GET" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="{{ request('search') }}">
        </form>

        <div class="row g-3">
            @forelse($books as $book)
                <div class="col-md-3">
                    <div class="card h-100">
                        @if ($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top"
                                style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h6 class="card-title">{{ $book->title }}</h6>
                            <p class="card-text small text-muted">{{ $book->author }}</p>
                            <p class="card-text small">Stok: {{ $book->stock }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada buku yang bisa ditampilkan.</p>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $books->links() }}
        </div>
    </div>
@endsection
