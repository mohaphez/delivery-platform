<?php

declare(strict_types=1);

namespace Modules\Tenant\Entities\V1;

use Modules\Support\Enums\V1\Status\Status;
use Modules\Tenant\Entities\V1\Concerns\Modular;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase;
    use HasDomains;
    use Modular;


    protected $casts = [
        'status' => Status::class,
    ];
}
