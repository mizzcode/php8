<?php

class Address
{
    public ?string $country;
}

class User
{
    public ?Address $address;
}

function getCoutry(?User $user): ?string
{
    // manual check null
    // if ($user != null) {
    //     if ($user->address != null) {
    //         return $user->address->country;
    //     }
    // }

    // automatis check with php 8
    return $user?->address?->country;



    // return null;
}

var_dump(getCoutry(null));
