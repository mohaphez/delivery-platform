<?php

declare(strict_types=1);

namespace Modules\User\Services\V1;

use Modules\Base\Services\V1\BaseService;
use Modules\User\Contracts\Services\UserServiceInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public function model(): RepositoryInterface
    {
        return user();
    }

}
