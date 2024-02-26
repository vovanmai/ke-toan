<?php

namespace App\Http\Controllers\User\User3;

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
            return view('user.user3.index');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function test (Request $request)
    {
//        $cats = resolve(\App\Services\User\User3\Category\GetAllService::class)->handle(\App\Models\Category::TYPE_DOCUMENT);
//
//        foreach ($cats as $cat) {
//            var_dump(!$cat->childrenRecursive->isEmpty());
//        }
//        dd(1);
        try {
            return view('user.user3.test');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
