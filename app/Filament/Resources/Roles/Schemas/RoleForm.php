<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Spatie\Permission\Models\Permission;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        // Agrupando permissões por modelo
        $permissionsGrouped = Permission::all()->groupBy(fn ($permission) => explode(' ', $permission->name)[1] ?? 'outros');

        $sections = [];

        // Seção com o campo 'name'
        $sections[] = Section::make('Informações da Role')
            ->description('Defina o nome da role')
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->unique(ignoreRecord: true),
            ])->columnSpanFull();

        // Seções agrupadas por modelo com CheckboxList de permissões
        foreach ($permissionsGrouped as $model => $perms) {
            $options = $perms->mapWithKeys(fn ($permission) => [
                $permission->name => ucfirst(explode(' ', $permission->name)[0]),
            ])->toArray();

            $sections[] = Section::make(ucfirst($model))
                ->schema([
                    CheckboxList::make('permissions')
                        ->label('Ações')
                        ->options($options)
                        ->columns(5),
                ])
                ->collapsible()
                ->collapsed();
        }

        return $schema->components(array_merge([], $sections));
    }
}
