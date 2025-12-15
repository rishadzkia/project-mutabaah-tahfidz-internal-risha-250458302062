<?php

namespace App\Filament\Resources\KutipanMotivasis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea; 
use Filament\Schemas\Schema;

class KutipanMotivasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                   ->label('Nomor')
                    ->required(),
                   
                FileUpload::make('image_url')
                    ->image()
                    ->disk('public')
                    ->directory('motivasi')
                    ->required()
                    ->maxSize(4096)
                    ->helperText('Ukuran maksimal file 4MB.')
                    ,
                Textarea::make('teks_kutipan')
                  
                    ->columnSpanFull(),
                TextInput::make('sumber')
                    ->default(null),
            ]);
    }
}
