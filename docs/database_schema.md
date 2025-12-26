## テーブル定義書 / ER 図

[データ](/docs/date.sql)はこちら
![alt text](/docs/images/ER.png)

### users

| カラム名   | データ型     | キー | NOT NULL | デォルト値 |
| ---------- | ------------ | ---- | -------- | ---------- |
| id         | BIGINT       | PK   |          |
| name       | VARCHAR(50)  |      |          |
| email      | VARCHAR(50)  |      |          |
| password   | VARCHAR(100) |      |          |
| created_at | TIMESTAMP    |      |
| updated_at | TIMESTAMP    |      |

### profiles

| カラム名   | データ型  | キー | NOT NULL |
| ---------- | --------- | ---- | -------- |
| id         | bigint    | PK   |
| user_id    | bigint    | FK   |
| created_at | timestamp |
| updated_at | timestamp |

### makers 　

| カラム名   | データ型     | キー | NOT NULL |
| ---------- | ------------ | ---- | -------- |
| id         | BIGINT       | PK   |
| profile_id | BIGINT       | FK   |
| name       | VARCHAR(20)  |      |
| sales      | VARCHAR(20)  |      | NOT NULL |
| option     | VARCHAR(100) |      | NOT NULL |
| star       | INT          |      |          |

### makerOptionCategories

| カラム名 | データ型     | キー | NOT NULL |
| -------- | ------------ | ---- | -------- |
| id       | BIGINT       | PK   |          |
| name     | VARCHAR(100) |

### features

カテゴリー　タグ名

| カラム名    | データ型     | キー | NOT NULL |
| ----------- | ------------ | ---- | -------- |
| id          | BIGINT       | PK   |          |
| category_id | BIGINT       | FK   |
| tag         | VARCHAR(100) |

### makers_feature 　

※中間テーブル

| カラム名   | データ型 | キー | NOT NULL |
| ---------- | -------- | ---- | -------- |
| marker_id  | BIGINT   | FK   |
| feature_id | BIGINT   | FK   |

FOREIGN KEY (maker_id) REFERENCES makers(id),  
FOREIGN KEY (feature_id) REFERENCES features(id)

### landProperties

| カラム名       | データ型     | キー | NOT NULL |
| -------------- | ------------ | ---- | -------- |
| id             | BIGINT       | PK   |          |
| profile_id     | BIGINT       | FK   |
| address        | VARCHAR(255) |
| landarea       | INT          |
| far            | TINYINT      |
| bcr            | TINYINT      |
| floor          | INT          |      |          |
| buildable_area | INT          |
| range          | BIGINT       |      |

### phases

| カラム名 | データ型     | キー | NOT NULL |
| -------- | ------------ | ---- | -------- |
| id       | BIGINT       | PK   |          |
| phase    | INT          |      | NOT NULL |
| list     | VARCHAR(255) |

### phase_templates

| カラム名 | データ型     | キー | NOT NULL |
| -------- | ------------ | ---- | -------- |
| id       | BIGINT       | PK   |          |
| phase    | INT          |      | NOT NULL |
| list     | VARCHAR(255) |

### checklists

チェックリスト

| カラム名   | データ型  | キー | NOT NULL | デォルト値    |
| ---------- | --------- | ---- | -------- | ------------- |
| id         | BIGINT    | PK   |          |
| profile_id | BIGINT    | FK   |
| phases_id  | BIGINT    | FK   |          |
| checked    | BOOLEAN   |      |          | DEFAULT FALSE |
| created_at | TIMESTAMP |      |
| updated_at | TIMESTAMP |      |
