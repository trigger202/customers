<?php


namespace App\services;


use App\Customer;
use Bigcommerce\Api\Client;

class CustomerService
{
    /**@var Client */
    private $bigCommerceClient;

    public function __construct(Client $bigCommerceClient)
    {
        $this->bigCommerceClient = $bigCommerceClient;
    }

    /**
     * @param int $customerId
     * @return array
     */
    public function getCustomerOrders(int $customerId)
    {
        return $this->bigCommerceClient::getOrders(['customer_id' => $customerId]);
    }

    /**
     * @return Customer[]|array
     */
    public function getCustomersWithOrders()
    {
        $allCustomers = [];
        foreach ($this->bigCommerceClient::getCustomers() as $customer) {
            $orders = $this->getCustomerOrders($customer->id);
            $customerEntity = new Customer($customer);
            $customerEntity->setOrders($orders);

            array_push($allCustomers, $customerEntity);
        }

        return $allCustomers;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function getCustomerDetails(int $id)
    {
        $customer = $this->bigCommerceClient::getCustomer($id);
        if ($customer === false) {
            return false;
        }
        $orders = $this->getCustomerOrders($customer->id);
        $customerEntity = new Customer($customer);
        $customerEntity->setOrders($orders);

        return $customerEntity;
    }
}