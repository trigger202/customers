<?php

namespace App\Http\Controllers;

use App\services\CustomerService;
use Illuminate\Routing\Controller as BaseController;

class CustomerDetailsController extends BaseController
{
    /**@var CustomerService */
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function show($id)
    {
        $customer = $this->customerService->getCustomerDetails($id);
        if ($customer === false) {
            abort(404);
            return view('404');
        }

        return view('details', [
            'customer' => $customer,
            'lifeTimeValue' => $customer->getLifeTimeValue(),
        ]);
    }
}
