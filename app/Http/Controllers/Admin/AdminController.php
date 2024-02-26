<?php

namespace App\Http\Controllers\Admin;

use App\Data\Exceptions\ForbiddenException;
use App\Data\Repositories\Traits\TclEloquent;
use App\Http\Requests\Admin\Admin\CreateRequest;
use App\Http\Requests\Admin\Admin\EditRequest;
use App\Models\Admin;
use App\Services\Admin\Admin\ChangeActiveService;
use App\Services\Admin\Admin\CreateService;
use App\Services\Admin\Admin\DeleteService;
use App\Services\Admin\Admin\EditService;
use App\Services\Admin\Admin\ListService;
use App\Services\Admin\CommonService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Exception;

class AdminController extends BaseController
{
    use TclEloquent;

    public function index (Request $request)
    {
        $filters = $request->only([
            'email',
            'name',
            'role',
        ]);

        try {
            if ($request->ajax()) {
                $admins = resolve(ListService::class)->handle($filters);
                return view('admin.admins.list', [
                    'admins' => $admins,
                ]);
            }

            $roles = resolve(CommonService::class)->getRoles(true);

            return view('admin.admins.index', [
                'roles' => $roles,
            ]);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function create ()
    {
        try {
            $roles = resolve(CommonService::class)->getRoles();
            return view('admin.admins.create', [
                'roles' => $roles,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function edit (int $id)
    {
        try {
            $roles = resolve(CommonService::class)->getRoles();
            $admin = Admin::findOrFail($id);
            return view('admin.admins.edit', [
                'roles' => $roles,
                'admin' => $admin,
            ]);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('admin.error.not_found');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->route('admin.error.error');
        }
    }

    public function store (CreateRequest $request)
    {
        $data = $request->only([
            'email',
            'name',
            'password',
            'password_confirmation',
            'role',
            'avatar',
        ]);

        try {
            $this->beginTransaction();
            $result = resolve(CreateService::class)->handle($data);
            $this->commit();
            session()->flash('success_message', 'Tạo admin thành công!');
            return response()->success(
                'Tạo admin thành công.',
                $result,
                Response::HTTP_CREATED
            );
        } catch (Exception $ex) {
            $this->rollback();
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }

    public function update (EditRequest $request, int $id)
    {
        $data = $request->only([
            'email',
            'name',
            'password',
            'password_confirmation',
            'role',
            'avatar',
        ]);

        try {
            resolve(EditService::class)->handle($data, $id);

            session()->flash('success_message', 'Sửa admin thành công!');

            return response()->success(
                'Cập nhật admin thành công.',
            );
        } catch (ForbiddenException $ex) {
            return response()->error(
                'Không có quyền.',
                [],
                Response::HTTP_FORBIDDEN
            );
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }

    public function destroy (int $id)
    {
        try {
            resolve(DeleteService::class)->handle($id);
            return response()->success('Xóa admin thành công');
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (ForbiddenException $exception) {
            return response()->error($exception->getMessage(), [], Response::HTTP_FORBIDDEN);
        } catch (Exception $exception) {
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
        } catch (ForbiddenException $exception) {
            return response()->error($exception->getMessage(), [], Response::HTTP_FORBIDDEN);
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
