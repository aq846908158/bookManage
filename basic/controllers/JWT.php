<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/27 0027
 * Time: 11:19
 */

namespace app\controllers;

class JWT
{
    public static function rand_salt($length){

            // 密码字符集，可任意添加你需要的字符
            $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
                'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
                't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
                'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
                'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
                '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!',
                '@','#', '$', '%', '^', '&', '*', '(', ')', '-', '_',
                '[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',
                '.', ';', ':', '/', '?', '|');

            // 在 $chars 中随机取 $length 个数组元素键名
            $keys = array_rand($chars, $length);

            $password = '';
            for($i = 0; $i < $length; $i++) {
                // 将 $length 个数组元素连接成字符串
                $password .= $chars[$keys[$i]];
            }

            return $password;

    }

    public static function encode( $uid)
    {
        $alg = 'SHA256';
        $payload=[
            'iss' => "system", //签发者
            'iat' => $_SERVER['REQUEST_TIME'], //什么时候签发的
            'exp' => $_SERVER['REQUEST_TIME'] + 259200, //过期时间  3天
            'uid'=>$uid
        ];
        $key = md5("testKey");
        $jwt = base64_encode(json_encode(['typ' => 'JWT', 'alg' => $alg])) . '.' .base64_encode(json_encode($payload));
        return $jwt . '.' . self::signature($jwt, $key, $alg);
    }

    public static function signature( $input,  $key,  $alg)
    {
        return hash_hmac($alg, $input, $key);
    }



    public static function decode( $jwt)
    {
        $tokens = explode('.', $jwt);
        $key    = md5("testKey");

        if (count($tokens) != 3)
            return false;

        list($header64, $payload64, $sign) = $tokens;

        $header = json_decode(base64_decode($header64), JSON_OBJECT_AS_ARRAY);
        if (empty($header['alg']))
            return false;

        if (self::signature($header64 . '.' . $payload64, $key, $header['alg']) !== $sign)
            return false;

        $payload = json_decode(base64_decode($payload64), JSON_OBJECT_AS_ARRAY);

        $time = $_SERVER['REQUEST_TIME'];
        if (isset($payload['iat']) && $payload['iat'] > $time)
            return false;

        if (isset($payload['exp']) && $payload['exp'] < $time)
            return false;

        return $payload;
    }
}