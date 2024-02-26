<?php

namespace App\Http\Controllers\Admin;

use App\Data\Exceptions\ForbiddenException;
use App\Http\Requests\Admin\Discount\CreateRequest;
use App\Http\Requests\Admin\Discount\EditRequest;
use App\Services\Admin\Discount\DeleteService;
use App\Services\Admin\Discount\ListService;
use App\Services\Admin\Discount\ShowService;
use App\Services\Admin\Discount\StoreService;
use App\Services\Admin\Discount\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Exception;
use Log;

class DiscountController extends BaseController
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'title',
            'discount_percent',
        ]);

        try {
            $discounts = resolve(ListService::class)->handle($filters);

            return view('admin.discount.index', [
                'discounts' => $discounts,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateRequest $request)
    {
        $data = $request->only([
            'title',
            'discount_percent',
            'description',
        ]);

        try {
            $result = resolve(StoreService::class)->handle($data);
            return response()->success('Tạo giảm giá thành công.', $result);
        } catch (Exception $ex) {
            return response()->error('Có lỗi khi truy cập đến máy chủ.', $ex);
        }
    }

    public function update (EditRequest $request, int $id)
    {
        $data = $request->only([
            'title',
            'discount_percent',
            'description',
        ]);

        try {
            $result = resolve(UpdateService::class)->handle($id, $data);
            return response()->success('Cập nhật giảm giá thành công.', $result);
        } catch (Exception $ex) {
            return response()->error('Có lỗi khi truy cập đến máy chủ.', $ex);
        }
    }

    public function show (int $id)
    {
        try {
            $result = resolve(ShowService::class)->handle($id);
            return response()->success('Thành công', $result);
        } catch (ModelNotFoundException $ex) {
            return response()->notFound();
        } catch (Exception $ex) {
            return response()->error('Có lỗi khi truy cập đến máy chủ.', $ex);
        }
    }

    public function destroy (int $id)
    {
        try {
            resolve(DeleteService::class)->handle($id);
            return response()->success('Xóa giảm giá thành công');
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (ForbiddenException $exception) {
            return response()->error($exception->getMessage(), [], Response::HTTP_FORBIDDEN);
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
