<?php


namespace App\services;


interface CustomerServiceInterface
{
    /**
     * @param array $filters filters
     * @return array
     */
    public function get(array $filters = []): array;
}