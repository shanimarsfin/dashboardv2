<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('change', function(){
	$results = DB::table('provinces')
	             ->get();
	
	foreach($results as $result){
		if($result->psgc_code[0] == '0'){
			$new_value = substr($result->psgc_code, 1);
			DB::update('update provinces set psgc_code = '.$new_value.' where id = ?', [$result->id]);
		}

		if($result->reg_code[0] == '0'){
			$new_value = substr($result->reg_code, 1);
			DB::update('update provinces set reg_code = '.$new_value.' where id = ?', [$result->id]);
		}

		if($result->code[0] == '0'){
			$new_value = substr($result->code, 1);
			DB::update('update provinces set code = '.$new_value.' where id = ?', [$result->id]);
		}
	}
});*/
Route::get('/',function(){
	return view('login');
});

Route::get('/home', 'MiscController@get_home');

Route::post('/home', 'MiscController@post_home');

Route::get('/map', 'MiscController@map');

Route::post('/map', 'MiscController@process_map');

Route::get('/get_municipalities/{province_fk}', function($province_fk){
	$results = DB::table('cities')
	             ->where('prov_code','=',$province_fk)
	             ->orderBy('name', 'asc')
	             ->get();

	$html = '';
	$html .= '<option selected disabled>Select a municipality</option>';
	foreach($results as $result){
		$html .= '<option value="'.$result->id.'" data-code="'.$result->code.'">'.$result->name.'</option>';
	}

	echo $html;
});

Route::get('/get_municipalities2/{province_fk}', function($province_fk){
	$results = DB::table('cities')
	             ->where('prov_code','=',$province_fk)
	             ->orderBy('name','asc')
	             ->get();

	$html = '';
	$html .= '<option selected disabled>Select a municipality</option>';
	foreach($results as $result){
		$html .= '<option value="'.$result->id.'" data-code="'.$result->code.'">'.$result->name.'</option>';
	}

	echo $html;
});

Route::get('/get_health_facilities_per_province/{province_code}', function($province_code){
	$results = DB::table('m_lib_health_facility')
	             ->select('m_lib_health_facility.*')
	             ->where('psgc_provcode','=',$province_code)
	             ->get();

	$html = '';
	foreach($results as $result){
		$html .= '<option value="'.$result->facility_id.'">'.$result->facility_name.'</option>';
	}

	echo $html;
});

Route::get('/get_health_facilities/{city_code}', function($city_code){
	$results = DB::table('m_lib_health_facility')
	             ->select('m_lib_health_facility.*')
	             ->where('psgc_citymuncode','=',$city_code)
	             ->get();

	$html = '';
	foreach($results as $result){
		$html .= '<option value="'.$result->facility_id.'">'.$result->facility_name.'</option>';
	}

	echo $html;
});



Route::get('/accounts', 'AdminsController@add');
Route::post('/accounts', 'AdminsController@add_post');
Route::get('accounts/edit/{id}', 'AdminsController@edit');
Route::post('accounts/edit/{id}', 'AdminsController@edit_post');
Route::get('accounts/confirm/{id}', 'AdminsController@confirm');
Route::get('accounts/delete/{id}', 'AdminsController@delete');
Route::get('login', 'AdminsController@login');
Route::post('login', 'AdminsController@login_post');
//Route::get('/upload/{message?}',['as' => 'upload_view', 'uses' => 'MiscController@show_upload_page']);
Route::get('/upload', 'MiscController@show_upload_page');
Route::post('/upload', 'MiscController@upload');
Route::get('/download', 'MiscController@download');
Route::get('download_csv/{id}', 'MiscController@get_download');
Route::get('/statistics', 'MiscController@show_search_page');
Route::post('statistics', 'MiscController@show_table');
Route::get('/show_graph/{indicator}/{month1}/{month2}/{year}/{place}/{values}', 'MiscController@show_graph');
Route::get('/show_graph_all/{indicator}/{month1}/{month2}/{year}/{places}/{table_name}/{type}', 'MiscController@show_graph_all');
Route::get('logout', 'AdminsController@logout');
Route::get('/delete_report/{id}', 'MiscController@delete');