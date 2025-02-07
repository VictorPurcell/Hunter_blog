<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::with('user')->latest()->paginate(6);
        return view('blog.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Blog::find($id);

        // Se o post não for encontrado, exibe erro 404
        if (!$post) {
            abort(404);
        }

        // Retorna a view 'blog.show' com o post
        return view('blog.show', compact('post'));
    }


    public function create()
    {
        return view('blog.create');
    }
    public function edit()
    {
        return view('blog.edit')->with('success', 'Post Editado!');;


    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'required|in:Exame Hunter,Nen,Chimera Ant,Greed Island',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $imagePath = $request->file('image')?->store('posts', 'public');

    // Corrigido: Adicione o user_id aos dados validados
    auth()->user()->blog()->create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'category' => $validated['category'],
        'image_path' => $imagePath
    ]);

    return redirect()->route('blog.index')->with('success', 'Post criado!');
}
    }
