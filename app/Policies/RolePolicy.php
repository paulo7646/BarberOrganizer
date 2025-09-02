<?php

namespace App\Policies;

use App\Models\Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy  extends BasePolicy
{

    public function __construct()
    {
        parent::__construct(\App\Models\User::class);
    }
   
}
