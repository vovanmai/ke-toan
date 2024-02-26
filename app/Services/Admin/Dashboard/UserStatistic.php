<?php

namespace App\Services\Admin\Dashboard;

use App\Data\Repositories\Eloquent\UserRepository;
use App\Models\Order;
use App\Models\User;
use DB;

class UserStatistic
{

    public static $types = [
        'day_30' => 'Theo ngày (30 ngày)',
        'day_50' => 'Theo ngày (50 ngày)',
        'day_100' => 'Theo ngày (100 ngày)',
        'month_12' => 'Theo tháng (12 tháng)',
        'month_24' => 'Theo tháng (24 tháng)',
        'month_36' => 'Theo tháng (36 tháng)',
    ];

    /**
     * UserRepository
     *
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id Id
     *
     * @return boolean
     */
    public function handle(array $params)
    {
        $totalUser = $this->repository->count();

        $types = array_keys(self::$types);
        $type = in_array($params['type_order'], $types) ? $params['type_order'] : array_key_first(self::$types);

        switch ($type) {
            case 'day_30':
                $data = $this->getDays(30);
                break;
            case 'day_50':
                $data = $this->getDays(50);
                break;
            case 'day_100':
                $data = $this->getDays(100);
                break;
            case 'month_12':
                $data = $this->getMonths(12);
                break;
            case 'month_24':
                $data = $this->getMonths(24);
                break;
            case 'month_36':
                $data = $this->getMonths(36);
                break;
        }

        return [$totalUser, $data];
    }


    public function getDays(int $number)
    {
        $dates = [];
        $now = now()->subDay($number);
        while (count($dates) < $number) {
            $dates[] = "ROW('{$now->addDay()->format('Y-m-d')}')";
        }

        $dates = trim(implode(', ', $dates));

        return User::rightJoin(\DB::raw("(VALUES $dates) as tmp"), 'tmp.column_0', '=', \DB::raw("DATE(users.created_at)"))
            ->groupBy('tmp.column_0')
            ->get([
                'tmp.column_0 as date',
                \DB::raw("COUNT(CASE WHEN users.id IS NOT NULL THEN 1 ELSE NULL END) as number")
            ])
            ->pluck('number', 'date');
    }

    public function getMonths(int $number)
    {
        $dates = [];
        $now = now()->subMonthNoOverflow($number);
        while (count($dates) < $number) {
            $dates[] = "ROW('{$now->addMonthNoOverflow()->format('Y-m')}')";
        }

        $dates = trim(implode(', ', $dates));

        return User::rightJoin(\DB::raw("(VALUES $dates) as tmp"), 'tmp.column_0', '=', \DB::raw("DATE_FORMAT(users.created_at, '%Y-%m')"))
            ->groupBy('tmp.column_0')
            ->get([
                'tmp.column_0 as date',
                \DB::raw("COUNT(CASE WHEN users.id IS NOT NULL THEN 1 ELSE NULL END) as number")
            ])
            ->pluck('number', 'date');
    }
}
