<?php

namespace UUOA\OpenSdk\Api;

use UUOA\OpenSdk\Entity\Request\Message\CardBatchStatsRequest;
use UUOA\OpenSdk\Entity\Request\Message\CardPushRequest;
use UUOA\OpenSdk\Entity\Request\Message\CardRevokeRequest;
use UUOA\OpenSdk\Entity\Request\Message\CardSendRequest;
use UUOA\OpenSdk\Entity\Request\Message\CoolAppsListRequest;
use UUOA\OpenSdk\Entity\Request\Message\PushRequest;
use UUOA\OpenSdk\Entity\Request\Message\SendRequest;
use UUOA\OpenSdk\Entity\Response\ItemsHasPagesResponse;
use UUOA\OpenSdk\Entity\Response\Message\MessageResponse;

/**
 * ISV开放平台/消息中心/发送消息
 * ISV开放平台/消息中心/发送模板消息
 */
class MessageApi extends BaseApi
{
    // ISV开放平台/消息中心/发送消息  消息中心
    const API_MSG_COOL_APPS_LIST = '/open/apis/message/cool_apps/list'; //获取安装酷应用的群列表
    const API_MSG_SEND = '/open/apis/message/send'; //发送消息
    const API_MSG_PUSH = '/open/apis/message/push'; //发送推送消息
    // ISV开放平台/消息中心/发送模板消息 消息中心
    const API_MSG_CARD_SEND = '/open/apis/message/card/send'; //发送消息
    const API_MSG_CARD_PUSH = '/open/apis/message/card/push'; //发送推送消息
    const API_MSG_CARD_BATCH_STATS = '/open/apis/message/card/batch_stats'; //查询消息推送状态
    const API_MSG_CARD_REVOKE = '/open/apis/message/card/revoke'; //撤销消息


    public function coolAppsList(CoolAppsListRequest $requestParams): ItemsHasPagesResponse
    {
        $res = $this->request('get', self::API_MSG_COOL_APPS_LIST, $requestParams);
        return new ItemsHasPagesResponse($res);
    }

    public function send(SendRequest $requestParams): MessageResponse
    {
        $res = $this->request('post', self::API_MSG_SEND, $requestParams);
        return new MessageResponse($res);
    }

    public function push(PushRequest $requestParams): MessageResponse
    {
        $res = $this->request('post', self::API_MSG_PUSH, $requestParams);
        return new MessageResponse($res);
    }

    public function cardSend(CardSendRequest $requestParams): MessageResponse
    {
        $res = $this->request('post', self::API_MSG_CARD_SEND, $requestParams);
        return new MessageResponse($res);
    }

    public function cardPush(CardPushRequest $requestParams): MessageResponse
    {
        $res = $this->request('post', self::API_MSG_CARD_PUSH, $requestParams);
        return new MessageResponse($res);
    }

    public function cardBatchStats(CardBatchStatsRequest $requestParams): MessageResponse
    {
        $res = $this->request('post', self::API_MSG_CARD_BATCH_STATS, $requestParams);
        return new MessageResponse($res);
    }

    public function cardRevoke(CardRevokeRequest $requestParams): MessageResponse
    {
        $res = $this->request('put', self::API_MSG_CARD_REVOKE, $requestParams);
        return new MessageResponse($res);
    }

}