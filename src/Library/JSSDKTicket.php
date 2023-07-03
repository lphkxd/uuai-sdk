<?php


namespace UUAI\Sdk\Library;


class JSSDKTicket
{
    /**
     * Sign the params.
     *
     * @param string $ticket
     * @param string $nonce
     * @param int    $timestamp
     * @param string $url
     *
     * @return string
     */
    public static function getTicketSignature($ticket, $nonce, $timestamp, $url, $user = [], $jsApiList = []): string
    {
        if (is_array($jsApiList)) {
            $jsApiList = json_encode($jsApiList, 256);
        }
        if (is_array($user)) {
            $user = json_encode($user, 256);
        }
        return sha1(sprintf('jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s&user=%s&jsApiList=%s', $ticket, $nonce, $timestamp, $url, $user, $jsApiList));
    }

    /**
     * Generate a "random" alpha-numeric string.
     * Should not be considered sufficient for cryptography, etc.
     *
     * @param int $length
     *
     * @return string
     */
    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }


    public static function getConfig($appId, $url, $js_ticket, $version = 'dev', $user = [], $name = '')
    {
        $nonce = self::quickRandom(10);
        $timestamp = get_millisecond();
        return [
            'appid' => $appId,
            'nonceStr' => $nonce,
            'timeStamp' => $timestamp,
            'url' => $url,
            'signature' => self::getTicketSignature($js_ticket, $nonce, $timestamp, $url, $user),
            'version' => $version,
            'appName' => $name,
        ];
    }
}