<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.2020
 * Time: 0:19
 * uses composer require ixudra/curl
 */

namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class NovaPoshta
{
    const NOVA_POSHTA_URI = 'https://api.novaposhta.ua/v2.0/json/';
    private $data = [];


    private function setmodelName(string $model)
    {
        $this->data["modelName"] = $model;
        return $this;
    }

    private function setcalledMethod(string $method)
    {
        $this->data["calledMethod"] = $method;
        return $this;
    }

    private function setMethodProperties(array $properties)
    {
        $this->data["methodProperties"] = $properties;
        return $this;
    }

    private function setApiKey()
    {
        $this->data["apiKey"] = env('NOVA_POSHTA_KEY');

    }

    private function sendRequest()
    {
        $this->setApiKey();
        return Curl::to(self::NOVA_POSHTA_URI)->asJson(true)->withData([$this->data])->post();
    }

    public function getCities($firstChar = '')
    {
        return $this->setmodelName('Address')->setcalledMethod('getCities')->
        setMethodProperties(['FindByString' => $firstChar])->sendRequest();

    }

    public function getWareHouses()
    {

    }

}
