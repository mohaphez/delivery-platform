<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Manager\Resources;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Support\Enums\V1\Status\Status;
use Modules\Tenant\Entities\V1\Tenant;
use Modules\Tenant\Filament\Manager\Resources\TenantResource\Pages;

class TenantResource extends Resource
{
    protected static ?string $navigationGroup = 'Tenants';
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function getModel(): string
    {
        return Tenant::class;
    }

    public static function getModelLabel(): string
    {
        return __('tenant::filament.manager.tenant.model');
    }

    public static function getPluralModelLabel(): string
    {
        return __('tenant::filament.manager.tenant.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')
                    ->label(__('tenant::filament.manager.tenant.inputs.id.label'))
                    ->required()
                    ->unique(ignorable:fn ($record) => $record)
                    ->maxLength(255),
                TextInput::make('title')
                    ->label(__('tenant::filament.manager.tenant.inputs.title.label'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->label(__('tenant::filament.manager.tenant.inputs.description.label'))
                    ->required()
                    ->maxLength(255),
                Radio::make('status')
                    ->options(Status::pairs())
                    ->default(Status::Active->value)
                    ->inlineLabel()
                    ->label(__('tenant::filament.manager.tenant.inputs.status.label'))
                    ->required(),
                Repeater::make('domains')
                    ->relationship()
                    ->schema([
                        TextInput::make('domain')
                            ->label(__('tenant::filament.manager.tenant.inputs.domain.label'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('tenant::filament.manager.tenant.table.th.id'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('tenant::filament.manager.tenant.table.th.title'))
                    ->searchable(),
                TextColumn::make('domains.domain')
                    ->label(__('tenant::filament.manager.tenant.table.th.domain')),
                TextColumn::make('status')
                    ->label(__('tenant::filament.manager.tenant.table.th.status'))
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
            'index' => Pages\ListTenants::route('/'),
        ];
    }
}
