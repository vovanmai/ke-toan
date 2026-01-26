<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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


        try {
            $extension = $file->getClientOriginalExtension();
            $originName = $file->getClientOriginalName();
            $fileInfo = pathinfo($file->getClientOriginalName());

            $storeName = $key . '-' . Str::slug($fileInfo['filename']) . '.' . $fileInfo['extension'];

            $size = $file->getSize();

            if ($extension !== 'svg') {
                $originHeight = Image::make($file)->height();
                $originWidth = Image::make($file)->width();

                if ($resizeHeight || $resizeWidth) {
                    $image = Image::make($file);
                    #$image->resize($resizeWidth, $resizeHeight);
                    // $image->resize($resizeWidth, $resizeHeight, function ($constraint) {
                    //     $constraint->aspectRatio();
                    //     $constraint->upsize();
                    // });
                    $image->fit(450, 300);
                    $image->save(storage_path('/app/' . getFileContainFolder() . '/' . $storeName));
                } else {
                    $file->storeAs(getFileContainFolder(), $storeName);
                }
            } else {
                $file->storeAs(getFileContainFolder(), $storeName);
            }


            return response()->success('Thành công', [
                'store_name' => $storeName,
                'name' => $originName,
                'size' => $size,
                'extension' => $extension,
                'origin_height' => $originHeight ?? null,
                'origin_width' => $originWidth ?? null,
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }

    public function uploadFromCkeditor (Request $request)
    {
        $file = $request->file('upload');


        try {
            $fileInfo = pathinfo($file->getClientOriginalName());

            $storeName = time() . '-' . Str::slug($fileInfo['filename']) . '.' . $fileInfo['extension'];

            $file->storeAs(getFileContainFolder(), $storeName);

            return response()->success('Thành công', [
                'default' => '/' . config('filesystems.file_get_folder') . '/' . $storeName,
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
            return response()->success('Thành công');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }

    public function uploadFileIntoCkeditor (Request $request)
    {
        $file = $request->file('file');


        try {
            $fileInfo = pathinfo($file->getClientOriginalName());

            $storeName = time() . '-' . Str::slug($fileInfo['filename']) . '.' . $fileInfo['extension'];

            $file->storeAs(getFileContainFolder(), $storeName);

            return response()->success('Thành công', [
                'url' => URL::to('/' . config('filesystems.file_get_folder') . '/' . $storeName),
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return response()->error('Có lỗi khi truy cập đến máy chủ.');
        }
    }
}
