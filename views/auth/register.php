<?php

$registerError = $error ?? null;
?>

<div class="container">
  <div class="card">
    <h2>新規登録</h2>

    <?php if ($registerError): ?>
      <div class="alert">
        <?php if ($registerError === 'duplicate'): ?>
          すでに登録済みのメールアドレスです。
        <?php else: ?>
          入力内容を確認してください。
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="/register" class="form-grid">
      <label>
        ユーザー名
        <input type="text" name="username" required />
      </label>

      <label>
        メールアドレス
        <input type="email" name="email" required />
      </label>

      <label>
        パスワード
        <input type="password" name="password" required />
      </label>

      <button type="submit">登録する</button>
    </form>

    <p>
      すでにアカウントをお持ちの方は
      <a href="/login">ログイン</a>
    </p>
  </div>
</div>
