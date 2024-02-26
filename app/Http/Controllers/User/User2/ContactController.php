<?php

namespace App\Http\Controllers\User\User2;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User2\Contact\CreateContactRequest;
use App\Services\User\User2\Contact\StoreService;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function index ()
    {
        try {
            return view('user.user2.contact', [
                'websiteTitle' => 'Liên hệ',
            ]);
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
