<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Перевірка на авторизацію
        $request->validate([
            'comment' => 'required|string|max:1000',
            'post_id' => 'required|exists:posts,id',
        ]);

        // Створення коментаря
        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id(); // Отримання поточного користувача
        $comment->save();

        // Повернення назад до посту
        return back()->with('success', 'Коментар успішно додано!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = Comment::find($id);

        if (!$comment || $comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Ви не можете змінити цей коментар.');
        }

        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Коментар оновлено.');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment || $comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Ви не можете видалити цей коментар.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Коментар видалено.');
    }

}
