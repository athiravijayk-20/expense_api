<?php

namespace App\Modules\Expense\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Expense extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'amount',
        'category',
        'expense_date',
        'notes',
    ];

    protected $casts = [
        'expense_date' => 'date',
    ];
}
