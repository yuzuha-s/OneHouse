<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## ディレクトリ構成

docs/
|ファイルリンク|ファイル| |
|----|----|---|
|[アプリテーマ](docs/focus.md) |focus.md |※のちのち要件定義に一本化する |
|[要件定義](docs/requirements.md)　　　|requirements.md |
|[業務フロー](docs/business_flow.md)　|business_flow.md |
|[システム構成図](docs/images/infra.svg)　|infra.svg |
|[テーブル定義書](docs/database_schema.md)　|database_schema.md |
|[画面遷移図・ワイヤーフレーム](docs/screen_transition.md)　|screen_transition.md |


## コア機能

| テスト  | ⏳ 予定タスク | コア機能                         | アクセスページ |
| :-----: | :-----------: | -------------------------------- | -------------- |
|         |       ☑       | チェックリスト機能               | /phase1        |
|         |       ☑       | メーカー訪問記録機能             | /phase2        |
|         |    テスト     | 住宅ローンシミレーションチャート | /phase3        |
| ☑ 11/26 |       ☑       | 建物面積計算                     | /phase4        |
| ☑ 12/13 |       ☑       | ログイン・ログアウト・新規登録   |                |

## 静的解析

- 11/9 ✔PHPCS (PHP CodeSniffer) ・　 ✔PHPstan 　・　 ✔ESLint
- チェックリスト  
  [チェックリスト登録項目](docs/lib/checklist.md)
