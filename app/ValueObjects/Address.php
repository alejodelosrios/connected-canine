<?php

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

final class Address implements Arrayable
{
    public $home_street;
    public $street_address;
    public $home_street_2;
    public $street_address_2;

    public function __construct($home_street, $street_address)
    {
        $this->home_street = $home_street;
        $this->street_address = $street_address;
    }

    public function toArray()
    {
        return [
            "home_street" => $this->home_street,
            "street_address" => $this->street_address,
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
