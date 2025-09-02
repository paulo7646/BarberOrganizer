<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use ReflectionClass;
use File;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
        $this->registerPolicies();

        $this->registerAllPolicies();
    }

    /**
     * Registra todas as policies automaticamente
     */
    protected function registerAllPolicies()
    {
        $policyPath = app_path('Policies');
        $policyFiles = File::allFiles($policyPath);

        foreach ($policyFiles as $file) {
            $class = 'App\\Policies\\' . $file->getBasename('.php');

            if (!class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);

            if ($reflection->isSubclassOf('App\Policies\BasePolicy')) {
                // Tenta pegar o modelClass definido na policy
                $modelClass = $reflection->getDefaultProperties()['modelClass'] ?? null;

                if ($modelClass && class_exists($modelClass)) {
                    $this->policies[$modelClass] = $class;
                }
            }
        }

        $this->registerPolicies(); // Re-registrar após popular $policies
    }
}
