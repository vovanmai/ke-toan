<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Admin\Order\DetailService;
use App\Services\Admin\Order\ListService;
use App\Services\Admin\Order\UpdateStatusService;
use App\Services\Admin\Slider\ChangeActiveService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class OrderController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'name',
            'status',
            'code',
            'email',
            'phone_number',
            'payment_method',
            'created_at_from',
            'created_at_to',
        ]);

        try {
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.order.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function show ($id)
    {
        try {
            list($order, $orderDetails) = resolve(DetailService::class)->handle($id);
            return view('admin.order.detail', [
                'order' => $order,
                'orderDetails' => $orderDetails,
            ]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('admin.error.not_found');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('admin.error.error');
        }
    }

    public function updateStatus (Request $request, $id)
    {
        $data = $request->only(['status', 'note']);
        try {
            resolve(UpdateStatusService::class)->handle($id, $data);
            session()->flash('success_message', 'Cập nhật trạng thái thành công.');
            return redirect()->back();
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('admin.error.not_found');
        } catch (Exception $exception) {dd($exception->getMessage());
            Log::error($exception);
            return redirect()->route('admin.error.error');
        }
    }
}
