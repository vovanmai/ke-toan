<?php

namespace App\Services\Admin\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;
use App\Models\Product;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateService
{
    /**
     * @var RecruitmentRepository
     */
    protected $recruitmentRepository;

    public function __construct(
        RecruitmentRepository $recruitmentRepository
    ) {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    /**
     * Update product
     *
     * @return array
     */
    public function handle (int $id, array $data)
    {
        return $this->updateRecruitment($id, $data);
    }

    /**
     * Create recruitment
     *
     * @param array $data Data
     *
     * @return Product
     * @throws ValidatorException
     */
    public function updateRecruitment (int $id, array $data)
    {
        $dataUpdate = [
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'comment_type' => $data['comment_type']
        ];

        if (isset($data['image']) && !empty($data['image'])) {
            $dataUpdate['image'] = $data['image'];
        }

        return $this->recruitmentRepository->update($dataUpdate, $id);
    }
}
