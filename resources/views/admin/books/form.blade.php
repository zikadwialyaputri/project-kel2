<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" value="{{ old('judul', $book->judul ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Penulis</label>
    <input type="text" name="penulis" value="{{ old('penulis', $book->penulis ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Kategori</label>
    <input type="text" name="kategori" value="{{ old('kategori', $book->kategori ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Tahun</label>
    <input type="number" name="tahun" value="{{ old('tahun', $book->tahun ?? '') }}" class="form-control">
</div>

<button class="btn btn-primary">{{ $submit ?? 'Simpan' }}</button>
