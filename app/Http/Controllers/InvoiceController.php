<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return response()->json([
            'success' => true,
            'message' => $invoices->isEmpty() ? 'No invoices found' : 'Invoices retrieved successfully',
            'data' => $invoices
        ], 200);
    }

    public function store(StoreInvoiceRequest $request)
    {
        $validated = $request->validated();

        $invoice = Invoice::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Invoice created successfully',
            'data' => $invoice
        ], 201);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => 'Invoice not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Invoice retrieved successfully',
            'data' => $invoice
        ], 200);
    }
}
