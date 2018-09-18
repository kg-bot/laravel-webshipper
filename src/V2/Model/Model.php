<?php

namespace Webshipper\V2\Model;


use Webshipper\V2\Util\Request;

class Model
{
    protected $modelName;
    protected $modelUrl;
    protected $requestUtil;

    public function __construct($name, $url)
    {
        $this->modelName = $name;
        $this->modelUrl = $url;
        $this->requestUtil = new Request('sample-company', 'dadodju@gmail.com', 'slobomirp7008');
    }

    public function all()
    {
        return $this->requestUtil->get($this->modelUrl);
    }

    public function find($id)
    {
        return $this->requestUtil->get($this->modelUrl . '/' . $id);
    }

    public function delete($id)
    {
        return $this->requestUtil->delete($this->modelUrl . '/' . $id);
    }

    public function update($id, $data)
    {
        return $this->requestUtil->patch($this->modelUrl . '/' . $id, $data);
    }

    public function create($data)
    {
        return $this->requestUtil->post($this->modelUrl, $data);
    }

}