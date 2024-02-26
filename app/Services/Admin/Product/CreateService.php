<?php

namespace App\Services\Admin\Product;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Repositories\Eloquent\DiscountRepository;
use App\Services\Admin\Category\GetAllService;

class CreateService
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var DiscountRepository
     */
    protected $discountRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        DiscountRepository $discountRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->discountRepository = $discountRepository;
    }

    /**
     * Create product
     *
     * @return array
     */
    public function handle (array $data)
    {
        $discounts = $this->discountRepository->orderBy('id', 'DESC')->all();

        $categories = resolve(GetAllService::class)->handle($data);

        return [$categories, $discounts];
    }
}
