<?php

namespace App\Services\User\User2\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;
use Illuminate\Support\Facades\Storage;

class DownloadService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ($id)
    {
        if (!auth()->check()) {
            session()->flash('info_message', 'Vui lòng đăng nhập để tải xuống.');
            return redirect()->route('user.login');
        }
        $item = $this->repository->firstOrFailWhere([
            'id' => $id,
            'active' => true,
        ]);

        $file = Storage::getDriver()->getAdapter()->getPathPrefix() . $item['file']['store_url'];

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Connection: close");

        $filename = $item->slug . '.' . $item['file']['extension'];

        $item->total_download++;
        $item->save();

        return response()->download($file, $filename);
    }
}
