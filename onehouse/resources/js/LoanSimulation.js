export function buildChartData({ loan, rate, loanTerm, age, income, expense }) {
    return {
        labels,
        principalPaymentData,
        interestPaymentData,
        incomeData,
        expenseData,
    };
}
//   async fetchLoanSimulation() {
//     try {
//       // profile_idのデータ取得
//       const res = await axios.get("/api/phase3", {
//         withCredentials: true,
//         // headers: {
//         //   Authorization: `Bearer ${this.token}`,
//         // },
//       });
//       if (res.data) {
//         this.loan = res.data.loan ?? 0;
//         this.loan_term = res.data.loan_term ?? 0;
//         this.age = res.data.age ?? 0;
//         this.rate = res.data.rate ?? 0;
//         this.income = res.data.income ?? 0;
//         this.expense = res.data.expense ?? 0;
//         this.lastUpdated = res.data.updated_at ?? null;
//         this.calculateLoan(false);
//       } else {
//         console.warn("APIレスポンスが空です");
//       }
//     } catch (error) {
//       console.error("データ取得失敗 表示できません", error);
//       this.loan = 0;
//       this.loan_term = 0;
//       this.age = 0;
//       this.rate = 0;
//       this.income = 0;
//       this.expense = 0;
//       this.lastUpdated = null;
//     }
//   },
export function calculateLoan(data) {
    const {
        loan = 0,
        rate = 0,
        loan_term = 0,
        age = 0,
        expense = 0,
        income = 0,
    } = data;

    const errors = {};

    if (loan_term < 10 || 40 < loan_term) {
        errors.loan_term = ["返済期間は10年～40年で指定してください。"];
        return { errors };
    }

    if (rate < 0.1) {
        errors.rate = ["年利は0.1%以上で指定してください。"];
        return { errors };
    }

    const rateDecimal = rate / 100;

    // 年間返済額
    const under = loan * (rate * Math.pow(1 + rate, loan_term));
    const over = Math.pow(1 + rate, loan_term) - 1;
    const annualPayment = under / over;
    // 月々の支払金額
    const monthlyPayment = Math.round((annualPayment / 12) * 10) / 10;

    let balance = loan;
    let interestPaymentData = [];
    let principalPaymentData = [];
    let labels = [];
    let expenseData = [];
    let incomeData = [];

    for (let year = 1; year <= loan_term; year++) {
        const interestPayment = balance * rate;
        const principalPayment = annualPayment - interestPayment;
        balance -= principalPayment;

        // 年間の支出・収入額
        const annualIncome = income * Math.pow(1.01, year - 1.0); // 年1%上昇
        const annualExpense = expense * 12;

        interestPaymentData.push(Math.round(interestPayment));
        principalPaymentData.push(Math.round(principalPayment));
        labels.push(age + year);
        expenseData.push(annualExpense);
        incomeData.push(annualIncome);
    }

    return {
        errors: null,
        series: [
            { name: "収入", type: "area", data: incomeData },
            { name: "支出", type: "line", data: expenseData },
            { name: "元金", type: "column", data: principalPaymentData },
            { name: "利息", type: "column", data: interestPaymentData },
        ],
        labels,
        monthlyPayment,
        payoffAge: age + loan_term,
    };
    // 支払い終了年齢
    // this.payoffAge = this.age + loanTerm;

    // this.series[0].data.splice(0, this.series[0].data.length, ...incomeData);
    // this.series[1].data.splice(0, this.series[1].data.length, ...expenseData);
    // this.series[2].data.splice(
    //   0,
    //   this.series[2].data.length,
    //   ...principalPaymentData
    // );
    // this.series[3].data.splice(
    //   0,
    //   this.series[3].data.length,
    //   ...interestPaymentData
    // );
    // this.chartOptions.labels.splice(
    //   0,
    //   this.chartOptions.labels.length,
    //   ...labels
    // );

    // // 計算完了バリデーション
    // if (showMessage) {
    //   this.showValidate = true;
    //   this.calculationMessage = "計算が完了しました！";
    //   this.saveMessage = "";
    //   this.borderlight = true;
    //   setTimeout(() => {
    //     this.showValidate = false;
    //   }, 3000);
    // }
}

//   // データ保存
//   async saveLoanSimulate() {
//     try {
//       const loanSimulation = {
//         loan: this.loan,
//         rate: this.rate,
//         loan_term: this.loan_term,
//         age: this.age,
//         expense: this.expense,
//         income: this.income,
//       };

//       // LaravelのAPIのPOST
//       const res = await axios.put("/api/phase3", loanSimulation, {
//         withCredentials: true,
//         // headers: {
//         //   Authorization: `Bearer ${this.token}`,
//         // },
//       });
//       this.saveMessage = "シミュレーションを保存しました";
//       this.calculationMessage = "";

//       this.lastUpdated = new Date(res.data.data.updated_at).toLocaleString();

//       // 保存完了バリデーション
//       this.showValidate = true;
//       setTimeout(() => {
//         this.showValidate = false;
//       }, 3000);

//       // 失敗
//     } catch (error) {
//       if (error.response && error.response.status === 422) {
//         // LaravelのバリデーションエラーをVue側にセット
//         this.errors = error.response.data.errors;
//         // alert("バリデーション値と一致しないよ");
//       } else {
//         console.error("サーバーへの通信に失敗しました。");
//         console.error("通信エラー:", error);
//       }
//     }
//   },
