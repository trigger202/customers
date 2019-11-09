<?php

namespace App\Http\Controllers;

use App\services\CustomerService;
use Illuminate\Routing\Controller as BaseController;

class CustomerDetailsController extends BaseController
{
    /**@var CustomerService $httpClient */
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function show($id)
    {
        $customer = $this->customerService->getCustomer($id);

        return view('details', [
            'customer' => null,
            'lifeTimeValue' => 100,
        ]);
    }
}
