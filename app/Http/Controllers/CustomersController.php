<?php

namespace App\Http\Controllers;

use App\services\CustomerService;
use Illuminate\Routing\Controller as BaseController;

class CustomersController extends BaseController
{
    public function index(CustomerService $customerService)
    {
        $customers = $customerService->getCustomersWithOrderCount();
//        dd($customers);
        return view('customers')->with(['customers' => $customers]);
    }
}
