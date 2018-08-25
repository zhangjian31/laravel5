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

    /**
     * 查询构造器 插入数据
     */
    public function query1()
    {
//        $result = DB::table('student')->insert([
//            'name'=>'name1',
//            'age'=>11
//        ]);
//        dd($result);

        $result = DB::table('student')->insert([
            ['name' => 'name20', 'age' => 20],
            ['name' => 'name21', 'age' => 21],
            ['name' => 'name22', 'age' => 22],
            ['name' => 'name23', 'age' => 23],
            ['name' => 'name24', 'age' => 24],
        ]);
        dd($result);

//        $result = DB::table('student')->insertGetId([
//            'name'=>'name2',
//            'age'=>22
//        ]);
//        dd($result);
    }
    /**
     * 查询构造器 更新数据
     */
    public function query2()
    {
//        $result = DB::table('student')
//            ->where('name', 'xiaogang')
//            ->update(
//                ['age' => 3]
//            );
//        dd($result);

//        $result = DB::table('student')->increment('age');
//        dd($result);

//        $result = DB::table('student')->increment('age', 3);
//        dd($result);

//        $result = DB::table('student')->decrement('age');
//        dd($result);

//        $result = DB::table('student')
//            ->where('name','xiaogang')
//            ->increment('age',3);
//        dd($result);

        $result = DB::table('student')
            ->where('name', 'gangxiao')
            ->increment('age', 3, ['name' => 'xiaogang']);
        dd($result);
    }

    /**
     * 查询构造器 删除数据
     */
    public function query3()
    {
//        $result = DB::table('student')
//            ->where('name', 'name23')
//            ->delete();
//        var_dump($result);

//        $result = DB::table('student')
//            ->where('age', '>=', 26)
//            ->delete();
//        var_dump($result);

        /**
         * 整表删除
         */
        $result = DB::table('student')->truncate();
        var_dump($result);
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