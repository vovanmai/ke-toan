<?php

namespace App\Services\Admin\Category;

use App\Data\Repositories\Eloquent\CategoryRepository;
use App\Data\Validators\Exceptions\ValidatorException;
use App\Models\Category;
use Illuminate\Support\MessageBag;

class CreateService
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data Data
     *
     * @return array
     */
    public function handle (array $data)
    {
        $parentCat = $this->repository->firstWhere(['id' => $data['parent_id']]);

        $grade = $this->getGradeNumber($parentCat);

        if ($grade >= Category::MAX_GRADE) {
            throw new ValidatorException(new MessageBag(['parent_id' => 'Danh mục tối đa ' . Category::MAX_GRADE . ' cấp.']));
        }

        $data['description'] = empty($data['description']) ? $data['title'] : $data['description'];
        $data['show_on_menu'] = true;
        $data['active'] = true;
        $data['display_type'] = Category::TYPE_DISPLAY_LIST;

        $maxOrder = $this->repository->orderBy('order', 'DESC')->first(['order']);

        $data['order'] = isset($maxOrder->order) ? $maxOrder->order + 1 : 0;

        return $this->repository->create($data);
    }

    /**
     * @param array $data Data
     *
     * @return int
     */
    private function getGradeNumber ($category, &$number = 0)
    {
        if ($category) {
            $number++;
            $this->getGradeNumber($category->parent, $number);
        }

        return $number;
    }
}
