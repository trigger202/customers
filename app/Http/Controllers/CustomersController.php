<?php

namespace App\Http\Controllers;

use App\services\CustomerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class CustomersController extends BaseController
{
    public function index(CustomerService $customerService)
    {
        $customers = $customerService->getCustomersWithOrders();
        if ($customers === false) {
            Log::error("Failed to retrieve customers with orders");
            abort(404);
        }

        return view('customers')->with(['customers' => $customers]);
    }
}
