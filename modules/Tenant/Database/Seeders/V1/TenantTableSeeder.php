<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Seeders\V1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Support\Enums\V1\Status\Status;
use Modules\Tenant\Entities\V1\Tenant;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        if (Schema::hasTable('tenants') && 0 === DB::table('tenants')->count()) {
            $this->seedTenant('petro', 'petro.center.test');
            $this->seedTenant('haio', 'haio.center.test');
        }
    }

    /**
     * Seed a tenant with the given ID, title, and domain.
     *
     * @param string $id
     * @param string $domain
     */
    private function seedTenant(string $id, string $domain): void
    {
        $tenant = Tenant::create([
            'id'     => $id,
            'title'  => $id,
            'status' => Status::Active->value,
        ]);

        $tenant->domains()->create([
            'domain' => $domain,
        ]);
    }
}
