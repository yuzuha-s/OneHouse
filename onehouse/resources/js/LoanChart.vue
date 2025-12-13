<template>
  <div>
    <div class="list-header wrapper">
      <div class="list-nav">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          height="50px"
          viewBox="0 -960 960 960"
          width="50px"
          fill="#1f1f1f"
        >
          <path
            d="M490.31-140v-.21.21q-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85q0 39.23 35.42 66.59 35.43 27.36 88.18 44.66 52.76 17.29 113.94 25.18 61.18 7.88 112.77 7.42Zm-10.18-208.31v-.54.54q-43.23-.15-83.67-4.01-40.43-3.86-76.96-11.98-36.52-8.11-69.15-20.16t-60.09-28.85q27.46 16.8 60.09 28.85t69.15 20.16q36.53 8.12 76.96 11.98 40.44 3.86 83.67 4.01ZM480-606.15q85.97 0 174.96-25.35 88.99-25.35 110.25-55.71-21.54-30.87-110.04-56.7-88.5-25.83-175.17-25.83-87.59 0-175.83 24.93-88.25 24.94-110.55 56.07 21.92 32.2 109.24 57.39 87.32 25.2 177.14 25.2Zm225.9 476.12h30.51v-167.38l74.31 74.56 21.54-21.54-111.23-111.23-111.24 111.23 21.54 21.54 74.57-74.56v167.38Zm15.13 62.34q-72.36 0-123.75-51.06-51.38-51.05-51.38-123.66 0-72.77 51.38-124.15 51.39-51.39 123.75-51.39 72.35 0 123.74 51.39 51.38 51.38 51.38 124.15 0 72.61-51.38 123.66-51.39 51.06-123.74 51.06ZM473.56-190.46q2.36 13.64 6.81 26.14 4.45 12.5 9.94 24.32-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85V-680q0-57.92 99.54-98.96Q339.08-820 480-820q140.92 0 240.46 41.04Q820-737.92 820-680v204.92q-11.82-5.48-24.32-9.55-12.5-4.06-25.94-6.42v-132.03q-53.84 31.54-130.19 48.87-76.34 17.34-159.96 17.21-85.77 0-162.06-17.46-76.3-17.46-127.27-48.62v156.49q50.56 33.15 127.55 50.59 76.98 17.44 161.78 17.44 11.31 0 22.1-.34 10.8-.33 22.11-1.15-9.67 11.87-17.39 24.78-7.72 12.91-13.97 26.96h-12.31q-87.26-.18-160.83-15.79-73.58-15.62-129.04-49.21v135.21q7.84 17.07 34.74 32.92 26.9 15.85 65.55 27.77 38.66 11.92 86.18 19.26 47.53 7.33 96.83 7.69Z"
          />
        </svg>
        <h3>loan</h3>
      </div>

      <div class="list-nav">
        <p v-if="errors.loan_term" class="error">
          {{ errors.loan_term[0] }}
        </p>

        <p v-if="errors.rate" class="error">
          {{ errors.rate[0] }}
        </p>

        <div v-if="showValidate" class="validate-wrapper">
          <div class="validate">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="40px"
              viewBox="0 -960 960 960"
              width="40px"
              fill="#576bf5"
            >
              <path
                d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"
              />
            </svg>
            <p>{{ saveMessage }}</p>
            <p>{{ calculationMessage }}</p>
          </div>
        </div>
      </div>

      <div class="list-nav">
        <p>最終更新日：{{ lastUpdated }}</p>
      </div>
    </div>

    <div class="loan-form wrapper">
      <div class="loan-left">
        <div class="left-fix">
          <div class="loanform-contant">
            <label for="">借入金額(万円)</label>
            <div class="form-row">
              <input
                v-model.number="loan"
                type="number"
                :style="{ textAlign: 'right' }"
              />
              <span class="loan-span">万円</span>
            </div>
          </div>

          <div class="loanform-contant">
            <label for="">年利(固定金利)</label>
            <div class="form-row">
              <input
                type="number"
                v-model.number="rate"
                step="0.1"
                :style="{ textAlign: 'right' }"
              />
              <span class="loan-span">%</span>
            </div>
          </div>

          <div class="loanform-contant">
            <label for="">返済期間(年)</label>
            <div class="form-row">
              <input
                v-model.number="loan_term"
                type="number"
                min="10"
                max="40"
                :style="{ textAlign: 'right' }"
              />
              <span class="loan-span">年</span>
            </div>
          </div>
        </div>

        <div class="left-fix">
          <div class="loanform-contant">
            <label for="">年齢(歳)</label>
            <div class="form-row">
              <input
                v-model.number="age"
                type="number"
                :style="{ textAlign: 'right' }"
              />
              <span class="loan-span">歳</span>
            </div>
          </div>

          <div class="loanform-contant">
            <label for="">毎月の支出(万円)</label>
            <div class="form-row">
              <input
                v-model.number="expense"
                type="number"
                :style="{ textAlign: 'right' }"
              />
              <span class="loan-span">万円/月</span>
            </div>
          </div>

          <div class="loanform-contant">
            <label for="">現在の収入(万円/年間)</label>
            <div class="form-row">
              <input
                v-model.number="income"
                type="number"
                :style="{ textAlign: 'right' }"
              />
              <span class="loan-span">万円/年</span>
            </div>
          </div>
        </div>
        <div class="calculate">
          <button @click="calculateLoan">計算する</button>
        </div>
      </div>

      <div class="loan-right">
        <div class="loan-card">
          <div class="valiableform-row">
            <div class="form-valiable" :class="{ highlight: borderlight }">
              {{ payoffAge }}
            </div>
            <span>歳で完済が完了します。</span>
          </div>
          <div class="valiableform-row">
            <span>月々の返済額は</span>
            <div class="form-valiable" :class="{ highlight: borderlight }">
              {{ monthlyPayment }}
            </div>
            <span>万円です。</span>
          </div>

          <div class="loan-register">
            <button @click="saveLoanSimulate">保存する</button>
          </div>
        </div>
      </div>
    </div>

    <div class="chart-wrapper wrapper">
      <apexchart
        type="line"
        :options="chartOptions"
        :series="series"
        width="90%"
        height="400"
      />
    </div>
  </div>
</template>
#TODO: セッション認証が上手くいかず
<script>
import ApexChart from "vue3-apexcharts";
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
  components: { apexchart: ApexChart },

  data() {
    return {
      series: [
        { name: "収入", type: "area", data: [] },
        { name: "支出", type: "line", data: [] },
        { name: "元金", type: "column", data: [] },
        { name: "利息", type: "column", data: [] },
      ],
      loan: 0,
      rate: 0,
      loan_term: 0,
      age: 0,
      expense: 0,
      income: 0,
      monthlyPayment: 0,
      payoffAge: 0,
      lastUpdated: null,
      errors: {},
      borderlight: false,
      showValidate: false,
      calculationMessage: "",
      saveMessage: "",
      chartOptions: {
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
        yaxis: [
          {
            title: { text: "年間支払額（万円）" },
            min: 0,
            labels: { formatter: (val) => Math.floor(val) },
          },
        ],
        xaxis: { title: { text: "返済期間(年)" } },
        labels: [],
        legend: { position: "left" },
      },
    };
  },

  mounted() {
    this.fetchLoanSimulation();
  },

  methods: {
    async fetchLoanSimulation() {
      try {
        // profile_idのデータ取得
        const res = await axios.get('/api/phase3', {
          withCredentials: true,
        });
        if (res.data) {
          this.loan = res.data.loan ?? 0;
          this.loan_term = res.data.loan_term ?? 0;
          this.age = res.data.age ?? 0;
          this.rate = res.data.rate ?? 0;
          this.income = res.data.income ?? 0;
          this.expense = res.data.expense ?? 0;
          this.lastUpdated = res.data.updated_at ?? null;
          this.calculateLoan(false);
        } else {
          console.warn("APIレスポンスが空です");
        }
      } catch (error) {
        console.error("データ取得失敗 表示できません", error);
        this.loan = 0;
        this.loan_term = 0;
        this.age = 0;
        this.rate = 0;
        this.income = 0;
        this.expense = 0;
        this.lastUpdated = null;
      }
    },
    calculateLoan(showMessage = true) {
      if (this.loan_term < 10 || 40 < this.loan_term) {
        this.errors.loan_term = ["返済期間は10年～40年で指定してください。"];
        this.showValidate = false;
        this.calculationMessage = "";
        this.saveMessage = "";
        return;
      } else {
        this.errors.loan_term = null;
      }

      if (this.rate < 0.1) {
        this.errors.rate = ["年利は0.1%以上で指定してください。"];
        this.showValidate = false;
        this.calculationMessage = "";
        this.saveMessage = "";
        return;
      } else {
        this.errors.rate = null;
      }

      const rate = this.rate / 100;
      const loanTerm = this.loan_term;
      const loan = this.loan;

      // 年間返済額
      const under = loan * (rate * Math.pow(1 + rate, loanTerm));
      const over = Math.pow(1 + rate, loanTerm) - 1;

      const annualPayment = under / over;
      // 月々の支払金額
      this.monthlyPayment = Math.round((annualPayment / 12) * 10) / 10;

      let balance = loan;
      let interestPaymentData = [];
      let principalPaymentData = [];
      let labels = [];

      let expenseData = [];
      let incomeData = [];

      for (let year = 1; year <= loanTerm; year++) {
        const interestPayment = balance * rate;
        const principalPayment = annualPayment - interestPayment;
        balance -= principalPayment;

        // 年間の支出・収入額
        const annualIncome = this.income * Math.pow(1.01, year - 1); // 年1%上昇
        const annualExpense = this.expense * 12;

        interestPaymentData.push(Math.round(interestPayment));
        principalPaymentData.push(Math.round(principalPayment));
        labels.push(this.age + year);
        expenseData.push(annualExpense);
        incomeData.push(annualIncome);
      }

      // 支払い終了年齢
      this.payoffAge = this.age + loanTerm;

      this.series[0].data.splice(0, this.series[0].data.length, ...incomeData);
      this.series[1].data.splice(0, this.series[1].data.length, ...expenseData);
      this.series[2].data.splice(
        0,
        this.series[2].data.length,
        ...principalPaymentData
      );
      this.series[3].data.splice(
        0,
        this.series[3].data.length,
        ...interestPaymentData
      );
      this.chartOptions.labels.splice(
        0,
        this.chartOptions.labels.length,
        ...labels
      );

      // 計算完了バリデーション
      if (showMessage) {
        this.showValidate = true;
        this.calculationMessage = "計算が完了しました！";
        this.saveMessage = "";
        this.borderlight = true;
        setTimeout(() => {
          this.showValidate = false;
        }, 3000);
      }
    },

    // データ保存
    async saveLoanSimulate() {
      try {
        const loanSimulation = {
          loan: this.loan,
          rate: this.rate,
          loan_term: this.loan_term,
          age: this.age,
          expense: this.expense,
          income: this.income,
        };

        // LaravelのAPIのPOST
        const res = await axios.put(
          '/api/phase3',
          loanSimulation,
          { withCredentials: true }
        );
        this.saveMessage = "シミュレーションを保存しました";
        this.calculationMessage = "";

        this.lastUpdated = new Date(res.data.data.updated_at).toLocaleString();

        // 保存完了バリデーション
        this.showValidate = true;
        setTimeout(() => {
          this.showValidate = false;
        }, 3000);

        // 失敗
      } catch (error) {
        if (error.response && error.response.status === 422) {
          // LaravelのバリデーションエラーをVue側にセット
          this.errors = error.response.data.errors;
          // alert("バリデーション値と一致しないよ");
        } else {
          console.error("サーバーへの通信に失敗しました。");
          console.error("通信エラー:", error);
        }
      }
    },
  },
});
</script>