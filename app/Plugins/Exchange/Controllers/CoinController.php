<?php

/**
 * ============================================================================
 * MUCRM Ecosystem - Official Plugin
 * ============================================================================
 * @package    MUCRM\Plugins\Exchange
 * @author     MUCRM Team
 * @copyright  Todos os direitos reservados.
 * @link       https://mucrm.com.br/docs
 * * ============================================================================
 */
namespace MUCRM\Plugins\Exchange\Controllers;

use MUCRM\Engine\Support\Request;
use MUCRM\Http\Controllers\Controller;

class CoinController extends Controller
{
    protected string $layout = "components.layouts.app";

    public $configExchange;
    public $configCoins;

    public function __construct()
    {
       if (!config('user.exchange.active')) {
            request()->back('user.panel');
        }
        
        $this->configExchange = config('user.exchange');
        $this->configCoins = config('user.coins');
    }

    public function index()
    {
        $info = $this->configExchange;
        $configCoinDiscount = $this->configCoins[$this->configExchange['coin_discount']];
        $configCoinReceive = $this->configCoins[$this->configExchange['coin_receive']];

        return $this->view("Exchange.coin", compact('info', 'configCoinDiscount', 'configCoinReceive'));
    }

    public function trade(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ], [
            'quantity.required' => __lang('user.exchange.required_quantity'),
            'quantity.integer'  => __lang('user.exchange.integer_quantity'),
            'quantity.min'      => __lang('user.exchange.min_quantity')
        ]);

        $info = $this->configExchange;
        $configCoinDiscount = $this->configCoins[$info['coin_discount']];
        $configCoinReceive = $this->configCoins[$info['coin_receive']];

        if ($info['coin_discount'] === $info['coin_receive']) {
            return $request->message(__lang('user.exchange.invalid_config'), "error")->back();
        }

        $quantityToTrade = (int) $request->input('quantity'); 
        $totalDiscount = $info['quantity_remove'] * $quantityToTrade;
        $totalReceive = $info['quantity_receive'] * $quantityToTrade;

        $userDiscount = auth();
        if ($configCoinDiscount['table'] === "CashShopData") {
            $userDiscount = $userDiscount->cashShopData;
        }

        if ($userDiscount->{$configCoinDiscount['column']} < $totalDiscount) {
            $msgError = __lang('user.exchange.insufficient_balance', [
                'total_discount' => $totalDiscount,
                'coin_name' => $configCoinDiscount['name']
            ]);
            return $request->message($msgError, "error")->back();
        }

        $userReceive = auth();
        if ($configCoinReceive['table'] === "CashShopData") {
            $userReceive = $userReceive->cashShopData;
        }

        $userDiscount->{$configCoinDiscount['column']} -= $totalDiscount;
        $userDiscount->save();

        $userReceive->{$configCoinReceive['column']} += $totalReceive;
        $userReceive->save();

        $msgSuccess = __lang('user.exchange.trade_success', [
            'total_receive' => $totalReceive,
            'coin_name' => $configCoinReceive['name']
        ]);

        return $request->message($msgSuccess, "success")->back();
    }
}