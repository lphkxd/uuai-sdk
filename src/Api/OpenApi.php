<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\BillingRequest;

class OpenApi extends BaseApi
{
    const API_USER_INFO = '/open/auth/user_info';
    const API_OPEN_AI = '/open/ai';


    public function action($model, $data)
    {
        $request = new BillingRequest();
        $request->setDecKeyNumber($data['dec_key_number'] ?? 0);
        $request->setUserId($data['user_id']);
        $request->setEngine($model);
        $request->setApi($data['api'] ?? '');
        $res = $this->request('post', self::API_OPEN_AI, $request->toArray());
        return $res;
    }

}