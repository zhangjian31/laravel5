<?php

namespace App\Http\Controllers;

use App\Student;
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
            echo "<H1>page=" . $page . "</H1><br>";
            var_dump($student);
            if ($page == 3) {
                return false;
            } else {
                $page++;
            }
        });
    }

    public function query5()
    {
        $result = DB::table('student')->count();
        echo 'count=';
        var_dump($result);
        echo "<br>";

        $result = DB::table('student')->max('age');
        echo 'max=';
        var_dump($result);
        echo "<br>";

        $result = DB::table('student')->min('age');
        echo 'min=';
        var_dump($result);
        echo "<br>";

        $result = DB::table('student')->avg('age');
        echo 'avg=';
        var_dump($result);
        echo "<br>";

        $result = DB::table('student')->sum('age');
        echo 'sum=';
        var_dump($result);
        echo "<br>";
    }

    public function orm1()
    {
//        $result = Student::all();
//        $result = Student::find(11);//主键
//        $result = Student::findOrFail(110);//根据主键查找，找不到报错

//        $result = Student::get();

//        $result = Student::where('age','>',20)
//            ->orderBy('id','asc')
//            ->get();
//        dump($result);

//        Student::chunk(2,function ($student){
//            dump($student);
//        });


        $result = Student::count();
        echo 'count=';
        var_dump($result);
        echo "<br>";

        $result = Student::max('age');
        echo 'max=';
        var_dump($result);
        echo "<br>";

        $result = Student::where('age', '>', 23)->min('age');
        echo 'min=';
        var_dump($result);
        echo "<br>";

        $result = Student::avg('age');
        echo 'avg=';
        var_dump($result);
        echo "<br>";

        $result = Student::sum('age');
        echo 'sum=';
        var_dump($result);
        echo "<br>";
    }

    public function orm2()
    {
        /**
         * 使用模型新增数据
         */
//        $student = new Student();
//        $student->name = 'zhangsan3';
//        $student->age = 23;
//        $bool = $student->save();
//        dump($bool);

//       $student= Student::find(19);
//       echo $student->created_at;
//        echo date('Y-m-d H:i:s',$student->created_at);

//        $student=  Student::create([
//            'name'=>'xiaowang',
//            'age'=>20
//        ]);
//        dump($student);
        /**
         * 查找，找不到创建一个并保存
         */
//        $student=  Student::firstOrCreate([
//            'name'=>'zhangsan'
//        ]);
//        dump($student);

        /**
         * 查找，找不到创建一个，不保存
         */
        $student = Student::firstOrNew([
            'name' => 'zhangsanfsdfsdfs'
        ]);
        $student->save();
        dump($student);
    }

    public function orm3()
    {
        /**
         * 通过模型更新数据
         */
//        $student = Student::find(23);
//        dump($student);
//        $student->name = 'abc';
//        $bool = $student->save();
//        dump($bool);

        /**
         * 结合查询语句批量更新
         */

       $result= Student::where('id','>',20)
            ->update([
                'age'=>11
            ]);
       dump($result);

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