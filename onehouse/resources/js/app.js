import "./bootstrap";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

import axios from "axios";
import { createApp } from "vue";
import VueApexCharts from "vue3-apexcharts";
import LoanChart from "./LoanChart.vue";


axios.defaults.baseURL = "http://127.0.0.1:8000";
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.get("/sanctum/csrf-cookie").then(() => {
    console.log("CSRF cookie 取得成功");
    const chartApp = createApp(LoanChart);
    chartApp.use(VueApexCharts);
    chartApp.mount("#chart-app");
});
