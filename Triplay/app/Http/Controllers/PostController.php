<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari tabel 'posts'
        $posts = Post::all();

        // Kirim data ke view 'posts.index'
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan view form tambah data

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 2. Simpan data ke database (membutuhkan $fillable di model Post)
        Post::create($request->all());

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil dibuat!');
    }

    /**
     * Display the specified resource. (Tidak wajib di CRUD dasar, tapi kita biarkan kosong dulu)
     */
    public function show(Post $post)
    {
        // Biasanya untuk menampilkan detail satu post
        $posts = Post::all();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Tampilkan view form edit dengan data $post
        $posts = Post::all();
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // 1. Validasi data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 2. Update data ke database
        $post->update($request->all());

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus data post
        $post->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('posts.index')
                         ->with('success', 'Post berhasil dihapus!');
    }
}
