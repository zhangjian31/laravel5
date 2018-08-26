@extends('layouts')

@section('header')
    @parent
    section header
@stop

@section('sidebar')
    @parent
    section sidebar
@stop

@section('content')
    {{--@parent--}}
    {{--没有继承--}}
    {{--section content--}}


    {{--模板中输出php变量--}}
    <p>{{$name}}={{$age}}</p>

    {{--模板中调用php代码--}}
    {{time()}}
    <br>
    {{date('Y-m-d H:i:s',time())}}
    <br>
    <p> {{in_array($name,$arr)?'true':'false'}}</p>
    <p>{{var_dump($arr)}}</p>
    <p>{{isset($name)?$name:'default'}}</p>
    <p>{{$name1 or 'default'}}</p>

    {{--原样输出--}}
    <p>@{{$name}}=@{{$age}}</p>

    {{--模板中的注释不可以在源文件看到--}}
    <!--html的注释，可以在源文件中看到-->

    {{--引入子视图--}}

    @include('student.common1',['message'=>'请检查网络'])
@stop