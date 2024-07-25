<?php

namespace Detit\Polipages;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Detit\Polipages\Resources\PageResource;



class PolipagesPlugin implements Plugin
{
    public function getId(): string
    {
        return 'polipages';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                PageResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
