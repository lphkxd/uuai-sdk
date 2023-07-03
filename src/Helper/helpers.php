<?php


//输出控制台日志
if (!function_exists('p')) {
    function p($val, $title = null, $starttime = '')
    {
        print_r('[ ' . date('Y-m-d H:i:s') . ']:');
        if ($title != null) {
            print_r('[' . $title . ']:');
        }
        print_r($val);
        print_r("\r\n");
    }
}

if (!function_exists('cache_has_set')) {
    function cache_has_set($cache = null, string $key = null, $callback = null, $tll = 3600)
    {
        if (!$cache){
           return call_user_func($callback);
        }
        $data = $cache->get($key);
        if ($data) {
            return $data;
        }
        $data = call_user_func($callback);
        if ($data === null) {
            p('设置空缓存防止穿透');
            $cache->set($key, false, 10);
        } else {
            $cache->set($key, $data, $tll);
        }
        return $data;
    }
}

if (!function_exists('convert_underline')) {
    function convert_underline($str)
    {
        $str = preg_replace_callback('/([-_]+([a-z]{1}))/i', function ($matches) {
            return strtoupper($matches[2]);
        }, $str);
        return $str;
    }
}

if (!function_exists('hump_to_line')) {

    /*
        * 驼峰转下划线
        */
    function hump_to_line($str)
    {
        $str = preg_replace_callback('/([A-Z]{1})/', function ($matches) {
            return '_' . strtolower($matches[0]);
        }, $str);
        return $str;
    }
}

if (!function_exists('convert_hump')) {

    function convert_hump(array $data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            if (is_array($item) || is_object($item)) {
                $result[hump_to_line($key)] = convert_hump((array)$item);
            } else {
                $result[hump_to_line($key)] = $item;
            }
        }
        return $result;
    }
}

if (!function_exists('get_millisecond')) {
    // 毫秒级时间戳
    function get_millisecond()
    {
        return round(microtime(true) * 1000);
    }
}



