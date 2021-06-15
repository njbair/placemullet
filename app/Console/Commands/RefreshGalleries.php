<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Gallery;

class RefreshGalleries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'galleries:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the filesystem cache used to populate the image galleries.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->gallery = new Gallery();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $index = $this->gallery->refreshCache();

        if ($index) {
            $count = count($index);

            $this->info("Success! {$count} images indexed.");

            return 0;
        }

        $this->error('something went wrong');
        return 1;
    }
}
