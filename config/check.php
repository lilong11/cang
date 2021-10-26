<?php
//网易易盾短信类
/**
 * 计算参数签名
 * $params 请求参数
 * $secretKey secretKey
 */
function gen_signature($secretKey, $params)
{
    ksort($params);
    $buff = "";
    foreach ($params as $key => $value) {
        if ($value !== null) {
            $buff .= $key;
            $buff .= $value;
        }
    }
    $buff .= $secretKey;
    return md5($buff);
}

/**
 * 将输入数据的编码统一转换成utf8
 * @params 输入的参数
 */
function toUtf8($params)
{
    $utf8s = array();
    foreach ($params as $key => $value) {
        $utf8s[$key] = is_string($value) ? mb_convert_encoding($value, "utf8", INTERNAL_STRING_CHARSET) : $value;
    }
    return $utf8s;
}


/**
 * 易盾短信发送在线检测请求接口简单封装
 * $params 请求参数
 */
function check($params)
{
    $params["secretId"] = SECRETID;
    $params["businessId"] = BUSINESSID;
    $params["version"] = VERSION;

    $params["timestamp"] = sprintf("%d", round(microtime(true) * 1000));// time in milliseconds
    $params["nonce"] = sprintf("%d", rand()); // random int
    $params = toUtf8($params);
    $params["signature"] = gen_signature(SECRETKEY, $params);
// var_dump($params);
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'timeout' => API_TIMEOUT, // read timeout in seconds
            'content' => http_build_query($params),
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents(API_URL, false, $context);
    if ($result === FALSE) {
        return array("code" => 500, "msg" => "file_get_contents failed.");
    } else {
        return json_decode($result, true);
    }
}