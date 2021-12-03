<?php


namespace Lukaswhite\LaravelEmailChecker\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Lukaswhite\EmailChecker\Data\Sync;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email-checker:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the email checker data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sync = new Sync(Storage::path(config('email-checker.directory')), false);
        $sync->fetch();
    }
}