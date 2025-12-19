import "./bootstrap";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

import { createApp } from "vue";
import VueApexCharts from "vue3-apexcharts";
import LoanChart from "./LoanChart.vue";
import { calculateLoan } from "./LoanSimulation.js";

const el = document.getElementById("loan-chart");
const apiData = {
    loan: Number(el.dataset.loan),
        rate: Number(el.dataset.rate),
        loan_term: Number(el.dataset.term),
        age: Number(el.dataset.age),
        expense: Number(el.dataset.expense),
        income: Number(el.dataset.income),
};
const result = calculateLoan(apiData);

fetch("/api/phase3")
    .then((res) => res.json())
    .then((apiData) => {
        console.log("API Data:", apiData);

        if (result.errors) {
            console.error(result.errors);
            return;
        }
        const app = createApp(LoanChart, {
            categories: result.labels,
            series: result.series,
        });
        app.use(VueApexCharts);
        app.mount(el);
    });
