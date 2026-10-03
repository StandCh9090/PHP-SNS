@extends('layout')

@section('title', 'PHP SNS')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">PHP SNS へようこそ</h1>
                <p class="card-text">Laravelで構築されたシンプルなSNSアプリケーションです。</p>
                <div class="d-grid gap-2 d-sm-flex">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">新規登録</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg">ログイン</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
