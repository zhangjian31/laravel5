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

}