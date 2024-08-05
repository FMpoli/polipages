<?php

namespace Detit\Polipages\Resources\PageResource\Blocks;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use TomatoPHP\FilamentIcons\Components\IconPicker;

class ContactForm
{
    public static function make(): Block
    {
        return Block::make('contact-form')
            ->icon('heroicon-m-envelope')
            ->preview('polipages::blocks-previews.contactform')
            ->schema([
                TextInput::make('send_to')
                    ->label('Send to email')
                    ->placeholder('Enter the destination email')
                    ->required(),
                TextInput::make('short_text')
                    ->label('Short text'),
                Repeater::make('contacts')
                    ->schema([
                        TextInput::make('text')
                            ->label('Text')
                            ->placeholder('Enter the button text'),
                        IconPicker::make('icon')
                            ->default('heroicon-o-academic-cap')
                            ->label('Icon'),
                    ])
                    ->minItems(0)
                    ->maxItems(2)
                    ->columns(2),
            ]);
    }

}
