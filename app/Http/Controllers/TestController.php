<?php

namespace App\Http\Controllers;

use App\Services\HouseTradeVolumeEveryDayService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        app(HouseTradeVolumeEveryDayService::class)->newHouseTrade();
    }
}
