<?php
/**
 * Created by PhpStorm.
 * User: zhangjian
 * Date: 2018/8/26
 * Time: 下午3:13
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';

    /**
     * false 关闭created_at、updated_at的赋值，否则值为2018
     */
    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }

    /**
     * @var 指定允许批量赋值的字段
     */
    protected $fillable=['name','age'];
    /**
     * @var 指定不允许批量赋值的字段
     */
    protected $guarded;

}