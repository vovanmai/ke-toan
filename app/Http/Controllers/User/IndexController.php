<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\IndexService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index (Request $request)
    {
        try {
            $data = resolve(IndexService::class)->handle();
            return view('user.index', $data);
        } catch (Exception $exception) {dd($exception);
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
