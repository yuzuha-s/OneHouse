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
    const under = loan * (rateDecimal * Math.pow(1 + rateDecimal, loan_term));
    const over = Math.pow(1 + rateDecimal, loan_term) - 1;
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
        const interestPayment = balance * rateDecimal;
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
}
