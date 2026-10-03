<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 投稿一覧（タイムライン）を表示
     */
    public function index(): View
    {
        $posts = Post::with('user')
            ->latest()
            ->paginate(20);

        return view('posts.index', compact('posts'));
    }

    /**
     * 投稿作成フォームを表示
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * 投稿を保存
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:500'],
        ]);

        Auth::user()->posts()->create($validated);

        return redirect(route('posts.index'))->with('success', '投稿しました。');
    }

    /**
     * 投稿詳細を表示
     */
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * 投稿編集フォームを表示
     */
    public function edit(Post $post): View
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * 投稿を更新
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'body' => ['required', 'string', 'max:500'],
        ]);

        $post->update($validated);

        return redirect(route('posts.show', $post))->with('success', '投稿を更新しました。');
    }

    /**
     * 投稿を削除
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'))->with('success', '投稿を削除しました。');
    }
}
