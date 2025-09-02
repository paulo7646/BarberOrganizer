<?php

namespace App\Policies;

use App\Models\User;

abstract class BasePolicy
{
    protected string $modelName;

    public function __construct(string $modelClass)
    {
        $this->modelName = strtolower(class_basename($modelClass));
    }

    protected function allowAll(User $user): bool
    {
        return  $user->hasRole('Admin');
    }

    public function viewAny(User $user): bool
    {
        return $this->allowAll($user) || $user->can("visualizar {$this->modelName}");
    }

    public function view(User $user): bool
    {
        return $this->allowAll($user) || $user->can("view {$this->modelName}") || $this->viewAny($user)  ;
    }

    public function create(User $user): bool
    {
        return $this->allowAll($user) || $user->can("cadastrar {$this->modelName}");
    }

    public function update(User $user): bool
    {
        return $this->allowAll($user) || $user->can("atualizar {$this->modelName}");
    }

    public function delete(User $user): bool
    {
        return $this->allowAll($user) || $user->can("deletar {$this->modelName}");
    }
}
