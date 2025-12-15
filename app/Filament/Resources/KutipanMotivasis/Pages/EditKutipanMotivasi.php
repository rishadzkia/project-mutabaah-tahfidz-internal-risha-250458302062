<?php

namespace App\Filament\Resources\KutipanMotivasis\Pages;

use App\Filament\Resources\KutipanMotivasis\KutipanMotivasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKutipanMotivasi extends EditRecord
{
    protected static string $resource = KutipanMotivasiResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [ 
            DeleteAction::make(),
        ];
    }
}
