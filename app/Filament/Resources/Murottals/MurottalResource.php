<?php

namespace App\Filament\Resources\Murottals;
use App\Filament\Resources\Murottals\Pages\CreateMurottal;
use App\Filament\Resources\Murottals\Pages\EditMurottal;
use App\Filament\Resources\Murottals\Pages\ListMurottals;
use App\Filament\Resources\Murottals\Schemas\MurottalForm;
use App\Filament\Resources\Murottals\Tables\MurottalsTable;
use App\Models\Murottal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MurottalResource extends Resource
{
    protected static ?string $model = Murottal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMusicalNote;
    protected static ?string $recordTitleAttribute = 'qari_name';
    protected static ?string $modelLabel = 'Murottal Surah Pilihan';
    protected static ?string $pluralModelLabel = 'Murottal Surah Pilihan';

    public static function form(Schema $schema): Schema
    {
        return MurottalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MurottalsTable::configure($table);
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
            'index' => ListMurottals::route('/'),
            'create' => CreateMurottal::route('/create'),
            'edit' => EditMurottal::route('/{record}/edit'),
        ];
    }
}
 