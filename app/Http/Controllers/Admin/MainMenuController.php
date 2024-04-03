<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SettingMainMenu\ListService;
use Illuminate\Http\Request;
use Exception;
use Log;

class MainMenuController extends Controller
{
    public function index (Request $request)
    {
        try {
            $items = resolve(ListService::class)->handle();

            return view('admin.main-menu.create', [
                'items' => $items
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }
}
