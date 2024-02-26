<?php

namespace App\Http\Controllers\User\User1;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index (Request $request)
    {
        try {
            return view('user.user1.index.index', [
                'websiteSetting' => WebsiteSetting::first(),
                'websiteTitle' => 'Trang chủ',
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
