<?php

use Superciety\ElrondSdk\Domain\Address;

it('creates an address from bech32', fn ($bech32, $expectedHex) => expect(Address::fromBech32($bech32)->hex())->toBe($expectedHex))
    ->with([
        ['erd18fswpz2r2q3p40jlewkt9u7d46lvrukdn8j09tppza75efv0jz8s2lc68r', '3a60e0894350221abe5fcbacb2f3cdaebec1f2cd99e4f2ac21177d4ca58f908f'],
        ['erd1367z5dtnjt00t3sshczrvuw56nmhegvt6nu25zffh7wxv0ypqykshauu5q', '8ebc2a357392def5c610be043671d4d4f77ca18bd4f8aa0929bf9c663c81012d'],
        ['erd1qykmyrqemuh3998jwd9t73eu0ce8nudzf7tzdeelrrru69dqwt2scrsz7k', '012db20c19df2f1294f2734abf473c7e3279f1a24f9626e73f18c7cd15a072d5'],
        ['erd1ycvtp4x0y9xep0hfedevm4ql4y7vwxuwqm5taj76n368w6s02ldsfpd3au', '2618b0d4cf214d90bee9cb72cdd41fa93cc71b8e06e8becbda9c74776a0f57db'],
    ]);

it('encodes hex to bech32', fn ($hex, $expectedBech32) => expect(Address::fromHex($hex)->bech32())->toBe($expectedBech32))
    ->with([
        ['3a60e0894350221abe5fcbacb2f3cdaebec1f2cd99e4f2ac21177d4ca58f908f', 'erd18fswpz2r2q3p40jlewkt9u7d46lvrukdn8j09tppza75efv0jz8s2lc68r'],
        ['8ebc2a357392def5c610be043671d4d4f77ca18bd4f8aa0929bf9c663c81012d', 'erd1367z5dtnjt00t3sshczrvuw56nmhegvt6nu25zffh7wxv0ypqykshauu5q'],
        ['012db20c19df2f1294f2734abf473c7e3279f1a24f9626e73f18c7cd15a072d5', 'erd1qykmyrqemuh3998jwd9t73eu0ce8nudzf7tzdeelrrru69dqwt2scrsz7k'],
        ['2618b0d4cf214d90bee9cb72cdd41fa93cc71b8e06e8becbda9c74776a0f57db', 'erd1ycvtp4x0y9xep0hfedevm4ql4y7vwxuwqm5taj76n368w6s02ldsfpd3au'],
    ]);
