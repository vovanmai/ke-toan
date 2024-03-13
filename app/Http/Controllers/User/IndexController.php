<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\IndexService;
use Exception;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index ()
    {
        try {
            $data = resolve(IndexService::class)->handle();
            $data['isShowMainBanner'] = true;
            return view('user.index', $data);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
