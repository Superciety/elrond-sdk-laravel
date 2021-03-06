<?php

namespace Superciety\ElrondSdk\Api;

use Carbon\Carbon;
use Superciety\ElrondSdk\Api\Endpoints\AccountEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\BlockEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\CollectionEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\MexEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\NetworkEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\NftEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\TokenEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\TransactionEndpoints;
use Superciety\ElrondSdk\Api\Endpoints\VmEndpoints;

final class Api
{
    protected ?Carbon $cacheTtl = null;

    public function cacheFor(Carbon $ttl): self
    {
        $this->cacheTtl = $ttl;

        return $this;
    }

    public function accounts(): AccountEndpoints
    {
        return new AccountEndpoints($this->cacheTtl);
    }

    public function network(): NetworkEndpoints
    {
        return new NetworkEndpoints($this->cacheTtl);
    }

    public function blocks(): BlockEndpoints
    {
        return new BlockEndpoints($this->cacheTtl);
    }

    public function collections(): CollectionEndpoints
    {
        return new CollectionEndpoints($this->cacheTtl);
    }

    public function mex(): MexEndpoints
    {
        return new MexEndpoints($this->cacheTtl);
    }

    public function nfts(): NftEndpoints
    {
        return new NftEndpoints($this->cacheTtl);
    }

    public function tokens(): TokenEndpoints
    {
        return new TokenEndpoints($this->cacheTtl);
    }

    public function transactions(): TransactionEndpoints
    {
        return new TransactionEndpoints($this->cacheTtl);
    }

    public function vm(): VmEndpoints
    {
        return new VmEndpoints($this->cacheTtl);
    }
}
