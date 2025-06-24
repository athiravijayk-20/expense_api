<?php
namespace App\Modules\Expense\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Expense\Models\Expense;
use App\Modules\Expense\Services\ExpenseService;
use App\Modules\Expense\Requests\StoreExpenseRequest;
use App\Modules\Expense\Requests\UpdateExpenseRequest;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    public function __construct(protected ExpenseService $service) {}

    public function index()
    {
        return response()->json($this->service->list(), Response::HTTP_OK);
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Expense created successfully.',
            'data' => $expense
        ], Response::HTTP_CREATED);
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $updated = $this->service->update($expense, $request->validated());
        return response()->json([
            'message' => 'Expense updated successfully.',
            'data' => $updated,
        ], Response::HTTP_OK);
    }

    public function delete(Expense $expense)
    {
        $this->service->delete($expense);
        return response()->noContent();  // 204 No Content
    }
}
