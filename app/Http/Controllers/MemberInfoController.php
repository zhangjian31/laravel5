<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

/**
 * Created by PhpStorm.
 * User: zhangjian
 * Date: 2018/8/25
 * Time: 下午4:53
 */
class  MemberInfoController extends Controller{

    public function info(){
        return 'member-info';
    }
    public function info2(){
        return route('memberinfo');
    }

    public function info3($id){
        return 'member-info->'.$id;
    }
}