# Invoice API (Laravel)
A small REST API built with Laravel for creating and fetching invoices.
Uses **SQLite** for easy setup.

---

## Setup

1. Install dependencies:
        composer install
2. Environment setup:
        cp .env.example .env
        php artisan key:generate
3. in .env:
        DB_CONNECTION=sqlite
4. Run migrations:
        php artisan migrate
5. Start server:
        php artisan serve

## Requirements

PHP 8.2
Laravel 12.0
SQLite

API Routes
1. Create Invoice
POST /api/invoices

## Body:
{
    "customer_name": "Olanrewaju Oladapo",
    "amount": "25000",
    "status": "paid"    // optional, defaults to "pending"
}

## Example Success Response:
{
  "success": true,
  "message": "Invoice created successfully",
  "data": {
    "customer_name": "Saheed Oladimeji",
    "amount": "40000.00",
    "status": "paid",
    "invoice_number": "INV-2025-0001",
    "updated_at": "2025-09-25T05:56:26.000000Z",
    "created_at": "2025-09-25T05:56:26.000000Z",
    "id": 1
  }
}

If no status is provided, it defaults to "pending".

2. Get All Invoices
GET /api/invoices

3. Get Single Invoice
GET /api/invoices/{id}

## Error Response Examples
1. Validation Error (422):
{
  "message": "Customer name is required. (and 1 more error)",
  "errors": {
    "customer_name": [
      "Customer name is required."
    ],
    "amount": [
      "Invoice amount is required."
    ]
  }
}

{
  "message": "Invoice amount must be a number. (and 1 more error)",
  "errors": {
    "amount": [
      "Invoice amount must be a number."
    ],
    "status": [
      "Invoice status must be one of: pending, paid, or cancelled."
    ]
  }
}

2. Resource Not Found (404):
{
  "success": false,
  "message": "Invoice not found"
}