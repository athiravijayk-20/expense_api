<?php

namespace App\Modules\Expense\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Modules\Expense\Enums\ExpenseCategory;

class StoreExpenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'category' => ['required', Rule::in(ExpenseCategory::all())],
            'expense_date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
