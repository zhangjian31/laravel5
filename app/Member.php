<?php
/**
 * Created by PhpStorm.
 * User: zhangjian
 * Date: 2018/8/25
 * Time: 下午9:43
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function getMember()
    {
        return 'member is xiaoming';
    }
}