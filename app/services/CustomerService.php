<?php


namespace App\services;


use App\Customer;
use Bigcommerce\Api\Client;

class CustomerService
{
    /**@var Client $httpClient */
    private $bigCommerceClient;

    public function __construct(Client $bigCommerceClient)
    {
        $this->bigCommerceClient = $bigCommerceClient;
    }

    public function getCustomerOrders(int $customerId)
    {
        return $this->bigCommerceClient::getOrders(['customer_id' => $customerId]);
    }

    public function getCustomersWithOrderCount()
    {
        $allCustomers = [];
        foreach ($this->bigCommerceClient::getCustomers() as $customer) {
            $orders = $this->getCustomerOrders($customer->id);

            $customerEntity = new Customer();
            $customerEntity->setId($customer->id);
            $customerEntity->setFirstName($customer->first_name);
            $customerEntity->setLastName($customer->last_name);
            $ordersCount = 0;

            if ($orders != false) {
                $ordersCount = count($orders);
            }
            $customerEntity->setTotalOrders($ordersCount);

            array_push($allCustomers, $customerEntity);
        }
        return $allCustomers;
    }

    public function getCustomer(int $id)
    {
        $customer = $this->bigCommerceClient::getCustomer($id);
        $orders = $this->getCustomerOrders($customer->id);

        $customerEntity = new Customer();
        $customerEntity->setId($customer->id);
        $customerEntity->setLastName($customerEntity->setOrders($orders));

        $ordersCount = 0;

        if ($orders != false) {
            $ordersCount = count($orders);
        }

        $customerEntity->setTotalOrders($ordersCount);

    }
}