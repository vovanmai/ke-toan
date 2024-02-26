<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\Dashboard\OrderStatistic;
use App\Services\Admin\Dashboard\UserStatistic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Exception;

class DashboardController extends BaseController
{
    public function index (Request $request)
    {
        $params['type'] = $request->get('type', array_key_first(OrderStatistic::$types));
        $params['type_order'] = $request->get('type_order', array_key_first(UserStatistic::$types));
        try {
            list($orderStatistic, $data) = resolve(OrderStatistic::class)->handle($params);
            list($totalUser, $userData) = resolve(UserStatistic::class)->handle($params);

            if ($request->ajax()) {
                return response()->success('Thành công', $data);
            }

            return view('admin.dashboard.index', [
                'orderStatistic' => $orderStatistic,
                'data' => $data,
                'totalUser' => $totalUser,
                'userData' => $userData,
            ]);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return redirect()->route('admin.error.error');
        }
    }
}
