@extends('layout')

@section('title', '投稿を編集')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">投稿を編集</h2>

                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="body" class="form-label">内容</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4" required>{{ $post->body }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">更新</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
