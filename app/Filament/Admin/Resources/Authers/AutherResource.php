<?php

namespace App\Filament\Admin\Resources\Authers;

use App\Filament\Admin\Resources\Authers\Pages\CreateAuther;
use App\Filament\Admin\Resources\Authers\Pages\EditAuther;
use App\Filament\Admin\Resources\Authers\Pages\ListAuthers;
use App\Filament\Admin\Resources\Authers\Pages\ViewAuther;
use App\Filament\Admin\Resources\Authers\Schemas\AutherForm;
use App\Filament\Admin\Resources\Authers\Schemas\AutherInfolist;
use App\Filament\Admin\Resources\Authers\Tables\AuthersTable;
use App\Models\Author;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AutherResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

    protected static ?string $recordTitleAttribute = 'name';
    protected static string | UnitEnum | null $navigationGroup = 'Library Management';
    protected static ?int $navigationSort = 2;



    public static function form(Schema $schema): Schema
    {
        return AutherForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AutherInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuthersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAuthers::route('/'),
            'create' => CreateAuther::route('/create'),
            'view' => ViewAuther::route('/{record}'),
            'edit' => EditAuther::route('/{record}/edit'),
        ];
    }
}
