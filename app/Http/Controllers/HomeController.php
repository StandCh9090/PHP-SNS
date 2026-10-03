<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * ホームページを表示
     */
    public function index(): View
    {
        return view('welcome');
    }
}
