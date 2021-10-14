<?php

namespace App\Casts;

use App\ValueObjects\Address as AddressVO;
use InvalidArgumentException;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Address implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return new AddressVO(
            $attributes['home_street'],
            $attributes['home_street_line_2'],
            $attributes['street_address'],
            $attributes['street_address_2'],
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (!$value instanceof AddressVO) {
            throw new InvalidArgumentException('The given value is not an Address instance.');
        }

        return [
            'home_street' => $value->home_street,
            'home_street_line_two' => $value->home_street_line_2,
            'street_address' => $value->street_address,
            'street_address_2' => $value->street_address_2,
        ];
    }
}
