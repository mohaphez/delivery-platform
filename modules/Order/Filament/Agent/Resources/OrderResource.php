<?php

declare(strict_types=1);

namespace Modules\Order\Filament\Agent\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Support\Enums\V1\Status\Status;
use Modules\Order\Filament\Agent\Resources\OrderResource\Pages;

class OrderResource extends Resource
{
    protected static ?string $navigationGroup = 'Orders';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function getModel(): string
    {
        return order()->model();
    }

    public static function getModelLabel(): string
    {
        return __('order::filament.agent.order.model');
    }

    public static function getPluralModelLabel(): string
    {
        return __('order::filament.agent.order.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(components: [
                Select::make('client_id')
                    ->relationship('client', 'name')
                    ->label(__('order::filament.agent.order.inputs.client_id.label'))
                    ->required(),
                Select::make('truck_id')
                    ->relationship('truck', 'name')
                    ->label(__('order::filament.agent.order.inputs.truck_id.label'))
                    ->required(),
                TextInput::make('fuel_volume')
                    ->numeric()
                    ->label(__('order::filament.agent.order.inputs.fuel_volume.label'))
                    ->required(),
                TextInput::make('unit_price')
                    ->numeric()
                    ->label(__('order::filament.agent.order.inputs.unit_price.label'))
                    ->required(),
                TextInput::make('total_price')
                    ->numeric()
                    ->label(__('order::filament.agent.order.inputs.total_price.label'))
                    ->required(),
                TextInput::make('latitude')
                    ->numeric()
                    ->label(__('order::filament.agent.order.inputs.latitude.label'))
                    ->required(),
                TextInput::make('longitude')
                    ->numeric()
                    ->label(__('order::filament.agent.order.inputs.longitude.label'))
                    ->required(),
                TextInput::make('address')
                    ->label(__('order::filament.agent.order.inputs.address.label'))
                    ->required()
                    ->maxLength(255),
                Radio::make('status')
                    ->options(Status::pairs())
                    ->label(__('order::filament.agent.order.inputs.status.label'))
                    ->required(),
                DateTimePicker::make('delivery_date')
                    ->native()
                    ->label(__('order::filament.agent.order.inputs.delivery_date.label'))
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.name')
                    ->label(__('order::filament.agent.order.table.th.client_id'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('truck.name')
                    ->label(__('order::filament.agent.order.table.th.truck_id'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fuel_volume')
                    ->label(__('order::filament.agent.order.table.th.fuel_volume'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('total_price')
                    ->label(__('order::filament.agent.order.table.th.total_price'))
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => number_format($state, 2, ',', '.')),
                TextColumn::make('status')
                    ->label(__('order::filament.agent.order.table.th.status'))
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
        return ['title'];
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit'   => Pages\EditOrder::route('/{record}/edit')
        ];
    }
}
