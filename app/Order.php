<?php

namespace App;

use Illuminate\Support\Facades\Log;

class Order extends \Bigcommerce\Api\Resources\Order
{
    const CREATED_DATE_FORMAT = "d/m/Y";

    public function getCreatedDate($dateFormat = self::CREATED_DATE_FORMAT)
    {
        try {
            $date = new \DateTime($this->date_created);
            return $date->format($dateFormat);

        } catch (\Exception $e) {
            Log::error(sprintf("Failed to parse date %s", $this->date_created), ['exception' => $e]);
            return $this->date_created;
        }
    }

    public function getCostIncludingTax(int $decimalPlaces = 2)
    {
        return number_format($this->total_inc_tax, $decimalPlaces) . ' ' . $this->currency_code;
    }
}
