<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
/**
 * 基础路由
 */
Route::get('getTest', function () {
    return 'getTest';
});
Route::post('postTest', function () {
    return 'postTest';
});

/**
 *多请求路由
 */
Route::match(['get', 'post'], 'matchTest', function () {
    return 'matchTest';
});
Route::any('anyTest', function () {
    return 'anyTest';
});
/**
 *
 * 路由参数
 */
Route::get('getParamsTest/{id}', function ($id) {
    return 'getParamsTest-' . $id;
});
Route::get('getUser/{name?}', function ($name = null) {
    return 'getUser-' . $name;
});
Route::get('getUser2/{name?}', function ($name = 'xiaoming') {
    return 'getUser-' . $name;
})->where('name', '[0-9A-Za-z]+');

Route::get('getUser3/{id}/{name?}', function ($id, $name = 'xiaoming') {
    return 'getUser-ID=' . $id . ' Name=' . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

/**
 * 路由别名
 * 主要用图在其他地方可以直接使用route('center')调用，不用关心这个路由地址怎么变化
 */
Route::get('user/member_center', ['as' => 'center', function ($name = null) {
    return route('center');
}]);
/**
 * 路由群组和路由前缀
 */

Route::group(['prefix' => 'member'], function () {
    Route::get('getTest', function () {
        return 'prefix-getTest';
    });
    Route::any('anyTest', function () {
        return 'prefix-anyTest';
    });
});
/**
 * 输出试图
 */
Route::get('myview', function () {
    return view('welcome');
});

/**
 * 访问控制器
 */
Route::get('memberAPi/userInfo1','MemberInfoController@info');
Route::get('memberAPi/userInfo2',['uses'=>'MemberInfoController@info']);
Route::get('memberAPi/userInfo3',[
    'uses'=>'MemberInfoController@info2',
    'as'=>'memberinfo'
]);
Route::any('memberAPiWhere/{id}','MemberInfoController@info3')
->where('id', '[0-9A-Za-z]+');
//Route::controller('feiqile','MemberInfoController');

/**
 * 输出模板
 */
Route::get('memberInfo/memberInfo','MemberInfoController@memberInfo');

//Router::get('','MemberInfoController@memberInfo');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
