# Expense Management Module

A self-contained, modular Laravel API for managing expenses. This module is structured for scalability and clean separation of concerns, following practices suitable for ERP-like applications.

---

## ✅ Features Implemented

- Modular structure using `Modules/Expense`
- API endpoints for:
  - Creating expenses
  - Viewing all expenses
  - Updating an expense
  - Deleting an expense
- Optional filtering by:
  - Category
  - Date range
- Validation via Form Requests
- Service Layer architecture
- Response formatting via `Http\Response`
- UUIDs for expense IDs
- Enum for expense category (no external Category module)
- Uses Laravel 11.x

---

## 📂 Project Structure

Modules/
└── Expense/
├── Controllers/
│ └── Api/
│ └── ExpenseController.php
├── Models/
│ └── Expense.php
├── Services/
│ └── ExpenseService.php
├── Requests/
│ ├── StoreExpenseRequest.php
│ └── UpdateExpenseRequest.php
├── routes/
│ └── api.php
└── Database/
└── Migrations/


- **Service Layer** handles business logic (`ExpenseService`)
- **Form Requests** handle validation
- **Controllers** call services and return formatted JSON responses
- API routes registered via module’s `routes/api.php`

---

## 🧪 Not Included (Optional Tasks)

The following optional features were **not implemented** due to time constraints:

- Event (e.g. `ExpenseCreated`)
- Notification via listener (email or database)
- Feature/Unit test (PHPUnit)
- Swagger/OpenAPI docs (e.g., Scribe)----http://127.0.0.1:8000/docs

These can be easily added with the current architecture.

---

## 🛠 Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/athiravijayk-20/expense_api.git

   cd expense_api
composer install
cp .env.example .env
php artisan key:generate
php artisan serve

Method	URI	Description
---------------------------------------
POST	/api/expense	Create a new expense
GET	/api/expense	List all expenses
PUT	/api/expense/{id}	Update an expense
DELETE	/api/expense/{id}	Delete an expense
GET	/api/expense?category=...&from_date=...&to_date=...	Filtered listing

⚙️ Assumptions
----------------------------------------
Category is managed as an Enum within the Expense module

UUIDs are used as primary keys for scalability

Modular folder structure is manually loaded using PSR-4

⏱ Time Spent
-------------------------
Approx. 4–5 hours

📬 Author
-------------------------------
Athira Vijay
GitHub: athiravijayk-20
