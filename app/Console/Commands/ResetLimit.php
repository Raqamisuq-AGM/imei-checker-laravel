<?php

namespace App\Console\Commands;

use App\Models\ImeiLimit;
use Illuminate\Console\Command;

class ResetLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imei:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Imei limit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ImeiLimit::query()->update(['limit' => 3]);

        $this->info('IMEI limit updated to 3.');
    }
}
