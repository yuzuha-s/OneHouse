<template>
  <div>
    <div class="chart-wrapper wrapper">
      <apexchart
        type="line"
        :options="chartOptions"
        :series="chartSeries"
        width="100%"
        height="500"
      />
    </div>
  </div>
</template>

<script>
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
        colors: ["#B0F5DE", "#7C8DF8", "#A0E7F5", "#FFF176"],
        stroke: { width: [4, 2, 3, 3] },
        fill: { opacity: [0.6, 0.8, 1, 1] },
        dataLabels: { enabled: false },
        xaxis: { categories: this.categories, title: { text: "年齢(歳)" } },
        yaxis: [
          {
            title: { text: "年間支払額（万円）" },
            min: 0,
            labels: {
              formatter(value) {
                return Math.round(value);
              },
            },
          },
        ],
        labels: [],
        legend: { position: "left" },
      };
    },
    chartSeries() {
      return this.series;
    },
  },

});
</script>