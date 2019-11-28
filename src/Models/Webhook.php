<?php

namespace Webshipper\Models;

use Webshipper\Utils\Model;

class Webhook extends Model
{
    protected $entity     = 'webhooks';
    protected $primaryKey = 'id';
    protected $type = 'webhooks';
}
