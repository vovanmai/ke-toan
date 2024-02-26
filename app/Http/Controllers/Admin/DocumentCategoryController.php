<?php

namespace App\Http\Controllers\Admin;

use App\Data\Validators\Exceptions\ValidatorException;
use App\Http\Requests\Admin\Category\CreateRequest;
use App\Http\Requests\Admin\Category\EditRequest;
use App\Models\Category;
use App\Services\Admin\Category\CreateService;
use App\Services\Admin\Category\DeleteService;
use App\Services\Admin\Category\DetailService;
use App\Services\Admin\Category\GetAllService;
use App\Services\Admin\Category\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Exception;
use Log;

class DocumentCategoryController extends BaseController
{
    public function all (Request $request)
    {
        $filters = $request->only([
            'title',
        ]);

        $filters['type'] = Category::TYPE_DOCUMENT;

        try {
            $categories = resolve(GetAllService::class)->handle($filters);

            return view('admin.document-category.all', [
                'categories' => $categories,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        $data = [
            'type' => Category::TYPE_DOCUMENT,
        ];
        try {
            $categories = resolve(GetAllService::class)->handle($data);

            return view('admin.document-category.create', [
                'categories' => $categories,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
            'category_id',
            'description',
        ]);

        $data['type'] = Category::TYPE_DOCUMENT;

        $data['parent_id'] = $data['category_id'] ?? null;

        try {
            resolve(CreateService::class)->handle($data);

            session()->flash('success_message', 'Tạo danh mục thành công!');

            return redirect()->route('admin.document_category.list');
        } catch (ValidatorException $ex) {
            return redirect()->back()->withErrors($ex->getMessageBag());
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        $filters = [
            'type' => Category::TYPE_DOCUMENT,
        ];
        try {
            $categories = resolve(GetAllService::class)->handle($filters);
            $editCategory = resolve(DetailService::class)->handle($id);

            return view('admin.document-category.edit', [
                'categories' => $categories,
                'editCategory' => $editCategory,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (EditRequest $request, int $id)
    {
        $data = $request->only([
            'title',
            'description',
            'category_id',
            'description',
        ]);

        $data['parent_id'] = $data['category_id'] ?? null;

        try {
            resolve(UpdateService::class)->handle($id, $data);

            session()->flash('error_msg', trans('message.admin.create_success'));

            return redirect()->route('admin.document_category.list');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function destroy ($id)
    {
        try {
            $result = resolve(DeleteService::class)->handle($id);
            return response()->success('Xóa danh mục thành công thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
