<?php

namespace App\Http\Controllers\User\User4;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Services\User\User4\Post\GetHomePostService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index (Request $request)
    {
        try {
            $post = resolve(GetHomePostService::class)->handle();
            return view('user.user4.index', [
                'post' => $post,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
