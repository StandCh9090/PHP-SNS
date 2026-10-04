<?php

namespace App\Controllers;

use App\Core\Session;
use App\Core\View;
use App\Models\User;

class AuthController
{
    public function showLogin(): void
    {
        if (Session::user()) {
            redirect('/');
        }

        View::render('auth/login', ['error' => $_GET['error'] ?? null], 'ログイン');
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password_hash'])) {
            Session::login($user);
            redirect('/');
        }

        redirect('/login?error=1');
    }

    public function showRegister(): void
    {
        if (Session::user()) {
            redirect('/');
        }

        View::render('auth/register', ['error' => $_GET['error'] ?? null], '新規登録');
    }

    public function register(): void
    {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $email === '' || $password === '') {
            redirect('/register?error=1');
        }

        if (User::findByEmail($email)) {
            redirect('/register?error=duplicate');
        }

        $userId = User::create($username, $email, $password);
        $user = User::findById($userId);

        if ($user) {
            Session::login($user);
        }

        redirect('/');
    }

    public function logout(): void
    {
        Session::logout();
        redirect('/login');
    }
}
