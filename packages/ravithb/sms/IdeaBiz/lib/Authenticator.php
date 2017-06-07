<?php

/**
 * Created by PhpStorm.
 * User: Malinda
 * Date: 3/23/2015
 * Time: 10:45 PM
 */
include_once 'lib/Exceptions.php';
include_once 'lib/ResponseStatus.php';
include_once 'lib/RequestMethod.php';

class Authenticator
{
    var $data;
    var $config;
    var $basic;

    function renewToken()
    {

        $url = $this->config->auth_url . "token?grant_type=refresh_token&refresh_token=" . $this->config->auth_refreshToken . "&scope=".$this->config->auth_scope;

        $r = getHTTP($url, null, RequestMethod::POST, null,
            array("Content-Type: application/x-www-form-urlencoded",
                "Accept: application/json", "Authorization: Basic " . $this->basic), null, true);


        if ($r['status'] != ResponseStatus::OK)
            throw new  ConnectionException($r['msg']);

        if ($r['statusCode'] != 200)
            throw new  AuthenticationException("Wrong Access Token");
        $body = json_decode($r['body']);

        $this->data->expire = $body->expires_in;
        $this->data->accessToken = $body->access_token;
        $this->config->auth_refreshToken = $body->refresh_token;


        file_put_contents("lib/data.json", json_encode($this->data, JSON_PRETTY_PRINT));
        file_put_contents("config.json", json_encode($this->config, JSON_PRETTY_PRINT));

    }

    function  __construct()
    {
        include "curl.php";

        $this->data = json_decode(file_get_contents('lib/data.json'));
        $this->config = json_decode(file_get_contents('config.json'));

        $this->basic = base64_encode($this->config->auth_consumerKey . ":" . $this->config->auth_consumerSecret);
    }

    function getAccessToken()
    {
        return $this->data->accessToken;
    }

}