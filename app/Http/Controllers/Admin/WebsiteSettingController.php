<?php

namespace App\Http\Controllers\Admin;

use App\Data\Repositories\Eloquent\WebsiteSettingRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateWebsiteSettingRequest;
use App\Services\Admin\WebsiteSetting\StoreService;
use Exception;
use Log;

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

            session()->flash('success_message', 'Thiết lập thành công!');

            return redirect()->back();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }
}
