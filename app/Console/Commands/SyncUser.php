<?php

namespace App\Console\Commands;

use App\Jobs\UserSync;
use Illuminate\Console\Command;

class SyncUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:user {--name=} {--email=} {--role=} {--contact_number=} {--address=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncing User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $options =  $this->options();
       dispatch(new UserSync($options));
       dd("done");
    }
}
