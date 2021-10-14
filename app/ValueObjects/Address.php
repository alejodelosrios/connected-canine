<?php

namespace App\ValueObjects;

final class Address
{
    public function __construct(
        public string $home_street,
        public string $home_street_line_2 = '',
        public string $street_address,
        public string $street_address_2 = '',
    ) {
    }
}
