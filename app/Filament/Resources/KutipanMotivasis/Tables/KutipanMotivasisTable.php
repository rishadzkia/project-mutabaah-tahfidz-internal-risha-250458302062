<?php

namespace App\Filament\Resources\KutipanMotivasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table; 

class KutipanMotivasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')

                    ->sortable(),
            TextColumn::make('image_url'),
            ImageColumn::make('image_url')
                ->label('Gambar')
                ->getStateUsing(fn($record) => asset('storage/' . $record->image_url))
                ->square()
                ->width(60)
                ->height(60),

            TextColumn::make('sumber')
                    ->searchable(),
                TextColumn::make('teks_kutipan')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
