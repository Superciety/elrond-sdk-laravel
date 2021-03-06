<?php

use Brick\Math\BigInteger;
use Superciety\ElrondSdk\Elrond;
use Superciety\ElrondSdk\Api\Entities\Nft;

it('getByAddress - gets an account by address', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc', 'accounts/account.json');

    $actual = Elrond::api()
        ->accounts()
        ->getByAddress('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc');

    expect($actual->balance)->toBeInstanceOf(BigInteger::class);

    assertMatchesResponseSnapshot($actual);
});

it('getNfts - gets an accounts nfts', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/nfts*', 'accounts/nfts.json');

    $actual = Elrond::api()
        ->accounts()
        ->getNfts('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc');

    assertMatchesResponseSnapshot($actual);

    expect($actual[0])->toBeInstanceOf(Nft::class);
    expect(base64_decode($actual[0]->attributes))->toBe("description:POWERED BY ELROND NETWORK"); // to be base64 decoded
});

it('getTokens - gets tokens owned by an account', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/tokens', 'accounts/tokens.json');

    $actual = Elrond::api()
        ->accounts()
        ->getTokens('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc');

    assertMatchesResponseSnapshot($actual);
});

it('getToken - gets a specifc token owned by an account', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/tokens/WHALE-b018f0', 'accounts/token-with-balance.json');

    $actual = Elrond::api()
        ->accounts()
        ->getToken('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc', 'WHALE-b018f0');

    assertMatchesResponseSnapshot($actual);

    expect($actual->balance)->toBeInstanceOf(BigInteger::class);
    expect((string) $actual->balance)->toBe("1000000000000");
});

it('getCollections - gets collections owned by the user', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/collections', 'accounts/collections.json');

    $actual = Elrond::api()
        ->accounts()
        ->getCollections('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc');

    assertMatchesResponseSnapshot($actual);
});

it('getCollection - gets collection owned by the user and given id', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/collections/EVOLUTIONS-570eff', 'accounts/collection.json');

    $actual = Elrond::api()
        ->accounts()
        ->getCollection('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc', 'EVOLUTIONS-570eff');

    assertMatchesResponseSnapshot($actual);
});


it('getRolesCollections - gets role collections owned by the user', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/roles/collections', 'accounts/role-collections.json');

    $actual = Elrond::api()
        ->accounts()
        ->getRolesCollections('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc');

    assertMatchesResponseSnapshot($actual);
});

it('getRolesCollection - gets collection owned by the user and given id', function () {
    fakeApiRequestWithResponse('/accounts/erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc/roles/collections/SING-3c59b4', 'accounts/role-collection.json');

    $actual = Elrond::api()
        ->accounts()
        ->getRolesCollection('erd1660va6y429mxz4dkgek0ssny8tccaaaaaaaaaabbbbbbbbbbcccccccccc', 'SING-3c59b4');

    assertMatchesResponseSnapshot($actual);
});
