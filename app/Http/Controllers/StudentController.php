<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        $result = Student::where('id', '>', 20)
            ->update([
                'age' => 11
            ]);
        dump($result);

    }

    public function orm4()
    {
        /**
         * 通过模型删除
         */
//        $result = Student::find(12);
//        $result->delete();
//        dump($result);

        /**
         * 通过主键删除
         */
//        $result = Student::destroy(13);
//        $result = Student::destroy([14,15]);

//        $result = Student::destroy(14,15);
//        dump($result);

        /**
         * 添加删除
         */
        $result = Student::where('age', '>', 20)->delete();
        dump($result);
    }

    public function section1()
    {
        $students = Student::get();
        $students = [];
//        return view('student/section1');
        $name = 'hellow';
        $age = 20;
        $arr = ['hellow', 'world'];
        return view('student.section1', [
            'name' => $name,
            'age' => $age,
            'arr' => $arr,
            'students' => $students
        ]);//推荐用法
    }

    public function urlTest()
    {
        return 'urlTest';
    }

    public function request1(Request $request)
    {
        /**
         * 取值
         */
//        if ($request->has('name')){
//            $name= $request->input("name",'未知');
//            echo $name;
//        }else{
//            echo '无此参数';
//        }
        /**
         * 输出所有参数
         */
//        $params = $request->all();
//        dd($params);

//        $method =$request->method();
//        dump($method);

//        if($request->isMethod('GET')){
//            echo "GET";
//        }else{
//            echo "OTHER";
//        }

//        $result = $request->ajax();
//        var_dump($result);

//        $url = $request->url();
//        echo $url;
        $result = $request->is('student/*');
        var_dump($result);
    }

    public function session1(Request $request)
    {
        /**
         * Http request session
         */
//        $request->session()->put('key1', 'value1');
//        $result= $request->session()->get('key1','default_no');
//        dump($result);

        /**
         * session()
         */
//        session()->put('key2','value2');
//        $result=  session()->get('key2');
//        echo $result;

        /**
         * 通过Session类
         */
//        Session::put('key3','value3');
//        $result= Session::get('key3');
//        echo $result;

//        $result= Session::get('key4','default_no');
//        echo $result;

        /**
         * 以数组方式设置
         */
//        Session::put([
//            'key4' => 'value4',
//            'key5' => 'value5'
//        ]);
//        $result = Session::get('key4');
//        echo $result;
//        $result = Session::get('key5');
//        echo $result;

        /**
         * 把数据放到session数组中
         */
//        Session::push('stu1', 'xiaoming');
//        Session::push('stu1', 'wangwu');
//        $result = Session::get('stu1','default_no');
//        dd($result) ;

        /**
         * 去除数据并删除？貌似没起作用
         */
//        $result = Session::pull('stu1','default_no');
//        dd($result) ;

        /**
         * 去除所有的值
         */
//        $result = Session::all();
//        dd($result) ;

        /**
         * 判断session中某个key是否存在
         */
//        if (Session::has('key2')) {
//            dump(Session::all());
//        } else {
//            echo 'has nothing';
//        }

        /**
         * 删除指定key的session
         */
//        $result = Session::all();
//        dump($result);
//        Session::forget('key1');
//        $result = Session::all();
//        dump($result);

        /**
         * 清空Session
         */
//        $result = Session::all();
//        dump($result);
//        Session::flush();
//        $result = Session::all();
//        dump($result);

        /**
         * 暂存数据,只能访问一次session,访问过后key就删除，即使访问的不是本key
         */
//        Session::flash('key_flash', 'value_flash');
//        $result = Session::get('key_flash');
//        dump($result);
    }

    public function session2(Request $request)
    {


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