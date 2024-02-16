<?php

declare(strict_types=1);

namespace Modules\Tenant\Entities\V1\Concerns;

trait Modular
{
    public static function getModulesMigrationPath(): array
    {
        $modules = optional(app()['modules'])->allEnabled() ?? [];

        $paths = [];
        foreach ($modules as $module) {
            $path = "{$module->getPath()}/Database/Migrations/tenant";
            if (is_dir($path)) {
                $paths[] = $path;
            }
        }

        return $paths;
    }
}
