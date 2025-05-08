<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * - Validasi input komentar ('comment' wajib diisi dan maksimal 1000 karakter)
     * - Simpan komentar baru pada artikel tertentu, relasikan dengan user yang sedang login
     * - Tampilkan pesan sukses dan redirect ke halaman detail artikel
     */
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'comment' => 'required|max:1000',
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::id();
        $comment->article_id = $article->id;
        $comment->save();

        session()->flash('sukses', 'Berhasil menambahkan komentar!');

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    public function destroy(Comment $comment) {
        $articleId = $comment->article_id;

        $comment->delete();

        session()->flash('sukses', 'Berhasil menghapus komentar!');
        return redirect()->route('articles.show', ['article' => $articleId]);
    }
}