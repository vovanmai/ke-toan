<?php

namespace App\Services\User\Page;

use App\Data\Repositories\Eloquent\PageRepository;
use App\Data\Repositories\Eloquent\PostRepository;

class GetAllService
{
    /**
     * @var PostRepository
     */
    protected $repository;

    public function __construct(
        PageRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Get comments
     *
     * @param array $data Data
     *
     * @return array
     */
    public function handle ()
    {
        $pages = $this->repository
            ->whereByField('active', true)
            ->whereByField('show_on_menu', true)
            ->orderBy('id', 'ASC')
            ->all(['slug', 'title']);

        return $pages;
    }
}
