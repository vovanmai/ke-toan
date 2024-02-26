<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EventOption\CreateEventOptionRequest;
use App\Services\Admin\EventOption\StoreService;
use Illuminate\Routing\Controller as BaseController;
use Exception;

class EventOptionController extends BaseController
{

    public function store (CreateEventOptionRequest $request)
    {
        $data = $request->validated();

        $result = resolve(StoreService::class)->handle($data);

        try {
            return response()->success('Tạo lựa chọn sự kiện thành công', $result);
        } catch (Exception $ex) {
            return response()->error();
        }
    }
}
