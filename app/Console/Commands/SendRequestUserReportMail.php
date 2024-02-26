<?php

namespace App\Console\Commands;

use App\Models\RequestLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRequestUserReportMail as SendMailReport;

class SendRequestUserReportMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:requested-user-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            Log::info('[START][Report Request User]');
            $report = RequestLog::whereDate('requested_at', now())->groupBy('path')
                ->select([
                    'path',
                    \DB::raw('count(id) as number')
                ])
                ->orderBy('number', 'DESC')
                ->get()
                ->toArray();

            $requestLogs = RequestLog::whereDate('requested_at', now())->orderBy('requested_at', 'DESC')->get();

            Mail::to('vovanmai.dt3@gmail.com')->send(new SendMailReport([
                'report' => $report,
                'requestLogs' => $requestLogs,
            ]));
            Log::info('[END][Report Request User]');
        } catch (\Exception $exception) {
            \Log::error('Requested-user-report =>>>' . $exception->getMessage());
        }
    }
}
