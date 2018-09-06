<?php

namespace Webshipper\Model;

use Webshipper\Util\Request;

class Model
{
    protected $modelName;
    protected $modelUrl;
    protected $requestUtil;

    public function __construct($name = '', $url = '')
    {
        $this->modelName = $name;
        $this->modelUrl = $url;
        $this->requestUtil = new Request();
    }

    public function all()
    {
        return $this->requestUtil->get($this->modelUrl);
    }

    public function find($id)
    {
        return $this->requestUtil->get($this->modelUrl . '/' . $id);
    }

}