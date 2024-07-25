<?php

namespace Detit\Polipages\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Filament\Forms\Components\ColorPicker;

class HeroWithImage
{

    public static function make(): Block
    {
        return Block::make('hero-with-image')
            ->icon('heroicon-m-photo')
            ->preview('polipages::blocks-previews.heroimage')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Enter the title')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('Sub title')
                    ->placeholder('Enter the subtitle'),
                CuratorPicker::make('media')
                    ->required(),
                ToggleButtons::make('image_position')
                    ->label('Image position')
                    ->default('left')
                    ->inline()
                    ->options([
                        'left' => 'Left',
                        'right' => 'Right'
                    ]),
                ColorPicker::make('background_color'),
                Repeater::make('buttons')
                    ->schema([
                        TextInput::make('text')
                            ->label('Button text')
                            ->placeholder('Enter the button text'),
                        TextInput::make('url')
                            ->label('Button url')
                            ->placeholder('Enter the button url'),
                        IconPicker::make('icon')
                            ->default('heroicon-o-academic-cap')
                            ->label('Icon'),
                    ])
                    ->maxItems(2)
                    ->minItems(0)
                    ->columns(2),
            ]);
    }
}
