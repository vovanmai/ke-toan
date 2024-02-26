<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToCustomerMail extends Mailable
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

        $title = '🗓👉👉👉 📣📣 Hi. Chúc bạn một ngày tốt lành. Giá vé Rừng Dừa Bảy Mẫu Hội An - https://rungduabaymauhoian.com';

        return $this->subject($title)
            ->view('admin.mail.send-mail-to-customer');
    }
}
