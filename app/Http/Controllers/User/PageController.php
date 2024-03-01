<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Page\DetailService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function show ($slug)
    {
        try {
            $item = resolve(DetailService::class)->handle($slug);
            return view('user.page.detail', [
                'item' => $item,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.error.not_found');
        } catch (Exception $exception) {dd($exception);
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
