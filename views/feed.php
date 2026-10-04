<?php

$user = $user ?? null;
$posts = $posts ?? [];
?>

<div class="container">
  <div class="row">
    <h2>タイムライン</h2>
    <span>ようこそ、<?= e($user['username'] ?? '') ?>さん</span>
  </div>

  <div class="card" style="margin-top: 20px;">
    <form method="POST" action="/posts" class="form-grid">
      <label>
        いまどうしてる？
        <textarea name="body" placeholder="何をつぶやきますか？" required></textarea>
      </label>

      <div class="row">
        <div></div>
        <button type="submit">投稿する</button>
      </div>
    </form>
  </div>

  <div class="feed-list">
    <?php if (empty($posts)): ?>
      <div class="card">
        <p>まだ投稿がありません。</p>
      </div>
    <?php else: ?>
      <?php foreach ($posts as $post): ?>
        <article class="post">
          <div class="post-header"><?= e($post['username'] ?? 'ユーザー') ?></div>
          <div><?= nl2br(e($post['body'] ?? '')) ?></div>
          <div class="meta"><?= e($post['created_at'] ?? '') ?></div>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
