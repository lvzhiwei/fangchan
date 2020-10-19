<?php


namespace App\Services;


use GuzzleHttp\Client;

abstract class BaseService
{
    public function getData($url='')
    {
        $data_from = env('FC_DATA_FROM'); //数据来源
        $request_url = $data_from . $url;

        $client = new Client();
        $res = $client->get($request_url);
        $data = $res->getBody()->getContents();

        $data = json_decode($data);
        $data = $data->data;
        return $data;
    }
}
