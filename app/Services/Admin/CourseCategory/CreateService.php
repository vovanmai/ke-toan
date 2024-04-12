<?php

namespace App\Services\Admin\CourseCategory;

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

        if ($grade >= Category::MAX_GRADE_COURSE) {
            throw new ValidatorException(new MessageBag(['parent_id' => 'Danh mục tối đa ' . Category::MAX_GRADE_COURSE . ' cấp.']));
        }

        $data['description'] = empty($data['description']) ? $data['title'] : $data['description'];
        $data['active'] = true;

        $data['type'] = $data['type'] ?? Category::TYPE_POST;

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
