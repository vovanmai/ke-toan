<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Event\CreateEventRequest;
use App\Services\Admin\Event\StoreService;
use Illuminate\Routing\Controller as BaseController;
use Exception;

class EventController extends BaseController
{
    public function store (CreateEventRequest $request)
    {
        $data = $request->validated();

        $result = resolve(StoreService::class)->handle($data);

        try {
            return response()->success('Tạo sự kiện thành công', $result);
        } catch (Exception $ex) {
            return response()->error();
        }
    }
}
