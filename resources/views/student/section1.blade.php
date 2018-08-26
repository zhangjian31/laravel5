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

    {{--include--}}
    @include('student.common1',['message'=>'请检查网络'])

    {{--流程控制--}}
    <br>
    @if($name=='hellow')
        你好
    @elseif($name=='world')
        世界
    @else
        什么？
    @endif

    <br>
    @if(in_array($name,$arr))
        true
    @else
        false
    @endif

    <br>
    @unless($name!='hellow')
        我和if是相反的
    @endunless

    <br>
    {{--@for($i=0;$i<3;$i++)--}}
        {{--<p>{{$i}}</p>--}}
    {{--@endfor--}}
    <br>

    {{--@foreach($students as $stu)--}}
        {{--<p>{{$stu->name}} {{$stu->age}} {{$stu->sex}}</p>--}}
    {{--@endforeach--}}
    <br>
    @forelse($students as $stu)
        <p>{{$stu->name}} {{$stu->age}} {{$stu->sex}}</p>
    @empty
        <p>我是空的，循环啥？</p>
    @endforelse

    <br>
    <a href="{{url('url')}}">路由跳转：{{url('url')}}</a>
    <br>
    <a href="{{action('StudentController@urlTest')}}">路由跳转：StudentController@urlTest</a>
    <br>
    <a href="{{route('url')}}">路由跳转：{{route('url')}}</a>
@stop