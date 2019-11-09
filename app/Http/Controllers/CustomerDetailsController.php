<?php

namespace App\Http\Controllers;

use App\services\CustomerService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class CustomerDetailsController extends BaseController
{
    /**@var CustomerService */
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     *  int $id
     * @inheritDoc
     *
     */
    public function show($id)
    {
        $customer = $this->customerService->getCustomerDetails($id);
        if ($customer === false) {
            Log::error("Failed to retrieve customerId $id");
            abort(404);
        }

        return view('details', [
            'customer' => $customer,
            'lifeTimeValue' => $customer->getLifeTimeValue(),
        ]);
    }
}
