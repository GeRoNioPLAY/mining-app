<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlgorithmController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\MiningDeviceController;
use App\Http\Controllers\CryptocurrencyListController;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\MiningController;

Route::get('/', function () {
    return view('pages.index');
});

Route::resource('algorithms', AlgorithmController::class);
Route::resource('exchanges', ExchangeController::class);
Route::resource('mining_devices', MiningDeviceController::class);
Route::resource('cryptocurrency_lists', CryptocurrencyListController::class);
Route::resource('cryptocurrencies', CryptocurrencyController::class);
Route::resource('minings', MiningController::class);
