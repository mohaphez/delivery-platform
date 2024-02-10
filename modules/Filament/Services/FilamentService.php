<?php

declare(strict_types=1);

namespace Modules\Filament\Services;

use Modules\Filament\Contracts\FilamentServiceInterface;

class FilamentService implements FilamentServiceInterface
{
    private function getEnableModules(): array
    {
        $modules = app()['modules']->allEnabled();

        return $modules;
    }


    public function getModulesResources(): array
    {
        $resourcesList = [];
        $modules = $this->getEnableModules();

        foreach($modules as $module) {
            $filamentDir = "{$module->getPath()}/Filament/Resources";

            if ( ! is_dir($filamentDir)) {
                continue;
            }

            $resources = scandir($filamentDir);

            foreach ($resources as $resource) {
                if ( ! preg_match('/^(.+)\.php$/', $resource, $matches)) {
                    continue;
                }

                $resourceClass = "Modules\\{$module->getStudlyName()}\\Filament\\Resources\\{$matches[1]}";

                if (class_exists($resourceClass)) {
                    $resourcesList[] = $resourceClass;
                }
            }
        }

        return $resourcesList;
    }
}
