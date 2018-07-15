<?php

namespace App\Http\Controllers;

use App\Model\Report;
use App\Model\ReportCategory;
use App\Model\ReportStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    protected $data=[];

    public function index(){
        $this->data['reports'] = Report::with('reportStatistics')->get();
        return view('index.index',$this->data);
    }
    public function detail(Request $request)
    {
        $id = $request->input('id');
        ReportStatistics::viewsIncrease($id);
        $this->data['report'] = Report::find($id);
        return view('index.detail',$this->data);
    }
    public function downloadReport(Request $request)
    {
        $id = $request->input('id');
        $file_url = Report::find($id);
        ReportStatistics::downloadIncrease($id);
        $file_url = $file_url->file_url;
        $file_path = public_path().'/upload/'.$file_url;
        return \Response::download($file_path);
    }
    public function test(){
        $res = ReportCategory::find(101);

        dd($res->id);
        dd($res->reportCategory->name);
        $array = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
        $string = implode(',',$array);
        $res = array();
        $stime=microtime(true);

//        $res = DB::select("select * from reports where id in ($string)");

        foreach ($array as $k=>$v){
            $res[$k] = DB::selectOne("select * from reports where id=$v");
        }
        $etime=microtime(true);//获取程序执行结束的时间
        $time=$etime-$stime;  //计算差值
        dd($res,$time);
    }
}
