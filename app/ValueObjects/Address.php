<?php

namespace App\ValueObjects;

final class Address
{
    public function __construct(
        public string $home_street,
        public string $street_address,
        public string $home_street_line_2 = '',
        public string $street_address_2 = '',
    ) {
    }

    public function toArray()
    {
        return [
            'home_street' => $this->home_street,
            'street_address' => $this->street_address,
            'home_street_line_2' => $this->home_street_line_2,
            'street_address_2' => $this->street_address_2,
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
