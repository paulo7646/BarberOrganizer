<?php

namespace App\Policies;

use App\Models\User;

abstract class BasePolicy
{
    protected string $modelClass;

    protected function allowAll(User $user): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Retorna o nome do model em minúsculo.
     * Se passar instância, usa a instância; se não, usa a property da policy
     */
    protected function getModelName($model = null): string
    {
        if ($model) {
            return strtolower(class_basename($model));
        }

        return isset($this->modelClass) ? strtolower(class_basename($this->modelClass)) : 'modelo';
    }

    public function viewAny(User $user, $model = null): bool
    {
        $modelName = $this->getModelName($model);
        return $this->allowAll($user) || $user->can("visualizar {$modelName}");
    }

    public function view(User $user, $model): bool
    {
        $modelName = $this->getModelName($model);
        return $this->allowAll($user) 
            || $user->can("visualizar {$modelName}") 
            || $this->viewAny($user, $model);
    }

    public function create(User $user, $model = null): bool
    {
        $modelName = $this->getModelName($model);
        return $this->allowAll($user) || $user->can("cadastrar {$modelName}");
    }

    public function update(User $user, $model): bool
    {
        $modelName = $this->getModelName($model);
        return $this->allowAll($user) || $user->can("atualizar {$modelName}");
    }

    public function delete(User $user, $model): bool
    {
        $modelName = $this->getModelName($model);
        return $this->allowAll($user) || $user->can("deletar {$modelName}");
    }
}
