<?php

namespace Detit\Polipages\Commands;

use Illuminate\Console\Command;

class PolipagesCommand extends Command
{
    public $signature = 'polipages';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
