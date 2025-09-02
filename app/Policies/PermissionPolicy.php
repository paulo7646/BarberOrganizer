<?php

namespace App\Policies;

use Spatie\Permission\Models\Permission;

class PermissionPolicy extends BasePolicy
{

 protected string $modelClass = Permission::class;


}
