<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: zhangjian
 * Date: 2018/8/25
 * Time: 下午9:54
 */
class  StudentController extends Controller
{
    public function test1()
    {

        /**
         *  插入数据
         */
//        $result = DB::insert('insert into student(name,age) values (?,?)', ['xiaoming', 20]);
//        var_dump($result);
//        $result = DB::insert('insert into student(name,age) values (?,?)', ['xiaogang', 21]);
//        var_dump($result);
        /**
         *  更新数据
         */
//        $result = DB::update('update student set age = ? where name = ?', [30, 'xiaoming']);
//        var_dump($result);

        /**
         *  查询数据
         */
//        $students = DB::select('select * from student');
//        $students = DB::select('select * from student where age > ? ',[25]);
//        dd($students);

        /**
         * 删除数据
         */
        $result = DB::delete('delete  from student where age > ? ', [25]);
        var_dump($result);

        $students = DB::select('select * from student');
        dd($students);
    }
}
/*
 CREATE TABLE IF NOT EXISTS `student`(
    `id` INT  PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL DEFAULT  '' ,
    `age` TINYINT UNSIGNED NOT NULL DEFAULT 0  ,
    `sex` TINYINT UNSIGNED NOT NULL DEFAULT 10 ,
    `create_at` INT NOT NULL DEFAULT 0  ,
    `update_at` INT NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1001 ;
 */