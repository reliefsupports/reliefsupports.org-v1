<?php
/**
 * User: malindar
 * Date: 3/8/14
 * Time: 12:43 AM
 * malindaprasad.com
 */

include_once 'lib/ResponseStatus.php';

function getHTTP($url, $param, $method, $httpuserpw, $header, $agent, $followLocation)
{

    if ($method == 'GET' && $param != null) {
        $url = $url . $param;
    }

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    if ($httpuserpw != null && $httpuserpw != '')
        curl_setopt($curl, CURLOPT_USERPWD, $httpuserpw);

    if (($method == 'POST' || $method == 'PUT') ) {
        if ($param == null || $param == '')
            $param = " ";
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
    }

    if ($header != null && count($header) > 0)
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    if ($followLocation)
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($curl, CURLOPT_USERAGENT, $agent);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($curl, CURLOPT_HEADER, 1);

    $response = curl_exec($curl);


    if (!curl_errno($curl)) {
        $resultStatus = curl_getinfo($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        $header = str_replace("\r\n", "\n", $header);
        $result['status'] = ResponseStatus::OK;
        $result['statusCode'] = $resultStatus['http_code'];
        $result['time'] = $resultStatus['total_time'];
        $result['header'] = explode('\n', $header);
        $result['body'] = $body;
    } else {
        $result['status'] = ResponseStatus::ERROR;
        $result['msg'] = curl_error($curl);
    }
    return $result;


}


