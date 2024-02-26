<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index (Request $request)
    {
        try {
            return view('user.index');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
