<?php

namespace App\Http\Controllers\User\User4;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User1\Contact\CreateContactRequest;
use App\Services\User\User1\Contact\StoreService;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function index ()
    {
        try {
            makeSEO([
                'title' => 'Liên hệ',
                'description' => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...',
            ]);
            return view('user.user4.contact');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }

    public function store (CreateContactRequest $request)
    {
        $data = $request->validated();
        try {
            resolve(StoreService::class)->handle($data);
            session()->flash('success_message', 'Tạo liên hệ thành công!');
            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.error.error');
        }
    }
}
