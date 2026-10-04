<?php

namespace App\Controllers;

use App\Core\Session;
use App\Core\View;
use App\Models\Post;

class PostController
{
    public function feed(): void
    {
        Session::requireAuth();

        $posts = Post::all();
        View::render('feed', ['posts' => $posts, 'user' => Session::user()], 'タイムライン');
    }

    public function create(): void
    {
        Session::requireAuth();

        $body = trim($_POST['body'] ?? '');

        if ($body !== '') {
            Post::create((int) Session::user()['id'], $body);
        }

        redirect('/');
    }
}
