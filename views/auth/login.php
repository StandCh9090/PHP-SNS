<?php

$loginError = $error ?? null;
?>

<div class="container">
  <div class="card">
    <h2>ログイン</h2>

    <?php if ($loginError): ?>
      <div class="alert">メールアドレスまたはパスワードが違います。</div>
    <?php endif; ?>

    <form method="POST" action="/login" class="form-grid">
      <label>
        メールアドレス
        <input type="email" name="email" required />
      </label>

      <label>
        パスワード
        <input type="password" name="password" required />
      </label>

      <button type="submit">ログイン</button>
    </form>

    <p>
      アカウントをお持ちでない方は
      <a href="/register">新規登録</a>
    </p>
  </div>
</div>
