<?php

namespace App\Modules\Expense\Providers;

use Illuminate\Support\ServiceProvider;

class ExpenseServiceProvider extends ServiceProvider
{
     public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Views', 'expense');
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
  
}
