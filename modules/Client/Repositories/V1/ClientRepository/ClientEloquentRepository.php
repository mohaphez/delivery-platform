<?php

declare(strict_types=1);

namespace Modules\Client\Repositories\V1\ClientRepository;

use Modules\Client\Contracts\Repositories\V1\ClientRepository;
use Modules\Client\Entities\V1\Client;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class ClientEloquentRepository extends BaseRepository implements CacheableInterface, ClientRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Client::class;
    }
}
