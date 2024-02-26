<?php

namespace App\Console\Commands;

use App\Mail\SendMailToCustomerMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class SendMailToCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send-mail-to-customer';

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
            \Log::info('START: SEND MAIL TO CUSTOMER');
            $data = DB::table('customers')->get()->pluck('email')->toArray();
            if ($data) {
                Mail::to($data)->send(new SendMailToCustomerMail($data));
                \Log::info('SUCCESS: SEND MAIL TO CUSTOMER ===> Number sent: ' . count($data));
            }
            \Log::info('END: SEND MAIL TO CUSTOMER');
        } catch (\Exception $exception) {dd($exception->getMessage());
            \Log::error('Send mail to customers: =>>>' . $exception->getMessage());
        }
    }
}
