<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteOldChats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chats:cleanup';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete chats older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
