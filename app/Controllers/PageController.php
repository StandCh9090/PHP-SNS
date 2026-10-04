<?php

namespace App\Controllers;

use App\Core\Session;
use App\Core\View;
use App\Models\Post;

class PageController
{
    public function home(): void
    {
        if (Session::user()) {
            $posts = Post::all();
            View::render('feed', ['posts' => $posts, 'user' => Session::user()], 'タイムライン');
            return;
        }

        View::render('welcome', [], 'PHP SNS');
    }
}
