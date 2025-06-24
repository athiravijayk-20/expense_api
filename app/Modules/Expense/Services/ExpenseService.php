<?php

namespace App\Modules\Expense\Services;

use App\Modules\Expense\Models\Expense;

class ExpenseService
{
    public function list()
    {
        return Expense::latest()->get();
    }

    public function create(array $data): Expense
    {
        return Expense::create($data);
    }

    public function update(Expense $expense, array $data): Expense
    {
        $expense->update($data);
        return $expense;
    }

    public function delete(Expense $expense): void
    {
        $expense->delete();
    }
}
