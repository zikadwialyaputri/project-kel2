<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Tampilkan daftar buku (dengan search, filter, pagination)
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // SEARCH (judul, penulis, kategori)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // FILTER KATEGORI
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // PAGINATION
        $books = $query->orderBy('judul', 'asc')->paginate(10);

        // Return appropriate view based on role
        $role = auth()->user()->role ?? 'public';
        if ($role === 'admin') {
            return view('admin.books.index', compact('books'));
        } elseif ($role === 'staff') {
            return view('staff.books.index', compact('books'));
        } else {
            return view('public.books.index', compact('books'));
        }
    }

    /**
     * Halaman tambah buku
     */
    public function create()
    {
        $role = auth()->user()->role ?? 'public';
        if ($role === 'admin') {
            return view('admin.books.create');
        } elseif ($role === 'staff') {
            return view('staff.books.create');
        } else {
            return view('public.books.create');
        }
    }

    /**
     * Simpan data buku baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail buku
     */
    public function show(Book $book)
    {
        $role = auth()->user()->role ?? 'public';
        if ($role === 'admin') {
            return view('admin.books.show', compact('book'));
        } elseif ($role === 'staff') {
            return view('staff.books.show', compact('book'));
        } else {
            return view('public.books.show', compact('book'));
        }
    }

    /**
     * Halaman edit buku
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update data buku
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|string|max:50|unique:books,kode_buku,' . $book->id,
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'kategori' => 'required|string|max:100',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            // Delete old cover if exists
            if ($book->cover && \Storage::disk('public')->exists($book->cover)) {
                \Storage::disk('public')->delete($book->cover);
            }
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Hapus buku
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku dihapus.');
    }
}
