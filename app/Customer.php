<?php

namespace App;

class Customer extends \Bigcommerce\Api\Resources\Customer
{
    private $orders = [];

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @param \Bigcommerce\Api\Resources\Order[]|null $orders
     * @return Customer
     */
    public function setOrders($orders)
    {
        if (is_null($orders)) {
            $orders = [];
        }

        $data = [];
        foreach ($orders as $order) {
            $newOrder = new Order($order);
            $data[] = $newOrder;
        }

        $this->orders = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /** The total value of all of their orders
     * @return int
     */

    public function getLifeTimeValue()
    {
        $sum = 0;
        foreach ($this->getOrders() as $order) {
            $sum += $order->total_inc_tax;
        }

        return $sum;
    }
}
