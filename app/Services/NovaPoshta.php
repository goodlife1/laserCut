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


    private function setModelName(string $model)
    {
        $this->data["modelName"] = $model;
        return $this;
    }

    private function setCalledMethod(string $method)
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

    private function get()
    {
        $this->setApiKey();
        return Curl::to(self::NOVA_POSHTA_URI)->asJson(true)->withData([$this->data])->post();
    }

    private function tryGetCities(string $name)
    {
        $response = $this->setModelName('Address')->setCalledMethod('getCities')->
        setMethodProperties(['FindByString' => $name])->get();
        return $this->verifyResponse(array_shift($response));
    }

    private function tryGetWarehouses(string $cityRef)
    {
        $response = $this->setModelName('Address')->setCalledMethod('getWarehouses')
            ->setMethodProperties(['CityRef'=>$cityRef])->get();

        return $this->verifyResponse(array_shift($response));
    }

    public function verifyResponse(array $response)
    {
        if (!$response['success']) {
            throw new \Exception(implode($response['errors'], '<br>'));
        }
        return $response['data'];
    }

    public function getCities(string $name = '')
    {
        $response = $this->tryGetCities($name);
        return $response;
    }

    public function getWareHouses(string $cityRef)
    {
        $response = $this->tryGetWarehouses($cityRef);
        return $response;
    }

}
