<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRequestUserReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    private $data;

    /**
     * Create a new message instance.
     *
     * @param array $emails Emails
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $env = config('app.env');

        return $this->subject("[{$env}] Access user report at " . now()->format('Y-m-d H:i:s'))
            ->with([
                'data' => $this->data
            ])
            ->view('admin.mail.request-user-report');
    }
}
