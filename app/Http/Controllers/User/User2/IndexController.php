<?php

namespace App\Http\Controllers\User\User2;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Services\User\User2\Slider\ListService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index (Request $request)
    {
        try {
            return view('user.user2.index.index', [
                'websiteSetting' => WebsiteSetting::first(),
                'websiteTitle' => 'Trang chủ (Trung tâm kế toán chuyên nghiệp DPT)',
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
