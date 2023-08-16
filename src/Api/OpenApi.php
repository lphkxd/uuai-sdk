<?php

namespace UUAI\Sdk\Api;

use UUAI\Sdk\Entity\ActionRequest;

class OpenApi extends BaseApi
{
    const API_USER_INFO = '/open/auth/user_info';
    const API_OPEN_AI = '/open/ai';


    public function action($model, $data)
    {
        $request = new ActionRequest($data);
        $request->setDecKeyNumber($data['dec_key_number'] ?? 0);
        $request->setUserId($data['user_id'] ?? 0);
        $request->setPrompt($data['prompt'] ?? '');
        $request->setOptions($data['options'] ?? '');
        $request->setEngine($model);
        $request->setApi($data['api'] ?? '');
        return $this->request('post', self::API_OPEN_AI, $request->toArray());
    }

}