<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @var int */
    private $id;
    /** @var string */
    private $first_name;
    /** @var string */
    private $last_name;
    /**@var array */
    private $orders = [];

    /**
     * @param mixed $first_name
     * @return Customer
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @param string $last_name
     * @return Customer
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param array|null $orders
     * @return Customer
     */
    public function setOrders($orders): Customer
    {
        $this->orders = $orders ?: [];

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
