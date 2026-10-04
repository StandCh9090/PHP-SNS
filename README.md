# PHP SNS

PHPでSNSアプリの基本機能を最初から作れるようにした最小構成です。

## 機能
- ユーザー登録
- ログイン / ログアウト
- 投稿の作成
- タイムライン表示

## 実行方法

1. 依存関係はPHP標準構成のみです。
2. サーバー起動

```bash
php -S localhost:8000 -t public
```

3. ブラウザで `http://localhost:8000` を開く

## データベース
- SQLite を使用
- 保存先: `storage/app.sqlite`

## 主要ファイル
- `public/index.php` - アプリの入口
- `app/Controllers/` - コントローラー
- `app/Models/` - モデル
- `views/` - 画面テンプレート

## 次の一手
- いいね機能
- コメント機能
- フォロー機能
- API化

必要なら次に、ユーザープロフィール機能や投稿詳細ページまで追加できます。
