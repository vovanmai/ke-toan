<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SettingMainMenu\ListService;
use App\Services\Admin\SettingMainMenu\UpdateService;
use Illuminate\Http\Request;
use Exception;
use Log;

class MainMenuController extends Controller
{
    public function index (Request $request)
    {
        try {
            $data = resolve(ListService::class)->handle();

            return view('admin.main-menu.create', $data);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function update (Request $request)
    {
        $data = $request->only([
            'data'
        ]);
        try {
            resolve(UpdateService::class)->handle($data);
            return response()->success('Thành công');
        } catch (Exception $ex) {dd($ex);
            $this->rollback();
            Log::info($ex->getMessage());
            return response()->error('Máy chủ bị lỗi');
        }
    }
}
