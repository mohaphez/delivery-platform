<?php

declare(strict_types=1);

namespace Modules\Truck\Filament\Agent\Resources;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Support\Enums\V1\Status\Status;
use Modules\Truck\Filament\Agent\Resources\TruckResource\Pages;

class TruckResource extends Resource
{
    protected static ?string $navigationGroup = 'Trucks';
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function getModel(): string
    {
        return truck()->model();
    }

    public static function getModelLabel(): string
    {
        return __('truck::filament.agent.truck.model');
    }

    public static function getPluralModelLabel(): string
    {
        return __('truck::filament.agent.truck.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('truck::filament.agent.truck.inputs.name.label')),
                Select::make('driver_id')
                    ->label(__('truck::filament.agent.truck.inputs.driver_id.label'))
                    ->relationship('driver', 'name')
                    ->preload(),
                TextInput::make('brand')
                    ->label(__('truck::filament.agent.truck.inputs.brand.label')),
                TextInput::make('model')
                    ->label(__('truck::filament.agent.truck.inputs.model.label')),
                TextInput::make('plate_number')
                    ->label(__('truck::filament.agent.truck.inputs.plate_number.label')),
                ColorPicker::make('color')
                    ->label(__('truck::filament.agent.truck.inputs.color.label')),
                Radio::make('status')
                    ->options(Status::pairs())
                    ->label(__('truck::filament.agent.truck.inputs.status.label')),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('truck::filament.agent.truck.table.th.name')),
                TextColumn::make('driver.name')
                    ->label(__('truck::filament.agent.truck.table.th.driver')),
                TextColumn::make('brand')
                    ->label(__('truck::filament.agent.truck.table.th.brand')),
                TextColumn::make('model')
                    ->label(__('truck::filament.agent.truck.table.th.model')),
                TextColumn::make('plate_number')
                    ->label(__('truck::filament.agent.truck.table.th.plate_number')),
                ColorColumn::make('color')
                    ->label(__('truck::filament.agent.truck.table.th.color')),
                TextColumn::make('status')
                    ->label(__('truck::filament.agent.truck.table.th.status'))
                    ->sortable()
                    ->color(fn ($state) => $state->color())
                    ->formatStateUsing(fn ($state) => $state->trans())
                    ->badge(true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrucks::route('/'),
        ];
    }
}
