<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Category;
use App\Services\Admin\Product\CreateService;
use App\Services\Admin\Product\DeleteService;
use App\Services\Admin\Product\DetailService;
use App\Services\Admin\Category\GetAllService;
use App\Services\Admin\Product\ListService;
use App\Services\Admin\Product\StoreService;
use App\Services\Admin\Product\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class ProductController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'name',
            'price',
            'category_id',
            'created_at_from',
            'created_at_to',
        ]);

        try {
            $data = [
                'type' => Category::TYPE_PRODUCT,
            ];
            $categories = resolve(GetAllService::class)->handle($data);
            $products = resolve(ListService::class)->handle($filters);

            return view('admin.product.index', [
                'categories' => $categories,
                'products' => $products,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        try {
            $data = [
                'type' => Category::TYPE_PRODUCT,
            ];

            list($categories, $discounts) = resolve(CreateService::class)->handle($data);

            if (!$categories->count()) {
                session()->flash('error_message', 'Vui lòng tạo danh mục trước khi tạo sản phẩm.');
                return redirect()->back();
            }

            return view('admin.product.create', [
                'categories' => $categories,
                'discounts' => $discounts,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateRequest $request)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(StoreService::class)->handle($data);
            $this->commit();

            session()->flash('success_message', 'Tạo sản phẩm thành công!');

            return redirect()->route('admin.product.list');
        } catch (Exception $ex) {
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $data = [
                'type' => Category::TYPE_PRODUCT,
            ];
            $categories = resolve(GetAllService::class)->handle($data);
            $product = resolve(DetailService::class)->handle($id);
            return view('admin.product.edit', [
                'categories' => $categories,
                'product' => $product,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (UpdateProductRequest $request, int $id)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(UpdateService::class)->handle($id, $data);
            $this->commit();

            session()->flash('success_message', 'Cập nhật sản phẩm thành công!');

            return redirect()->route('admin.product.list');
        } catch (Exception $ex) {dd($ex->getMessage());
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function destroy ($id)
    {
        try {
            $this->beginTransaction();
            $result = resolve(DeleteService::class)->handle($id);
            $this->commit();
            return response()->success('Xóa danh mục thành công thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            $this->rollback();
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
