<?php

namespace Superciety\ElrondSdk\Api\Endpoints;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Superciety\ElrondSdk\Api\EndpointBase;
use Superciety\ElrondSdk\Api\Entities\Nft;
use Superciety\ElrondSdk\Api\Entities\Account;
use Superciety\ElrondSdk\Api\Entities\NftCollectionRole;
use Superciety\ElrondSdk\Api\Entities\NftCollectionAccount;
use Superciety\ElrondSdk\Api\Entities\TokenDetailedWithBalance;

class AccountEndpoints extends EndpointBase
{
    public function __construct(
        protected ?Carbon $cacheTtl,
    ) {
    }

    public function getByAddress(string $address): Account
    {
        return Account::fromApiResponse(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}")
        );
    }

    public function getNfts(string $address, array $params = []): Collection
    {
        return Nft::fromApiResponseMany(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/nfts", $params)
        );
    }

    public function getTokens(string $address, array $params = []): Collection
    {
        return TokenDetailedWithBalance::fromApiResponseMany(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/tokens", $params)
        );
    }

    public function getToken(string $address, string $token): TokenDetailedWithBalance
    {
        return TokenDetailedWithBalance::fromApiResponse(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/tokens/{$token}")
        );
    }

    public function getCollections(string $address, array $params = []): Collection
    {
        return NftCollectionAccount::fromApiResponseMany(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/collections", $params)
        );
    }

    public function getCollection(string $address, string $collection, array $params = []): NftCollectionAccount
    {
        return NftCollectionAccount::fromApiResponse(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/collections/{$collection}", $params)
        );
    }

    public function getRolesCollections(string $address, array $params = []): Collection
    {
        return NftCollectionRole::fromApiResponseMany(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/roles/collections", $params)
        );
    }

    public function getRolesCollection(string $address, string $collection, array $params = []): NftCollectionRole
    {
        return NftCollectionRole::fromApiResponse(
            $this->request('GET', "{$this->getApiBaseUrl()}/accounts/{$address}/roles/collections/{$collection}", $params)
        );
    }
}
