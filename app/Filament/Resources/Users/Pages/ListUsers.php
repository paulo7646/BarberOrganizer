<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

use SolutionForest\TabLayoutPlugin\Schemas\SimpleTabSchema;
use SolutionForest\TabLayoutPlugin\Widgets\TabsWidget;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TabsWidget::make([
                SimpleTabSchema::make(
                    label: 'Account Widget',
                    id: 'account_widget',
                )->livewireComponent(\Filament\Widgets\AccountWidget::class),

                SimpleTabSchema::make(
                    label: 'Edit User',
                )->livewireComponent(\App\Filament\Resources\Users\Pages\EditUser::class, ['record' => 1]),

                SimpleTabSchema::make('Link')
                    ->url('https://example.com', true)
                    ->icon('heroicon-o-globe-alt'),
            ]),
        ];
    }
}
