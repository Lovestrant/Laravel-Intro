<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InvoiceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'data' => $this->collection->transform(function($invoice){
                return [
                    'id' => $invoice->id,
                    'customerId' => $invoice->customer_id,
                    'amount' => $invoice->amount,
                    'status' => $invoice->status,
                    'issuedAt' => $invoice->issued_at,
                    'dueAt' => $invoice->due_at,
                    'createdAt' => $invoice->created_at,
                    'updatedAt' => $invoice->updated_at,
                    'billedDated' => $invoice->billed_dated,
                    'paidDated' => $invoice->paid_dated,
                ];
            }),
            'meta' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],
        ];
    }
}
