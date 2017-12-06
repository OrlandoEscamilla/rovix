<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    public $recipient;
    public $sender;
    public $attachments;
    public $subject;
    public $content;
    public $template;
}
