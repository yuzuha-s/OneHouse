## チャートApexChartsのライブラリ使用方法

インストール
```
npm install apexcharts --save
npm install vue3-apexcharts --save

npm install @vitejs/plugin-vue --save-dev
```

resourse/app.jsに下記追記
```
import "./bootstrap";
// この下から追記

import { createApp } from "vue";
import VueApexCharts from "vue3-apexcharts";
import App from "./App.vue";

const app = createApp(App);
app.use(VueApexCharts);
app.mount("#app");

```

App.vueをつくる
```
<template>
  <div>
    <h2>売上グラフ</h2>
    <apexchart type="bar" :options="chartOptions" :series="series" width="500" />
  </div>
</template>

<script setup>
const chartOptions = {
  chart: { id: 'basic-bar' },
  xaxis: { categories: [2020, 2021, 2022, 2023, 2024] },
};

const series = [
  {
    name: '売上',
    data: [30, 40, 35, 50, 49],
  },
];
</script>

```

vite.config.jsをvue仕様に変更
```
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css"],
            refresh: true,
        }),
        vue(),
    ],
});

```


## 建築面積
```
土地面積（㎡）× 建ぺい率（％）× 容積率 ＝ 建築面積の上限（㎡）
98㎡　×　0.6 　×2　=　117.6㎡

約3.3㎡/坪
117 / 3 = 35.45坪 

坪単価
35.45 × 87万円　＝　3,084万円
```


## 静的ツール

### ✔PHPUnittests/ディレクトリ内のテストを実行
- コードを実行して解析
- テスト通りに動くか(ユーザー作成・コントローラーの処理結果)
```
vendor/bin/phpunit
```

```
php artisan test
```

### ✔PHPCS (PHP CodeSniffer)コーディング規約のチェック
```
phpcs --standard=PSR12 app/

#一括自動修正
phpcbf --standard=PSR12 app/
```


### ✔PHPstanでapp配下のコードを解析
- コードは実行せずに解析
- 型や構文の安全性
```
vendor/bin/phpstan analyse app
```

### ✔ESLintでJSの静的解析
```
npx eslint resources/js
```

### テスト
.env.testingのDB_DATABASE=onehouse_testで作成

テストデータベースの作成
php artisan migrate --env=testing
