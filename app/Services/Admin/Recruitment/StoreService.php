<?php

namespace App\Services\Admin\Recruitment;

use App\Data\Repositories\Eloquent\RecruitmentRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class StoreService
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
     * Create product
     *
     * @return array
     */
    public function handle (array $data)
    {
        return $this->createRecruitment($data);
    }

    /**
     * CreateRecruitment
     *
     * @param array $data Data
     *
     * @return Product
     * @throws ValidatorException
     */
    public function createRecruitment (array $data)
    {
        return $this->recruitmentRepository->create([
            'title' => $data['title'],
            'admin_id' => Auth::user()->id,
            'short_description' => $data['short_description'] ?? null,
            'description' => $data['description'],
            'image' => $data['image'],
            'comment_type' => $data['comment_type'] ?? 1
        ]);
    }
}
