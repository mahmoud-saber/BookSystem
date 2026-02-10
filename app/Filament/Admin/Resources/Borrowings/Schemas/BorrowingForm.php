<?php

namespace App\Filament\Admin\Resources\Borrowings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BorrowingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('book_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('borrower_id')
                    ->numeric()
                    ->default(null),
                Select::make('status')
                    ->options(['borrowed' => 'Borrowed', 'returned' => 'Returned'])
                    ->default('borrowed'),
                DateTimePicker::make('borrowed_at'),
            ]);
    }
}
