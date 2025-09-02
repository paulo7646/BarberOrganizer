<?php

namespace App\Traits;

use Spatie\Permission\Models\Permission;

trait HasDefaultPermissions
{
    protected static function bootHasDefaultPermissions()
    {
        static::created(function ($model) {
            $modelName = strtolower(class_basename($model));

            $permissions = [
                "visualizar {$modelName}",
                "cadastrar {$modelName}",
                "atualizar {$modelName}",
                "deletar {$modelName}",
            ];

            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
        });
    }
}
