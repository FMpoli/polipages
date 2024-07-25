<?php

namespace Detit\Polipages\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;

class Faq
{
    public static function make(): Block
    {
        return Block::make('faq')
            ->icon('heroicon-m-queue-list')
            ->preview('polipages::blocks-previews.faq')
            ->schema([
                TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Frequently asked questions')
                        ->columnSpan(2)
                        ->required(),
                ColorPicker::make('background_color'),
                Repeater::make('faq')
                    ->schema([
                        TextInput::make('question')
                            ->label('Question')
                            ->placeholder('What is the question?'),
                        TextInput::make('answer')
                            ->label('Answer')
                            ->placeholder('What is the answer?')
                    ])
                    ->minItems(0)
                    ->columns(2),
            ]);
    }
}
