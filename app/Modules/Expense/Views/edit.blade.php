{{-- app/Modules/Expense/Views/form.blade.php --}}
<form action="{{ $action }}" method="POST" class="max-w-xl mx-auto bg-white p-6 rounded shadow-md">
    @csrf
    @if($method && $method !== 'POST')
        @method($method)
    @endif

    <h2 class="text-2xl font-semibold mb-6">{{ $title ?? 'Expense Form' }}</h2>

    {{-- Title --}}
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $expense->title ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            required
        />
        @error('title')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Amount --}}
    <div class="mb-4">
        <label for="amount" class="block text-gray-700 font-medium mb-2">Amount</label>
        <input
            type="number"
            name="amount"
            id="amount"
            step="0.01"
            min="0"
            value="{{ old('amount', $expense->amount ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            required
        />
        @error('amount')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Category (enum select) --}}
    <div class="mb-4">
        <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
        <select
            name="category"
            id="category"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            required
        >
            <option value="" disabled {{ old('category', $expense->category ?? '') === null ? 'selected' : '' }}>Select Category</option>
            @foreach(\App\Modules\Expense\Enums\ExpenseCategory::cases() as $cat)
                <option value="{{ $cat->value }}" {{ old('category', $expense->category ?? '') === $cat->value ? 'selected' : '' }}>
                    {{ ucfirst($cat->value) }}
                </option>
            @endforeach
        </select>
        @error('category')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Expense Date --}}
    <div class="mb-4">
        <label for="expense_date" class="block text-gray-700 font-medium mb-2">Expense Date</label>
        <input
            type="date"
            name="expense_date"
            id="expense_date"
            value="{{ old('expense_date', isset($expense->expense_date) ? $expense->expense_date->format('Y-m-d') : '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
            required
        />
        @error('expense_date')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Notes --}}
    <div class="mb-6">
        <label for="notes" class="block text-gray-700 font-medium mb-2">Notes (optional)</label>
        <textarea
            name="notes"
            id="notes"
            rows="4"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
        >{{ old('notes', $expense->notes ?? '') }}</textarea>
        @error('notes')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition"
    >
        {{ $buttonText ?? 'Submit' }}
    </button>
</form>
