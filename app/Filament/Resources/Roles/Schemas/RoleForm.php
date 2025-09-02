<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Permission;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        // Agrupa as permissões por modelo
        $permissionsGrouped = Permission::all()->groupBy(function ($permission) {
            $parts = explode(' ', $permission->name);
            return $parts[1] ?? 'outros';
        });

        $fields = [];

        foreach ($permissionsGrouped as $modelName => $perms) {
            // Pega apenas a ação da permissão
            $options = $perms->mapWithKeys(function ($permission) {
                $action = explode(' ', $permission->name)[0]; // "view", "create", etc.
                return [$permission->name => ucfirst($action)]; // chave = nome completo
            });

            $fields[] = CheckboxList::make('permissions')
                ->label(ucfirst($modelName))
                ->options($options->toArray())
                ->columns(5)
                ->columnSpanFull();
        }

        return $schema->components(array_merge([
            TextInput::make('name')
                ->label('Nome')
                ->required()
                ->unique(ignoreRecord: true)
                ->columnSpanFull(),
        ], $fields));
    }
}
