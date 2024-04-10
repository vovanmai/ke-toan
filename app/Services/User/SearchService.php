<?php

namespace App\Services\User;

use App\Data\Repositories\Eloquent\CourseRepository;
use App\Data\Repositories\Eloquent\PostRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SearchService
{
    /**
     * @var CourseRepository
     */
    protected $courseRepo;

    /**
     * @var PostRepository
     */
    protected $postRepo;

    public function __construct(
        CourseRepository $courseRepo,
        PostRepository $postRepo
    ) {
        $this->courseRepo = $courseRepo;
        $this->postRepo = $postRepo;
    }

    /**
     * @return array
     */
    public function handle($keyword)
    {
        if (blank($keyword)) {
            return ;
        }
        $keyword = mb_strtolower($keyword);
        $keyword = "%{$keyword}%";

        $courses = $this->courseRepo->with(['category'])
            ->scopeQuery(function ($query) use ($keyword) {
                return $query->where(function ($query) use ($keyword) {
                    return $query->where(DB::raw('lower(title)'), 'like', $keyword);
    //                    ->orWhere(DB::raw('lower(short_description)'), 'like', $keyword);
                });
            })->whereByField('active', true)
            ->all([
                'title',
                'slug',
                'short_description',
                'category_id',
            ]);


        $posts = $this->postRepo->with(['category'])
            ->scopeQuery(function ($query) use ($keyword) {
                return $query->where(function ($query) use ($keyword) {
                    return $query->where(DB::raw('lower(title)'), 'like', $keyword);
    //                    ->orWhere(DB::raw('lower(short_description)'), 'like', $keyword);
                });
            })->whereByField('active', true)
            ->paginate(20, [
                'title',
                'slug',
                'short_description',
                'category_id',
            ]);

        return [
            'courses' => $courses,
            'posts' => $posts,
        ];
    }

    /**
     * Increase view count of post
     *
     * @return void
     */
    public function increaseViewCount()
    {
        $ip = request()->ip();

        $lock = Cache::lock("page_index_{$ip}", 30);

        if ($lock->get()) {
            $webSetting = app('web_setting');

            if ($webSetting) {
                $webSetting->total_view = $webSetting->total_view + 1;
                $webSetting->save();
            }
        }
    }
}
