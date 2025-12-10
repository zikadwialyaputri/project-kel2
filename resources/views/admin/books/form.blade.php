<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Penulis</label>
        <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}">
        @error('author')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Penerbit</label>
        <input type="text" name="publisher" class="form-control"
            value="{{ old('publisher', $book->publisher ?? '') }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Tahun</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', $book->year ?? '') }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $book->category ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">ISBN</label>
        <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?? '') }}">
        @error('isbn')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $book->stock ?? 0) }}">
        @error('stock')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Cover</label>
        <input type="file" name="cover" class="form-control">
        @error('cover')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        @isset($book->cover)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $book->cover) }}" class="img-thumbnail" style="max-height: 120px;">
            </div>
        @endisset
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description', $book->description ?? '') }}</textarea>
    </div>
</div>
