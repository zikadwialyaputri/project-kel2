<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
        }

        // Filter by category
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', $request->kategori);
        }

        $books = $query->paginate(10);

        // Determine view based on user role
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return view('admin.books.index', compact('books'));
            } elseif (auth()->user()->role === 'staff') {
                return view('staff.books.index', compact('books'));
            }
        }

        // Public view
        return view('public.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Only admin can store books
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'kode_buku' => 'required|unique:books,kode_buku',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'kategori' => 'nullable|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Only admin can edit books
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $book = Book::findOrFail($id);
        return view('admin.books.form', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Only admin can delete books
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $book = Book::findOrFail($id);

        // Delete cover file if exists
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
