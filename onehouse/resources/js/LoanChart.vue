<template>
  <div>
    <div class="chart-wrapper wrapper">
      <apexchart
        type="line"
        :options="chartOptions"
        :series="chartSeries"
        width="90%"
        height="400"
      />
    </div>
  </div>
</template>

<script>
// TODO: セッション認証が上手くいかず
import ApexChart from "vue3-apexcharts";
import { defineComponent } from "vue";

export default defineComponent({
  components: { apexchart: ApexChart },
  props: {
    categories: Array,
    series: Array,
  },
  computed: {
    chartOptions() {
      return {
        chart: {
          type: "line",
          stacked: true,
          toolbar: { show: false },
          easing: "easeinout",
          speed: 100000,
        },
        colors: ["#B0F5DE", "#61C6DF", "#A0E7F5", "#FFF176"],
        stroke: { width: [4, 2, 3, 3] },
        fill: { opacity: [0.6, 0.8, 1, 1] },
        dataLabels: { enabled: false },
        xaxis: { categories: this.categories, title: { text: "返済期間(年)" } },
        yaxis: [{ title: { text: "年間支払額（万円）" }, min: 0 }],
        labels: [],
        legend: { position: "left" },
      };
    },
    chartSeries() {
      return this.series;
    },
  },

  // コンポーネントの初期で処理をする場合に使用する
  // mounted() {},

  // data() {
  //   return {
  //     borderlight: false,
  //     showValidate: false,
  //     calculationMessage: "",
  //     saveMessage: "",
});
</script>