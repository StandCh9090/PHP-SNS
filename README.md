# PHP SNS - Laravel版

Laravelで構築したシンプルなSNSアプリケーションです。

## 機能

- ユーザー認証・登録
- プロフィール表示
- 投稿の作成・表示
- タイムラインの表示
- Bootstrapを使用したレスポンシブデザイン

## セットアップ

### 前提条件

- PHP 8.2以上
- Composer
- Node.js 18以上

### インストール手順

```bash
# 1. 依存関係をインストール
composer install

# 2. 環境ファイルを設定
cp .env.example .env

# 3. アプリケーションキーを生成
php artisan key:generate

# 4. データベースを初期化
php artisan migrate

# 5. サーバーを起動
php artisan serve
```

## 使用方法

1. ブラウザで `http://localhost:8000` を開く
2. 右上の「新規登録」から新しいアカウントを作成
3. 作成したアカウントでログイン
4. タイムラインから投稿を作成・閲覧

## ディレクトリ構成

```
app/
├── Http/
│   ├── Controllers/      # コントローラー
│   ├── Requests/         # フォームリクエスト
│   └── Middleware/       # ミドルウェア
├── Models/               # Eloquentモデル
├── Policies/             # ポリシー
resources/
├── views/                # ビューテンプレート
routes/
├── web.php               # Webルート
database/
├── migrations/           # マイグレーション
├── seeders/              # シーダー
```

## 主要ファイル

- `routes/web.php` - ルート定義
- `app/Models/User.php` - ユーザーモデル
- `app/Models/Post.php` - 投稿モデル
- `app/Http/Controllers/AuthController.php` - 認証コントローラー
- `app/Http/Controllers/PostController.php` - 投稿コントローラー

## 今後の追加機能

- [ ] いいね機能
- [ ] コメント機能
- [ ] フォロー機能
- [ ] 通知機能
- [ ] API化
- [ ] 画像アップロード
- [ ] リアルタイム通知 (WebSocket)

## ライセンス

MIT License
