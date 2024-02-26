<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\FeeCharge;

class FeeChargeRepository extends AppBaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return FeeCharge::class;
    }
}
