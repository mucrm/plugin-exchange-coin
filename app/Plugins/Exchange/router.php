<?php

use MUCRM\Engine\Support\Facades\Router;
use MUCRM\Http\Middlewares\UserAuth;
use MUCRM\Plugins\Exchange\Controllers\CoinController;

Router::group(['prefix' => 'user', 'middleware' => [UserAuth::class]], function () {
    Router::get("/exchange-coin", [CoinController::class, 'index'])->name('plugins.coin.index');
    Router::post("/exchange-trade", [CoinController::class, 'trade'])->name('plugins.coin.trade');
});