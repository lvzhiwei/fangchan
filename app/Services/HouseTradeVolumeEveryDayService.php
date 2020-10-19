<?php


namespace App\Services;


use App\Models\TradeEveryDay;
use Carbon\Carbon;

/**
 * 房产每日成交量
 * Class HouseTradeVolumeEveryDayService
 * @package App\Services
 */
class HouseTradeVolumeEveryDayService extends BaseService
{
    public function __construct()
    {
        $this->newHouseTrade();
    }

    // 新房成交量
    public function newHouseTrade()
    {
        $url = '/api/estate/newHouseTranData';
        $data = $this->getData($url);

        // 写入表everyday表中
        $insertArr = [];
        foreach ($data as $k=>$v)
        {
            $insertArr[] = [
                'type' => 0, //新房
                'district' => $v['district'],
                'number' => $v['number'], //所有
                'total_area' => $v['total_area'], //所有
                'day' => Carbon::yesterday(), //所有
            ];
        }

        TradeEveryDay::insert($insertArr);
    }

    // 存量房成交量
    public function oldHouseTrade()
    {
        $url = '/api/estate/newHouseTranData';
        $data = $this->getData($url);

        // 写入表everyday表中
        $insertArr = [];
        foreach ($data as $k=>$v)
        {
            $insertArr[] = [
                'type' => 1, //存量住房
                'district' => $v['district'],
                'number' => $v['number'], //所有
                'total_area' => $v['total_area'], //所有
                'day' => Carbon::yesterday(), //所有
            ];
        }

        TradeEveryDay::insert($insertArr);
    }
}
