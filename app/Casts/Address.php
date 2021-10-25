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
        $address = json_decode($attributes['address']);
        return new AddressVO(
            $address->home_street ?? '',
            $address->street_address ?? '',
            $address->home_street_2 ?? '',
            $address->street_address_2 ?? '',
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

        return  $value->toJson();
    }
}
