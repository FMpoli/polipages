<?php

namespace Detit\Polipages\Resources\PageResource\Blocks;
use Filament\Forms\Components\Builder\Block;

class LatestNews
{
    public static function getBlockSchema(): Block
    {
        return Block::make('latest-news')
            ->icon('heroicon-m-newspaper')
            ->preview('polipages::blocks-previews.latestnews')
            ->schema([
                //
            ]);
    }

}
