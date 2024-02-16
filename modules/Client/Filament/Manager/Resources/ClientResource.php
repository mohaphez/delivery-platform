<?php

declare(strict_types=1);

namespace Modules\Client\Filament\Manager\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Support\Enums\V1\Status\Status;
use Modules\Client\Filament\Manager\Resources\ClientResource\Pages;

class ClientResource extends Resource
{
    protected static ?string $navigationGroup = 'Clients';
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getModel(): string
    {
        return client()->model();
    }

    public static function getModelLabel(): string
    {
        return __('client::filament.manager.client.model');
    }

    public static function getPluralModelLabel(): string
    {
        return __('client::filament.manager.client.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')
                    ->label(__('client::filament.manager.client.inputs.id.label'))
                    ->required()
                    ->unique(ignorable:fn ($record) => $record)
                    ->maxLength(255),
                TextInput::make('title')
                    ->label(__('client::filament.manager.client.inputs.title.label'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->label(__('client::filament.manager.client.inputs.description.label'))
                    ->required()
                    ->maxLength(255),
                Radio::make('status')
                    ->options(Status::pairs())
                    ->default(Status::Active->value)
                    ->inlineLabel()
                    ->label(__('client::filament.manager.client.inputs.status.label'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('client::filament.manager.client.table.th.id'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('client::filament.manager.client.table.th.title'))
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('client::filament.manager.client.table.th.status'))
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
            'index' => Pages\ListClients::route('/'),
        ];
    }
}
