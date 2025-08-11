<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

//use App\Models\User;
//use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index()
    {



//        $user = User::where('email', '1234@gmail.com')->first();
//        $user->password = Hash::make('12345');
//        $user->save();





        // Відобразити всі пости
        $posts = Post::all();
        Post::with('comments.user')->get();
        return view('posts.index', compact('posts'));
    }



    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Завантаження зображення
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Post::create(
            [
                'title' => $validated['title'],
                'content' => $validated['content'],
                'image_path' => $imagePath ?? null,
            ]
        );
        return redirect()->route('posts.index')->with('success', 'Пост створино успішно');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Пост оновлено успішно');
    }

    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Пост видалено успішно');
    }

    public function like(Request $request, $postId)
    {
        $user = auth()->user();

        // Перевірити, чи користувач вже лайкнув пост
        $like = Like::where('user_id', $user->id)->where('post_id', $postId)->first();

        if ($like) {
            // Якщо вже лайкнув, видаляємо лайк
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            // Додати лайк
            Like::create([
                'user_id' => $user->id,
                'post_id' => $postId,
            ]);
            return response()->json(['liked' => true]);
        }
    }

}
