<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Buku | Perpustakaan Mini</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<div class="container py-4">

    <h2 class="mb-3">Katalog Buku Perpustakaan</h2>

    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari judul / penulis / kategori..."
                   value="{{ request('search') }}">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>

    <div class="row g-3">
        @forelse($books as $book)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">

                    @if($book->cover)
                        <img src="{{ asset('storage/'.$book->cover) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center"
                             style="height:200px;">
                            <small class="text-muted">No Cover</small>
                        </div>
                    @endif

                    <div class="card-body">
                        <h6 class="card-title mb-1">{{ $book->title }}</h6>
                        <p class="card-text small mb-1 text-muted">
                            {{ $book->author ?? 'Tidak diketahui' }}
                        </p>
                        <p class="card-text small mb-1">
                            Kategori: {{ $book->category ?? '-' }}
                        </p>
                        <p class="card-text small">
                            Stok: <strong>{{ $book->stock }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Belum ada data buku.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $books->links() }}
    </div>

</div>


</body>
</html>
