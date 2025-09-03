<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RolesCreateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $modelPath = app_path('Models');

        foreach (scandir($modelPath) as $file) {
            if (Str::endsWith($file, '.php')) {
                // Monta o namespace completo
                $class = 'App\\Models\\' . pathinfo($file, PATHINFO_FILENAME);
                if (class_exists($class)) {

                    $modelName = strtolower(class_basename($class));

                    $permissions = [
                        "visualizar {$modelName}",
                        "cadastrar {$modelName}",
                        "atualizar {$modelName}",
                        "deletar {$modelName}",
                    ];

                    foreach ($permissions as $permission) {
                        Permission::firstOrCreate(['name' => $permission]);
                    }
                }
            }
        }
    }
}
