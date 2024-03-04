<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\CreateRequest;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Services\Admin\Page\ChangeActiveService;
use App\Services\Admin\Page\ChangeShowOnMenuService;
use App\Services\Admin\Page\DeleteService;
use App\Services\Admin\Page\DetailService;
use App\Services\Admin\Page\StoreService;
use App\Services\Admin\Page\ListService;
use App\Services\Admin\Page\UpdateService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;
use Log;

class PageController extends Controller
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

            return view('admin.page.index', [
                'items' => $items,
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        try {
            return view('admin.page.create');
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

            return redirect()->route('admin.page.list');
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
            return view('admin.page.edit', [
                'item' => $item,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function update (UpdateRequest $request, int $id)
    {
        $data = $request->validated();

        try {
            $this->beginTransaction();
            resolve(UpdateService::class)->handle($id, $data);
            $this->commit();

            session()->flash('success_message', 'Cập nhật thành công!');
            return redirect()->route('admin.page.list');
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
        } catch (Exception $exception) {dd($exception->getMessage());
            $this->rollback();
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }

    public function changeActive (Request $request, int $id)
    {
        $data = $request->only([
            'active'
        ]);
        try {
            $this->beginTransaction();
            $result = resolve(ChangeActiveService::class)->handle($id, $data);
            $this->commit();
            return response()->success('Thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            $this->rollback();
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }

    public function changeShowOnMenu (Request $request, int $id)
    {
        $data = $request->only([
            'show_on_menu'
        ]);
        try {
            $this->beginTransaction();
            $result = resolve(ChangeShowOnMenuService::class)->handle($id, $data);
            $this->commit();
            return response()->success('Thành công', $result);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (Exception $exception) {
            $this->rollback();
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
