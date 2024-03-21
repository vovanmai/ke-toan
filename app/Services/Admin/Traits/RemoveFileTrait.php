<?php

namespace App\Services\Admin\Traits;

use Illuminate\Support\Facades\Storage;

trait RemoveFileTrait
{

    /**
     * Remove file
     *
     * @return array
     */
    public function removeFile (string $pathName = null)
    {
        if ($pathName && Storage::exists(getFileContainFolder() . '/' . $pathName)) {
            Storage::delete(getFileContainFolder() . '/' . $pathName);
        }
    }
}
