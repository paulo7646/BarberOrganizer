<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use MartinPetricko\FilamentRestoreOrCreate\Concerns\CreateRecord\CheckDeleted;

class CreateUser extends CreateRecord
{
    use CheckDeleted;

    protected static string $resource = UserResource::class;
}
