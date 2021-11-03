# cloud-dev-exam

クラウド事業部採用試験リポジトリ

## 依存アプリケーション

- docker for desktop

## 環境構築

*docker の起動*

```shwll
$ docker compose up
```

mysql と slim アプリケーションの起動が始まります。  
以下の様なログが出力されたら準備完了です。

```shell
slim_1   | [Wed Nov  3 17:45:32 2021] PHP 8.0.12 Development Server (http://0.0.0.0:8080) started
```

## アプリケーション構成

本アプリケーションは JSON を返す REST API です。

*エンドポイント*
- GET /users
- GET /exams
- GET /scores

URLは http://localhost:8080 から確認できます。

*ディレクトリ構成*
主に本試験において見るべきファイルについてみ説明します。

```
.
├── app
│   ├── dependencies.php        // ログ、データベースのインスタンス生成
│   ├── middleware.php
│   ├── routes.php              // ルーティング
│   └── settings.php            // ログ出力設定、データベースの接続設定
├── docker                      // docker の設定
│   ├── mysql
│   │   └── db                  // mysql のテーブル、初期データの SQL はこちらに配置されています。
│   └── slim
├── public                      // アプリケーションの起点となる公開ディレクトリ
├── src
│   └── Application
│       ├── Actions             // 実際に手を加える必要があるソースはこちら
│       ├── Handlers
│       ├── Middleware
│       ├── ResponseEmitter
│       └── Settings
└── tests
    └── Application
        └── Actions             // 課題のレスポンスを検証するコードが配置されています。参照していただいて問題ありません。
```

## 問題

1. [GET /users] レスポンスから id=1 のユーザーを除外してください。
2. [GET /users] レスポンスのユーザー数を 10 にしてください。
3. [GET /exams] レスポンスの level の値を LEVEL_LABELS の name の値に変更してください。
4. [GET /scores] レスポンスに user_id に対応する name と exam_id に対応する name を追加してください。キー名はそれぞれ user_name, exam_name とし末尾に追加してください。

## テスト

以下で問題のレスポンスを検証するテストを実行することができます。

```
$ docker compose exec slim php composer.phar test
```
