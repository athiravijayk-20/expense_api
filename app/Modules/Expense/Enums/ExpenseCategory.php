<?php

namespace App\Modules\Expense\Enums;

class ExpenseCategory
{
    const FOOD = 'food';
    const TRANSPORTATION = 'transportation';
    const UTILITIES = 'utilities';
    const ENTERTAINMENT = 'entertainment';
    const HEALTHCARE = 'healthcare';
    const OTHER = 'other';

    public static function all(): array
    {
        return [
            self::FOOD,
            self::TRANSPORTATION,
            self::UTILITIES,
            self::ENTERTAINMENT,
            self::HEALTHCARE,
            self::OTHER,
        ];
    }
}
