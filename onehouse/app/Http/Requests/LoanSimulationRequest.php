<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class LoanSimulationRequest extends FormRequest
// {
//     public function authorize(): bool
//     {
//         return true;
//     }


//     public function rules(): array
//     {
//         return [
//             'loan' => 'required|numeric|min:0',
//             'rate' => 'required|numeric|min:0',
//             'loan_term' => 'required|numeric|min:10|max:40',
//             'age' => 'required|numeric|min:0',
//             'expense' => 'required|numeric|min:0',
//             'income' => 'required|numeric|min:0',
//         ];
//     }

//     public function messages(): array
//     {
//         return [
//             'loan_term.min' => '返済期間は10年以上で指定してください。',
//             'loan_term.max' => '返済期間は40年以下で指定してください。',
//         ];
//     }
// }
