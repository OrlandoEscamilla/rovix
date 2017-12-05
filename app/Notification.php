<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /** @var app_id */
    public $app_id;

    /** @var $headings : Titulo del mensaje | Obligatorio */
    public $headings;

    /** @var $contents : Cuerpo del mensaje | Obligatorio */
    public $contents;

    /** @var $included_segments : Segmentos de la app que recibirán el mensaje | Opcional */
    public $included_segments;

    /** @var $include_player_ids : Usuarios especificos que recibirán el mensaje | Opcional */
    public $include_player_ids;
}
