<?php

namespace Detit\Polipages\Resources\PageResource\Pages;
use Detit\Polipages\Resources\PageResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;


class EditPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
