<?php

namespace Detit\Polipages\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class Anchor
{
    public static function make(): Block
    {
        return Block::make('anchor')
            ->icon('heroicon-m-link')
            ->preview('polipages::blocks-previews.anchor')
            ->schema([
                TextInput::make('anchor')
                    ->label('Anchor')
                    ->placeholder('Example: about'),
            ]);
    }
}
