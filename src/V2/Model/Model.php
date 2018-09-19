<?php

namespace Webshipper\V2\Model;


use Webshipper\V2\Util\Request;

class Model
{
    protected $name;
    protected $url;
    protected $requestUtil;

    public function __construct()
    {
        $this->requestUtil = new Request();
    }

    public function all()
    {
        return $this->requestUtil->get($this->url);
    }

    public function find($id)
    {
        return $this->requestUtil->get($this->url . '/' . $id);
    }

    public function delete($id)
    {
        return $this->requestUtil->delete($this->url . '/' . $id);
    }

    public function update($id, $data)
    {
        return $this->requestUtil->patch($this->url . '/' . $id, $data);
    }

    public function create($data)
    {
        return $this->requestUtil->post($this->url, $data);
    }

}