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
    public function removeFile (string $oldPath = null, string $newFile = null)
    {
        if ($newFile && $oldPath && Storage::exists(getFileContainFolder() . '/' . $oldPath)) {
            Storage::delete(getFileContainFolder() . '/' . $oldPath);
        }
    }
}
