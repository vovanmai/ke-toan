<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\Admin\CreateService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CommonController extends BaseController
{
    public function uploadFile (Request $request)
    {
        $file = $request->file('file');

//        $key = $request->get('key', '');
        $resizeHeight = $request->get('resize_height');
        $resizeWidth = $request->get('resize_width');
//        $security = $request->get('security', false);


        try {
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();

            $storeName = sprintf(
                "%s.%s",
                Str::slug($name),
                $extension
            );
            $originName = $file->getClientOriginalName();
            $size = $file->getSize();

            $file->storeAs(getFileContainFolder(), $storeName);

            if ($resizeHeight || $resizeWidth) {
                $image = Image::make(storage_path('/app/' . getFileContainFolder() . '/' . $storeName));
                $image->resize($resizeWidth, $resizeHeight);
                $image->save(storage_path('/app/' . getFileContainFolder() . '/' . $storeName));
            }

            return response()->success('Thành công', [
                'store_name' => $storeName,
                'origin_name' => $originName,
                'size' => $size,
                'extension' => $extension,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }

    public function deleteFile (Request $request)
    {
        $storeName = $request->get('store_name');

        try {
            Storage::delete(getFileContainFolder() . '/' . $storeName);
            return response()->success('Thành công', [
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }
}
