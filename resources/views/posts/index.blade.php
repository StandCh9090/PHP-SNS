@extends('layout')

@section('title', 'タイムライン')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">新規投稿</h5>
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" placeholder="いまどうしてる？" rows="4" required></textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">投稿する</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @forelse ($posts as $post)
                    <div class="post">
                        <div class="post-header">{{ $post->user->name }}</div>
                        <p class="mb-2">{{ $post->body }}</p>
                        <div class="post-meta">{{ $post->created_at->format('Y年m月d日 H:i') }}</div>
                        @can('update', $post)
                            <div class="mt-2">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">編集</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                                </form>
                            </div>
                        @endcan
                    </div>
                @empty
                    <p class="text-muted">投稿がまだありません。</p>
                @endforelse
            </div>
        </div>

        @if ($posts->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
