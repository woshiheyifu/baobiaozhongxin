<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Report
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title 标题
 * @property string|null $description 描述
 * @property string $file_url 文件路径
 * @property string $img_url 图片路径
 * @property string $thumbnail_url 缩略图路径
 * @property int $category_id 类型id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Report whereUpdatedAt($value)
 * @property-read \App\Model\ReportCategory $reportCategory
 */
class Report extends Model
{
    public function reportCategory()
    {
        return $this->belongsTo('App\Model\ReportCategory','category_id');
    }
    public function setImgUrlAttribute($img_url)
    {
        if (is_array($img_url)){
            $this->attributes['img_url'] = json_encode(($img_url));
        }
    }

    public function getImgUrlAttribute($img_url)
    {
        return json_decode($img_url);
    }
    public function reportStatistics()
    {
        return $this->hasOne('App\Model\ReportStatistics');
    }
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::created(function ($model){
            $data  = new ReportStatistics;
            $data->report_id = $model->id;
            $data->timestamps = false;
            $data->save();
        });
    }

    public static function downloadReport($id)
    {
        $file_url = self::find($id);
        $file_url = $file_url->file_url;
        $file_name = explode('/',$file_url);
        $file_name = end($file_name);
//        dd($file_name);
//        $header = ["Content-Disposition: attachment;filename=".$file_name];
//        $header = [
//            'Access-Control-Allow-Origin,*',
//            'Access-Control-Allow-Methods,POST, GET, OPTIONS, PUT, DELETE',
//            'Access-Control-Allow-Headers ,Content-Type, Accept, Authorization, X-Requested-With, Application',
//        ];
        $file_url = str_replace('/','\\',$file_url);
//        dd(public_path().'\\upload\\'.$file_url);

$file_path = public_path().'\\upload\\'.$file_url;


       //return $file_path;

        //return Response::download($file, 'filename.pdf',);

        return \Response::download(public_path().'\\upload\\'.$file_url);

    }
}
