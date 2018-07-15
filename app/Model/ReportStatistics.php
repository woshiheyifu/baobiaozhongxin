<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ReportStatistics
 *
 * @property int $id
 * @property int $report_id 报表id
 * @property int $views 访问量
 * @property int $download 下载量
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportStatistics whereDownload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportStatistics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportStatistics whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportStatistics whereViews($value)
 * @mixin \Eloquent
 */
class ReportStatistics extends Model
{

    public $timestamps = false;

    public static function viewsIncrease($id)
    {
        self::where('report_id','=',$id)->increment('views');
    }
    public static function downloadIncrease($id)
    {
        self::where('report_id','=',$id)->increment('download');
    }
    public function report()
    {
        return $this->belongsTo('App\Model\Report');
    }
}
