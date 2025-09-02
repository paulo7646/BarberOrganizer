<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy extends BasePolicy
{

    public function __construct()
    {
        parent::__construct(\App\Models\User::class);
    }
}
