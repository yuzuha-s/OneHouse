import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/style.css",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/calculate.js",
                "resources/js/checkList.js",
                "resources/js/fadein.js",
                "resources/js/makerlist.js",
                "resources/js/landSimulation.js",
            ],
            refresh: true,
        }),
        vue(),
    ],
});
