@extends('layouts.admin')

@section('title', 'Daftar Buku')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1 class="h3 mb-0">Daftar Buku</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>
</div>

<form method="GET" class="mb-3 d-flex gap-2">
    <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="{{ request('search') }}">

    <select name="kategori" class="form-control">
        <option value="">Semua Kategori</option>
        <option value="Novel">Novel</option>
        <option value="Komik">Komik</option>
        <option value="Teknologi">Teknologi</option>
    </select>

    <button class="btn btn-primary">Filter</button>
</form>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $b)
                    <tr>
                        <td>{{ $b->kode_buku }}</td>
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->penulis }}</td>
                        <td>{{ $b->penerbit ?: '-' }}</td>
                        <td>{{ $b->kategori }}</td>
                        <td>{{ $b->tahun_terbit }}</td>
                        <td>
                            <a href="{{ route('books.show', $b->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('books.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form method="POST" action="{{ route('books.destroy', $b->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{ $books->links() }}

@endsection
