<?php

declare(strict_types=1);

namespace Modules\User\Repositories\V1\UserRepository;

use Modules\User\Contracts\Repositories\V1\UserRepository;
use Modules\User\Entities\V1\User;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class UserEloquentRepository extends BaseRepository implements CacheableInterface, UserRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return User::class;
    }
}
