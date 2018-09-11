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

    /*
     * Webshipper api v1 doesn't support returning orders
     * It only supports getting orders by id or certain filters but not
     * return orders on it's own
     */
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
        return $this->requestUtil->post($this->modelUrl . '/new', $data);
    }

}