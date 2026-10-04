<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e($title ?? 'PHP SNS') ?></title>
  <link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>
  <header>
    <nav>
      <div class="brand"><a href="/" style="color: white;">PHP SNS</a></div>

      <div class="nav-links">
        <?php if (!empty($_SESSION['user'] ?? [])): ?>
          <span><?= e($_SESSION['user']['username'] ?? '') ?></span>
          <form method="POST" action="/logout" style="margin: 0;">
            <button type="submit" class="secondary">ログアウト</button>
          </form>
        <?php else: ?>
          <a href="/login" style="color: white;">ログイン</a>
          <a href="/register" style="color: white;">新規登録</a>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <?= $content ?? '' ?>
</body>
</html>
