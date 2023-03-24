<?php

namespace UUOA\OpenSdk\Entity\Request;


abstract class BaseRequest
{
    public function __construct($array = [])
    {
        foreach ($array as $item => $value) {
            $method = 'set' . convert_underline($item);
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $value);
            }
        }
    }

    public function __toString()
    {
        return json_encode($this->toArray(), 256);
    }

    public function toArray(): array
    {
        $data = [];
        foreach ($this as $key => $item) {
            $method = 'get' . convert_underline($key);
            if (method_exists($this, $method)) {
                $res = call_user_func([$this, $method]);
                $data[hump_to_line($key)] = $res;
            }
            $method = 'is' . convert_underline($key);
            if (method_exists($this, $method)) {
                $res = call_user_func([$this, $method]);
                $data[hump_to_line($key)] = $res;
            }
        }
        return array_filter($data, function ($val) {
            if ($val === '' || $val === null) {
                return false;
            }
            return true;
        });
    }
}