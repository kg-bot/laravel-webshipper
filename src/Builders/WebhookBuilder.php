<?php
namespace Webshipper\Builders;

use Webshipper\Models\Webhook;

class WebhookBuilder extends Builder
{
    protected $entity = 'webhooks';
    protected $model  = Webhook::class;
    protected $type = 'webhooks';
}