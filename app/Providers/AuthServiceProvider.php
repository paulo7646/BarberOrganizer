<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use ReflectionClass;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPolicies();

        // Registrar automaticamente todas as policies baseadas em Models
        foreach (glob(app_path('Models/*.php')) as $modelFile) {
            $modelClass = 'App\\Models\\' . basename($modelFile, '.php');
            $policyClass = 'App\\Policies\\' . class_basename($modelClass) . 'Policy';

            if (class_exists($policyClass)) {
                Gate::policy($modelClass, $policyClass);
            }
        }
    }
}
