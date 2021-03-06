<?php

namespace Superciety\ElrondSdk\Api\Entities;

use Superciety\ElrondSdk\Domain\Address;
use Superciety\ElrondSdk\Api\ApiTransformable;

final class TokenAddressRoles
{
    use ApiTransformable;

    public function __construct(
        public Address $address,
        public array $roles = [],
    ) {
    }

    public static function fromApiResponse(array $res): static
    {
        return new static(...static::filterUnallowedProperties(array_merge($res, [
            'address' => Address::fromBech32($res['address']),
        ])));
    }
}
