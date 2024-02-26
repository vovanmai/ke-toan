<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Comment\MaskReadCommentService;
use App\Services\Admin\Contact\ListService;
use App\Services\Admin\Contact\MaskReadContactService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'name',
            'email',
        ]);

        try {
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.contact.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('admin.error.error');
        }
    }

    public function markRead (Request $request)
    {
        try {
            resolve(MaskReadContactService::class)->handle();
            return response()->success('Thành công');
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
