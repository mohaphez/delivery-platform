<?php

declare(strict_types=1);

namespace Modules\Permission\Filament\Agent\Resources\RoleResource\Pages;

use Modules\Permission\Filament\Agent\Resources\RoleResource;
use BezhanSalleh\FilamentShield\Support\Utils;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    public Collection $permissions;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->permissions = collect($data)
            ->filter(fn ($permission, $key) => ! in_array($key, ['name', 'guard_name', 'select_all']))
            ->values()
            ->flatten();

        return Arr::only($data, ['name', 'guard_name']);
    }

    protected function afterCreate(): void
    {
        $permissionModels = collect();
        $this->permissions->each(function ($permission) use ($permissionModels): void {
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
                /** @phpstan-ignore-next-line */
                'name'       => $permission,
                'guard_name' => $this->data['guard_name'],
            ]));
        });

        $this->record->syncPermissions($permissionModels);
    }
}
