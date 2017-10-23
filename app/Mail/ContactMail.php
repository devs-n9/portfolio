<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Template;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
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
        
        $tmp = Template::find(1);
        $arr = ['{name}'=>$data['name'], '{id}' => $data['id'], '{product}' => $data['product']];

        $msg = $tmp->tmpls;
        foreach ($arr as $key => $value) {
            $msg = str_replace($key, $value, $msg);
        }
        return $this->subject("Contacts with our site")
            ->markdown('emails.tmpl', [
                'msg' => $msg,
                'user' => $this->data['name'],
                'email' => $this->data['email']
            ]);
    }
}
