<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\SearchService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function search (Request $request)
    {
        $keyword = $request->get('keyword');
        try {
            $result = resolve(SearchService::class)->handle($keyword);
            return view('user.search', [
                'keyword' => $keyword,
                'result' => $result,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
