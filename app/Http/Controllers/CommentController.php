<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    // Armazenar o comentário
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|max:1000',
        ]);

        $post = Blog::findOrFail($postId); // Encontre o post

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id(); // Atribua o usuário autenticado ao comentário
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('blog.show', $post->id)->with('success', 'Comentário adicionado!');
    }

}
