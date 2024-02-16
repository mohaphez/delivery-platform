<?php

declare(strict_types=1);

namespace Modules\User\Filament\Manager\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Enums\V1\AccountType\AccountType;
use Modules\User\Filament\Manager\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $navigationGroup = 'User & Access Control';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getModel(): string
    {
        return user()->model();
    }

    public static function getModelLabel(): string
    {
        return __('user::filament.manager.user.model');
    }

    public static function getPluralModelLabel(): string
    {
        return __('user::filament.manager.user.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('user::filament.manager.user.inputs.name.label'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label(__('user::filament.manager.user.inputs.email.label'))
                    ->email()
                    ->unique(ignorable: fn ($record) => $record)
                    ->disabledOn('edit')
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->label(__('user::filament.manager.user.inputs.password.label'))
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->hiddenOn('edit')
                    ->required()
                    ->maxLength(255),
                Select::make('account_status')
                    ->label(__('user::filament.manager.user.inputs.account_status.label'))
                    ->options(AccountStatus::pairs())
                    ->searchable()
                    ->required(),
                Select::make('account_type')
                    ->label(__('user::filament.manager.user.inputs.account_type.label'))
                    ->options(AccountType::pairs())
                    ->searchable()
                    ->required(),
                Select::make('roles')
                    ->label(__('user::filament.manager.user.inputs.roles.label'))
                    ->required()
                    ->multiple()
                    ->relationship('roles', 'name')->preload(),
                Select::make('permissions')
                    ->label(__('user::filament.manager.user.inputs.permissions.label'))
                    ->multiple()
                    ->relationship('permissions', 'name')->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('user::filament.manager.user.table.th.name'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('user::filament.manager.user.table.th.email'))
                    ->searchable(),
                TextColumn::make('account_status')
                    ->label(__('user::filament.manager.user.table.th.account_status'))
                    ->sortable()
                    ->color(fn ($state) => $state->color())
                    ->formatStateUsing(fn ($state) => $state->trans())
                    ->badge(true),
                TextColumn::make('account_type')
                    ->label(__('user::filament.manager.user.table.th.account_type'))
                    ->sortable()
                    ->color(fn ($state) => $state->color())
                    ->formatStateUsing(fn ($state) => $state->trans())
                    ->badge(true),
                TextColumn::make('roles.name')
                    ->label(__('user::filament.manager.user.table.th.roles'))
                    ->badge(true),
                TextColumn::make('created_at')
                    ->label(__('user::filament.manager.user.table.th.registration_date')),
                TextColumn::make('last_login_date')
                    ->label(__('user::filament.manager.user.table.th.last_login_date')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->filters([Tables\Filters\TrashedFilter::make()]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['email'];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit')
        ];
    }
}
