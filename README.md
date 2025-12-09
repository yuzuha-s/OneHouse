# OneHouse.

## ディレクトリ構成

docs/
|変更あり|ファイルリンク|ファイル| |
|:----:|----|----|---|
| |[アプリテーマ](docs/focus.md) |focus.md |※のちのち要件定義に一本化する |
| |[要件定義](docs/requirements.md)　　　|requirements.md |
| 〇 |[業務フロー](docs/business_flow.md)　|business_flow.md |
| 〇|[システム構成図](docs/infra.svg)　|architecture.md |
|〇 |[テーブル定義書](docs/database_schema.md)　|database_schema.md |
|〇|[画面遷移図・ワイヤーフレーム](docs/screen_transition.md)　|screen_transition.md |

---

## コア機能進捗

| テスト  |   ⏳ 予定タスク   | コア機能                          | アクセスページ       |
| :-----: | :---------------: | --------------------------------- | -------------------- |
|         | テスト・UI 微調整 | チェックリスト機能                | /phase1.5            |
|         | テスト・UI 微調整 | メーカー訪問記録機能              | /phase2              |
|         | テスト・UI 微調整 | 住宅ローンシミレーショ ApexCharts | /phase3              |
| ☑ 11/26 |     UI 微調整     | 建物面積計算                      | /phase4              |
|         |         ☑         | ログイン・ログアウト・新規登録    | ログイン・ログアウト |

## 静的解析

- 11/9 ✔PHPCS (PHP CodeSniffer) ・　 ✔PHPstan 　・　 ✔ESLint

## 環境構築

- バックエンド
  - PHP 8.3.4 / Laravel 12
- フロントエンド
  - HTML/CSS
  - JavaScript、Vue.js
- データベース
  - MySQL
- インフラ
  - AWS
  - Apache
- バージョン管理
  - Git/GitHub
- CI/CD
  - PHP Code Sniffer
  - ES Lint
  - Prettier
- チャート
  - ApexCharts
- 認証

  - Laravel Breeze

- チェックリスト  
  [チェックリスト登録項目](docs/lib/checklist.md)

## コア機能の must want

- must
- [x] コア機能が完成し、ユーザーが試しに使える状態であること
- [x] コア機能部分のページの見た目が整っている
- [x] GitHub でプルリクベースで開発
- [x] 静的解析ツールの全チェックが通っている

- want
- [ ] スマホ及び PC 両方のデザイン対応ができている
- [ ] ストレスなく使え、UI/UX が良い
- [ ] デザインが綺麗
- [ ] コードの可読性が高い
- [x] コア機能の充実/付属的な機能の作成
- [x] テストコードが書かれている

## MVP 　 README を編集する

概要  
オリジナルプロダクトの URL  
画面キャプチャ  
使用技術  
ER 図  
インフラ構成図  
機能一覧
