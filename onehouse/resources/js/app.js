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

if (!result.errors) {
    const validateEl = document.getElementById("calc-validate");
    const msgEl = document.getElementById("calc-message");

    const payoffAgeEl = document.getElementById("payoffAge");
    if (payoffAgeEl) {
        payoffAgeEl.textContent = result.payoffAge;
    }

    const monthlyPaymentEL = document.getElementById("monthlyPayment");
    if (monthlyPaymentEL) {
        monthlyPaymentEL.textContent = result.monthlyPayment;
    }

    if (msgEl) {
        msgEl.textContent = "ローンシュミレーションが完了しました！";

        const loanCard = document.querySelector(".loan-card");
        loanCard.classList.add("loan-card-success");

        setTimeout(() => {
            validateEl.classList.add("hidden");
        }, 3000);
    }

    validateEl.classList.remove("hidden");

    const app = createApp(LoanChart, {
        categories: result.labels,
        series: result.series,
    });

    app.use(VueApexCharts);
    app.mount(el);
}
