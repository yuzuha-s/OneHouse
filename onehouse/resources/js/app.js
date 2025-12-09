import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();


import { createApp } from "vue";
import VueApexCharts from "vue3-apexcharts";
import LoanChart from "./LoanChart.vue";


const chartApp = createApp(LoanChart);
chartApp.use(VueApexCharts);
chartApp.mount("#chart-app");
