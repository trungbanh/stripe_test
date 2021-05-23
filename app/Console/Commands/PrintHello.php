<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PrintHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Print Hello';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->error('Something went wrong!');
        return 0;
    }
}
