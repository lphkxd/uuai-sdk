<?php

namespace UUOA\OpenSdk\Api;

use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use UUOA\OpenSdk\Entity\Request\Pay\AdminTransferRequest;
use UUOA\OpenSdk\Entity\Request\Pay\ConfirmRequest;
use UUOA\OpenSdk\Entity\Request\Pay\DoConfirmRequest;
use UUOA\OpenSdk\Entity\Request\Pay\RefundRequest;
use UUOA\OpenSdk\Entity\Request\Pay\TradePayRequest;
use UUOA\OpenSdk\Entity\Request\Pay\TradeRequest;
use UUOA\OpenSdk\Entity\Request\Pay\TransferRequest;
use UUOA\OpenSdk\Entity\Request\Pay\WalletRequest;
use UUOA\OpenSdk\Entity\Response\ItemsResponse;
use UUOA\OpenSdk\Entity\Response\Pay\TradePayResponse;
use UUOA\OpenSdk\Entity\Response\Pay\TradeResponse;
use UUOA\OpenSdk\Entity\Response\Pay\WalletResponse;

/**
 * ISV开放平台/内网支付 内网员工U币支付
 */
class PayApi extends BaseApi
{
    const API_PAY_WALLET = '/open/apis/pay/wallet'; // 获取用户余额
    const API_PAY_TRADE = '/open/apis/pay/trade'; // 统一下单接口
    const API_PAY_TRADE_PAY = '/open/apis/pay/tradePay'; // 下单接口
    const API_PAY_CONFIRM = '/open/apis/pay/confirm'; // 确认订单
    const API_PAY_DO_CONFIRM = '/open/apis/pay/do_confirm'; // 确认支付
    const API_PAY_TRANSFER = '/open/apis/pay/transfer'; // 转账
    const API_PAY_ADMIN_TRANSFER = '/open/apis/pay/admin/transfer'; // 转账-管理员操作
    const API_PAY_REFUND = '/open/apis/pay/refund'; // 退款

    public function wallet(WalletRequest $requestParams): WalletResponse
    {
        $res = $this->request('get', self::API_PAY_WALLET, $requestParams);
        return new WalletResponse($res);
    }

    public function trade(TradeRequest $requestParams): TradeResponse
    {
        $res = $this->request('post', self::API_PAY_TRADE, $requestParams);
        return new TradeResponse($res);
    }

    public function tradePay(TradePayRequest $requestParams): TradePayResponse
    {
        $res = $this->request('post', self::API_PAY_TRADE_PAY, $requestParams);
        return new TradePayResponse($res);
    }

    public function confirm(ConfirmRequest $requestParams): ResponseInterface
    {
        return $this->request('get', self::API_PAY_CONFIRM, $requestParams);
    }

    public function doConfirm(DoConfirmRequest $requestParams): ItemsResponse
    {
        $res = $this->request('post', self::API_PAY_DO_CONFIRM, $requestParams);
        return new ItemsResponse($res);
    }

    public function transfer(TransferRequest $requestParams): ItemsResponse
    {
        $res = $this->request('post', self::API_PAY_TRANSFER, $requestParams);
        return new ItemsResponse($res);
    }

    public function adminTransfer(AdminTransferRequest $requestParams): ItemsResponse
    {
        $res = $this->request('post', self::API_PAY_ADMIN_TRANSFER, $requestParams);
        return new ItemsResponse($res);
    }

    public function refund(RefundRequest $requestParams): ItemsResponse
    {
        $res = $this->request('post', self::API_PAY_REFUND, $requestParams);
        return new ItemsResponse($res);
    }
}