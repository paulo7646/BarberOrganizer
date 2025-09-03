<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\Resources\Roles\RoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

use SolutionForest\TabLayoutPlugin\Schemas\SimpleTabSchema;
use SolutionForest\TabLayoutPlugin\Widgets\TabsWidget;



class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Popula o campo 'permissions' com os nomes atuais
        $data['permissions'] = $this->record->permissions->pluck('name')->toArray();
        return $data;
    }

    protected function afterSave(): void
    {
        $permissions = $this->form->getState()['permissions'] ?? [];
        $this->record->syncPermissions($permissions);
    }
}
