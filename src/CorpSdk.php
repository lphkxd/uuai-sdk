<?php

namespace UUAI\Sdk;

use UUAI\Sdk\Library\CorpApiClient;

class CorpSdk
{

    protected $corpApiClient;

    public function __construct($corp_code, $secret, $client_id = '')
    {
        $this->corpApiClient = new CorpApiClient($corp_code, $secret);
        if (!empty($client_id)){
            $this->corpApiClient->setClientId($client_id);
        }
    }


}