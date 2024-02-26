<?php

namespace App\Http\Controllers\Admin;

use App\Data\Repositories\Eloquent\FeeChargeRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateFeeChargeRequest;
use App\Services\Admin\FeeCharge\StoreService;
use Exception;
use Log;

class FeeChargeController extends Controller
{
    public function create ()
    {
        try {
            $fee = resolve(FeeChargeRepository::class)->first();
            return view('admin.fee-charge.create', [
                'fee' => $fee
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateFeeChargeRequest $request)
    {
        $data = $request->validated();

        try {
            resolve(StoreService::class)->handle($data);

            session()->flash('success_message', 'Thiết lập thành công!');

            return redirect()->back();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }
}
