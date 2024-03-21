<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainBanner\CreateRequest;
use App\Http\Requests\Admin\MainBanner\EditRequest;
use App\Services\Admin\MainBanner\ChangeActiveService;
use App\Services\Admin\MainBanner\DeleteService;
use App\Services\Admin\MainBanner\DetailService;
use App\Services\Admin\MainBanner\ListService;
use App\Services\Admin\MainBanner\StoreService;
use App\Services\Admin\MainBanner\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class MainBannerController extends Controller
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

            return view('admin.main-banner.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        try {
            return view('admin.main-banner.create');
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

            session()->flash('success_message', 'Tạo thành công!');

            return redirect()->route('admin.main_banner.list');
        } catch (Exception $ex) {
            $this->rollback();
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $item = resolve(DetailService::class)->handle($id);
            return view('admin.main-banner.edit', [
                'item' => $item,
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('admin.error.not_found');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (EditRequest $request, int $id)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(UpdateService::class)->handle($id, $data);
            $this->commit();

            session()->flash('success_message', 'Cập nhật thành công!');
            return response()->success('Thành công');
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

    public function changActive (Request $request, $id)
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
