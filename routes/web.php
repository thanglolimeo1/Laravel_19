<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home1');

Route::get('/get',function(){
	$url = route('home1');
	dd($url);
});


Route::delete('/task/delete/{id}',function($id){ // phuong thức mình quy định,get,post
	dd($id);
	return redirect('/thanhcong'); // -- trỏ đến trang thành công
	// 1.dd('delete');
	// 2.return redirect('/'); -- trở về trang chủ
})->name('todo.task.delete');

Route::get('/thanhcong',function(){
	dd('thanhcong'.$id);
});
// Route::get('/user',function(){
// 	$a = 10*10;

// 	dd($a);
// });

Route::get('user/{id?}',function($id = null){
	if ($id== null) {
		echo "all";
	}else{
		echo "User" .$id;
	}
});

// Route::get('/user/{id}/post/{post}/{username}',function($id,$idPost,$a){
// 	return "This is post $idPost of user $id $a"; 
// });

//(Route prefix)- nhóm group
// Route::group([
//    'prefix' => 'task'
// ], function (){
// 	Route::delete('delete/{id}',function($id){ // phuong thức mình quy định,get,post
// 	dd($id);
// 	return redirect('/thanhcong'); // -- trỏ đến trang thành công
// 	// 1.dd('delete');
// 	// 2.return redirect('/'); -- trở về trang chủ
// })->name('todo.task.delete');
// });

// cách 2- nhóm group
Route::prefix('task')->group(function (){
	Route::delete('delete/{id}',function($id){ // phuong thức mình quy định,get,post
	dd($id);
	return redirect('/thanhcong'); // -- trỏ đến trang thành công
	// 1.dd('delete');
	// 2.return redirect('/'); -- trở về trang chủ
})->name('todo.task.delete');
});




Route::group([
'prefix'=>'task'],function(){
	// Route tính năng hoàn thành 
	Route::get('/task/complete/',function(){
		return redirect('/');// em cho trở về trang chủ
	})->name('todo.task.complete');

	// Route tính năng làm lại
	Route::get('/lamlai/{id}',function($id){
		return redirect('/');// cái này cũng trở về trang chủ
	})->name('todo.task.reset');
});



Route::get('hello1',function(){
	return view('hello1');
});

// sub view để phân bố code
Route::get('sub/hello1',function(){
	return view('hello.hello1');
});

// Route::get('hello.hello2',function(){
// 	$records =[1];
//    return view('hello.hello2')->with('records',$records);
// });


// Route::get('hello2',function(){

// 	// return view('hello2',[
// 	// 	'name' =>'Hoang Van Thang',
// 	// 	'Email' =>"16071305@isvnu.vn",
// 	// 	'School' => "International School"
// 	// ]);
// 	// return view('hello2')->with('name', 'Hoang Van Thang');
// 	return view('hello2')->with([
//         'name' => 'Hoang Van Thang',
//         'Email' => '16071305@isvnu.vn',
//         'School' => "International School"
//     ]);
// });


// Route::get('hello/hello2',function(){
// 	$content = '<b>Hoang Thang</b>';
// 	$records = '1+3';
// 	return view('hello.hello2')->with([
// 		'records'=>$records
//     ]);
// });


// Route::get('layout/home',function(){
// 	return view('layouts.home');
// });
// Route::get('layout/detail',function(){
// 	return view('layouts.detail');
// });

// //Ex01-HW-HVT
// Route::get('profile',function(){
// 	return view('profile')->with([
//         'name' => 'Hoang Van Thang',
//         'DateOfBirth' => '22/10/1998',
//         'School' => 'International School',
//         'Hometown' =>'Quảng Ninh',
//         'TargetJobs' =>'Trở thành một Web Developer chuyên nghiệp '

//     ]);
// });

// //Ex02-HW-HVT
// Route::get('list' , function(){
// 	 $list = [
//         [
//             'name' => 'Học View trong Laravel',
//             'status' => 0
//         ],

//         [
//             'name' => 'Học Route trong Laravel',
//             'status' => 1
//         ],
//         [
//             'name' => 'Làm bài tập View trong Laravel',
//             'status' => -1
//         ],
//     ];
// 	      return view('list',['list' => $list]);

// });


// //Ex03-HW-HVT-Tạo layout trong blade
// Route::get('layout1/home',function(){
// 	return view('/home');
// });


// Route::get('/index', 'HomeController@index');
// Route::get('/view', 'HomeController@view');
// Route::get('/Page/{page?}','HomeController@page');

// Route::get('setting1','AdminSettingController@setting');
// Route::get('setting2','Admin\SettingController@setting');
// Route::get('setting3','Admin\Test\SettingController@setting');

// Route::namespace('Admin')->group(function(){
// 	Route::get('setting2','Test\SettingController@setting');
// 	Route::get('/index','DashboardController@setting');
// });

// Route::resource('task', 'Frontend\TaskController');

// Route::resource('task', 'Frontend\TaskController');
// Route::group(['namespace' => 'Admin'] , function(){
// 	Route::get('dashboard', 'DashboardController@index');
// 	Route::get('setting2', 'SettingController@index')->name('setting2');
// 	Route::get('setting3', 'Test\SettingController@index');
// });

// Route::get('task/complete/{id}' , function($id){
// 	dd('Hoàn thành '.$id);
// })->name('todo.task.complete');
// 		'goal' => $goal
// 	]);
// });
// Route::resource('task', 'Frontend\TaskController');
// Route::group(['namespace' => 'Frontend','as' => 'task.'] , function(){
// 	Route::get('task','TaskController@index')->name('index');
// 	Route::get('task/create','TaskController@create')->name('create');
// 	Route::post('task/store','TaskController@store')->name('store');
// 	Route::get('task/{id}','TaskController@show')->name('show');
// 	Route::get('task/{id}/edit','TaskController@edit')->name('edit');
// 	Route::put('task/{id}','TaskController@update')->name('update');
// 	Route::delete('task/{id}','TaskController@destroy')->name('destroy');
// 	Route::get('task/complete/{id}','TaskController@complete')->name('complete');
// 	Route::get('task/recomplete/{id}','TaskController@reComplete')->name('recomplete');
// }); 


//EX05-HW
// Route::resource('task', 'Frontend\TaskController');
// Route::group(['namespace' => 'Frontend','as' => 'task.'] , function(){
// 	Route::get('task','TaskController@index')->name('index');
// 	Route::get('task/create','TaskController@create')->name('create');
// 	Route::post('task/store','TaskController@store')->name('store');
// 	Route::get('task/{id}','TaskController@show')->name('show');
// 	Route::get('task/{id}/edit','TaskController@edit')->name('edit');
// 	Route::put('task/{id}','TaskController@update')->name('update');
// 	Route::delete('task/{id}','TaskController@destroy')->name('destroy');
// 	Route::get('task/complete/{id}','TaskController@complete')->name('complete');
// 	Route::get('task/recomplete/{id}','TaskController@reComplete')->name('recomplete');
// });

Route::get('task','Frontend\TaskController@index')->name('task.index');
Route::get('task/create','Frontend\TaskController@create')->name('task.create');
Route::post('task', 'Frontend\TaskController@store')->name('task.store');
Route::get('task/{task}','Frontend\TaskController@show')->name('task.show');
Route::get('task/{id}/edit','Frontend\TaskController@edit')->name('task.edit');
Route::put('task/{task}','Frontend\TaskController@update')->name('task.update');
Route::match(['put','patch'], 'task/{task}', 'Frontend\TaskController@update')->name('task.update');
Route::get('task/complete/{id}','Frontend\TaskController@complete')->name('task.complete');
Route::get('task/recomplete/{id}','Frontend\TaskController@reComplete')->name('task.recomplete');
Route::delete('task/{id}','Frontend\TaskController@destroy')->name('task.destroy');