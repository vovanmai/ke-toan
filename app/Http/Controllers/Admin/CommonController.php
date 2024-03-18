<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
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

        $key = $request->get('key', '') . time();
        $resizeHeight = $request->get('resize_height');
        $resizeWidth = $request->get('resize_width');
//        $security = $request->get('security', false);


        try {
            $extension = $file->getClientOriginalExtension();
            $originName = $file->getClientOriginalName();
            $fileInfo = pathinfo($file->getClientOriginalName());

            $storeName = $key . '-' . Str::slug($fileInfo['filename']) . '.' . $fileInfo['extension'];

            $size = $file->getSize();

            $file->storeAs(getFileContainFolder(), $storeName);
            $originHeight = Image::make($file)->height();
            $originWidth = Image::make($file)->width();

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
                'origin_height' => $originHeight,
                'origin_width' => $originWidth,
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
