<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Recruitment\CreateRequest;
use App\Http\Requests\Admin\Recruitment\EditRecruitmentRequest;
use App\Http\Requests\Admin\Recruitment\UpdateProductRequest;
use App\Models\Recruitment;
use App\Services\Admin\Recruitment\ChangeActiveService;
use App\Services\Admin\Recruitment\CreateService;
use App\Services\Admin\Recruitment\DeleteService;
use App\Services\Admin\Recruitment\DetailService;
use App\Services\Admin\Category\GetAllService;
use App\Services\Admin\Recruitment\ListService;
use App\Services\Admin\Recruitment\StoreService;
use App\Services\Admin\Recruitment\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class RecruitmentController extends Controller
{
    public function index (Request $request)
    {
        $filters = $request->only([
            'title',
            'created_at_from',
            'created_at_to',
        ]);

        try {
            $items = resolve(ListService::class)->handle($filters);

            return view('admin.recruitment.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        try {
            return view('admin.recruitment.create');
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

            return redirect()->route('admin.recruitment.list');
        } catch (Exception $ex) {
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $recruitment = resolve(DetailService::class)->handle($id);
            return view('admin.recruitment.edit', [
                'recruitment' => $recruitment,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('admin.error.not_found');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (EditRecruitmentRequest $request, int $id)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(UpdateService::class)->handle($id, $data);
            $this->commit();

            session()->flash('success_message', 'Cập nhật tuyển dụng thành công!');

            return redirect()->route('admin.recruitment.list');
        } catch (Exception $ex) {
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

    public function changeActive (Request $request, $id)
    {
        try {
            $data = $request->only([
                'active',
            ]);
            $result = resolve(ChangeActiveService::class)->handle($id, $data);
            return response()->success('Thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
