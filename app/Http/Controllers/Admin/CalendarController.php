<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\Event\ListService as ListEventService;
use App\Services\Admin\EventOption\ListService as ListEventOptionService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Exception;

class CalendarController extends BaseController
{
    public function index (Request $request)
    {
        try {
            $eventOptions = resolve(ListEventOptionService::class)->handle();
            $events = resolve(ListEventService::class)->handle();
            return view('admin.calendar.index', [
                'eventOptions' => $eventOptions,
                'events' => $events
            ]);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return redirect()->route('admin.error.error');
        }
    }
}
