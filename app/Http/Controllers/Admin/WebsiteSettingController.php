<?php

namespace App\Http\Controllers\Admin;

use App\Data\Repositories\Eloquent\WebsiteSettingRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateWebsiteSettingRequest;
use App\Services\Admin\WebsiteSetting\StoreService;
use Exception;
use Illuminate\Support\Facades\Log;

class WebsiteSettingController extends Controller
{
    public function create ()
    {
        try {
            $setting = resolve(WebsiteSettingRepository::class)->first();
            return view('admin.website-setting.create', [
                'setting' => $setting
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateWebsiteSettingRequest $request)
    {
        $data = $request->validated();

        try {
            resolve(StoreService::class)->handle($data);

            return response()->success('Thành công');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Lỗi', []);
        }
    }
}
