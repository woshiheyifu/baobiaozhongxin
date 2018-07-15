<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ReportCategory
 *
 * @property int $id
 * @property string $name 分类名称
 * @property string|null $note 备注
 * @property int $parent_id 父级id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportCategory whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ReportCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Report[] $reports
 */
class ReportCategory extends Model
{
    //
    public function reports(){
        return $this->hasMany('App\model\Report','category_id');
    }
}
