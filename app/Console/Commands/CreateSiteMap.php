<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        try {
            Sitemap::create()
                // here we add an image to a URL
                ->add('/page1')
                ->add('/page2')
                ->add(Url::create('https://example.com')->addImage('https://example.com/images/home.jpg', 'Home page image'))
                ->writeToFile(public_path('sitemap.xml'));
        } catch (\Exception $exception) {
            dd($exception);
        }

        return 0;
    }
}
