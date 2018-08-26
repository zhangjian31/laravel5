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
            ['name' => 'name24', 'age' => 24]
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

    public function query4()
    {
        /**
         * 查询所有数据
         */
//        $result = DB::table('student')->get();

        /**
         * 查询第一条数据
         */
//        $result = DB::table('student')
//            ->orderby('age','desc')
//            ->where('age','<',24)
//            ->first();

        /**
         * 多条件查询
         */
//        $result = DB::table('student')
//            ->orderby('age','desc')
//            ->whereRaw('id < ? and age > ?',[13,18])
//            ->first();

        /**
         * 返回指定字段的数组
         */
//        $result = DB::table('student')
//            ->pluck('name');

        /**
         * 查询指定字段并返回id为键值的数组
         */
//        $result = DB::table('student')
//            ->lists('name','id');

//        $result = DB::table('student')
//            ->select('name','age')
//            ->get('name','id');
//        dd($result);

        /**
         * 分页查询，return false为结束条件
         */
        echo '<pre>';
        DB::table('student')->chunk(1, function ($student) {

            static $page = 1;
            echo "<H1>page=".$page."</H1><br>";
            var_dump($student);
            if ($page == 3) {
                return false;
            } else {
                $page++;
            }
        });
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