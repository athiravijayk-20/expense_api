
<?php


use Illuminate\Support\Facades\Route;
use App\Modules\Expense\Controllers\Api\ExpenseController;
use Illuminate\Http\Response;


Route::prefix('expense')->group(function () {
    Route::get('/', [ExpenseController::class, 'index'])->name('expense.index');
    Route::post('/', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/{id}', [ExpenseController::class, 'show'])->name('expense.show');
    Route::put('{expense}', [ExpenseController::class, 'update']);
    Route::delete('{expense}', [ExpenseController::class, 'delete']);
});


Route::fallback(function () {
    return response()->json([
        'message' => 'Resource not found.'
    ], Response::HTTP_NOT_FOUND); // 404
});
