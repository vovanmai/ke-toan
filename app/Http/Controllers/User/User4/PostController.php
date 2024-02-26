<?php

namespace App\Http\Controllers\User\User4;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User1\Contact\CreateContactRequest;
use App\Services\User\User1\Contact\StoreService;
use Exception;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    public function index ()
    {
        try {
            makeSEO([
                'title' => 'Bài viết',
                'description' => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...',
            ]);
            return view('user.user4.post');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.index');
        }
    }
}
