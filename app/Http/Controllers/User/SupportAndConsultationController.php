<?php

namespace App\Http\Controllers\User;

use App\Data\Exceptions\ForbiddenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SupportAndConsultation\CreateRequest;
use App\Services\User\SupportAndConsultation\CreateService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class SupportAndConsultationController extends Controller
{
    public function store (CreateRequest $request)
    {
        $data = $request->validated();
        try {
            $data = resolve(CreateService::class)->handle($data);
            return response()->success('Tạo thành công', $data);
        } catch (ModelNotFoundException $exception) {
            return response()->notFound();
        } catch (ForbiddenException $exception) {
            return response()->error($exception->getMessage(), [], Response::HTTP_FORBIDDEN);
        } catch (Exception $exception) {
            return response()->error('Máy chủ bị lỗi', $exception);
        }
    }
}
