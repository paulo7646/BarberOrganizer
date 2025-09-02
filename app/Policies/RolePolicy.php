<?php

namespace App\Policies;

use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;

class RolePolicy extends BasePolicy  {

 protected string $modelClass = Role::class;

}
