<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
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
            $siteMap = Sitemap::create()
                ->add(
                    Url::create(route('user.index'))
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(1)
                );

            Category::orderBy('id', 'ASC')->chunk(100, function ($categories) use ($siteMap) {
                foreach ($categories as $category) {
                    $siteMap
                        ->add(
                            Url::create(route('user.post.index', ['slug' => $category->slug]))
                                ->setPriority(0.5)
                                ->setLastModificationDate($category->updated_at)
                                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        );
                }
            });

            Post::orderBy('id', 'ASC')->select('*')->with('category:id,slug')->chunk(100, function ($posts) use ($siteMap) {
                foreach ($posts as $post) {
                    $siteMap
                        ->add(
                            Url::create(route('user.post.detail', ['category' => $post->category->slug, 'slug' => $post->slug]))
                                ->setPriority(0.5)
                                ->addImage(customAsset($post->image['url'] ?? ''), $post->title)
                                ->setLastModificationDate($post->updated_at)
                                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        );
                }
            });

            $siteMap->writeToFile(public_path('sitemap.xml'));

        } catch (\Exception $exception) {
            dd($exception);
        }

        return 0;
    }
}
