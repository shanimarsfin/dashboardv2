<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use Illuminate\Http\Response;

class AdminsController extends Controller{

    public function add(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') != 'admin'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}

    	$data['provinces'] = DB::table('provinces')->orderBy('name','asc')->get();
    	$data['admins'] = DB::table('admins')->get();
        $data['add'] = session('add') != null ? session('add') : null;
        $request->session()->forget('add');
        $data['edit'] = session('edit') != null ? session('edit') : null;
        $request->session()->forget('edit');
        $data['delete'] = session('delete') != null ? session('delete') : null;
        $request->session()->forget('delete');
    	return view('users', $data);
    }

    public function add_post(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') != 'admin'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}

    	$admins = $request->input('admins');
    	$check = DB::table('admins')->where('username', $admins['username'])->count();
    	$data['provinces'] = null;
    	if($check == 0){
    		$facility = DB::table('m_lib_health_facility')->where('facility_id', $admins['facility_code'])->first();
            $city = DB::table('cities')->where('id', $admins['psgc_citymuncode'])->first();
	    	//$admins['psgc_citymuncode'] = substr($city->code, 1);
            $admins['psgc_citymuncode'] = $city->code;
	    	$admins['facility_name'] = $facility->facility_name;
            $admins['facility_code'] = $facility->doh_class_id;
	    	$admins['password'] = Hash::make($admins['password']);
	    	DB::table('admins')->insert($admins);
            $message = '';
            if($admins['user_type'] == 'admin'){
                $message = 'an admin account.';
            }else if($admins['user_type'] == 'manager'){
                $message = 'a manager.';
            }else if($admins['user_type'] == 'municipality_user'){
                $message = 'a municipality user.';
            }
            $request->session()->put('add', 'You have successfully added ' . $message);
	    	return redirect('accounts');
    	}
    	$data['error'] = 'Username already exists. Please enter another username!';
    	$data['provinces'] = DB::table('provinces')->orderBy('name','asc')->get();
    	return view('users', $data);
    }

    public function edit($id, Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') != 'admin'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}

    	$data['admins'] = DB::table('admins')->get();
    	$data['provinces'] = DB::table('provinces')->orderBy('name','asc')->get();
    	$values = DB::table('admins')->where('id', $id)->first();
    	$code = $values->psgc_citymuncode;
    	$get_city = DB::table('cities')->where('code', $code)->first();
        
    	$get_province = DB::table('provinces')
				            ->where('code', $get_city->prov_code)
				            ->first();

		$data['cities'] = DB::table('cities')
    						->select('cities.*')
    						->where('prov_code', $get_province->code)				            
    						->get();

    	$data['facilities'] = DB::table('m_lib_health_facility')
    							->where('psgc_citymuncode', $values->psgc_citymuncode)
    							->get();

    	$data['values'] = $values;
    	$data['prov'] = $get_province;
    	$data['cty'] = $get_city;

    	return view('users', $data);
    }

    public function edit_post($id, Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') != 'admin'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}

    	$admins = $request->input('admins');
    	$check = DB::table('admins')->where('id', $id)->first();

    	$data['provinces'] = null;
    	$data['error'] = null;
    	if($check->username != $admins['username']){
    		$check = DB::table('admins')->where('username', $admins['username'])->count();

    		if($check > 0){
    			$data['error'] = 'Username already exists. Please enter another username!';
    		}else{
    			$facility = DB::table('m_lib_health_facility')->where('facility_id', $admins['facility_code'])->first();
		    	$city = DB::table('cities')->where('id', $admins['psgc_citymuncode'])->first();
		    	$admins['psgc_citymuncode'] = $city->code;
		    	$admins['facility_name'] = $facility->facility_name;
                $admins['facility_code'] = $facility->doh_class_id;
                if(strlen($admins['password']) > 0){
                    $admins['password'] = Hash::make($admins['password']);
                }else{
                    unset($admins['password']);
                }
		    	DB::table('admins')
		    		->where('id', $id)
		    		->update($admins);
                $message = '';
                if($admins['user_type'] == 'admin'){
                    $message = 'an admin account.';
                }else if($admins['user_type'] == 'manager'){
                    $message = 'a manager.';
                }else if($admins['user_type'] == 'municipality_user'){
                    $message = 'a municipality user.';
                }
                $request->session()->put('edit', 'You have successfully edited ' . $message);
		    	return redirect('accounts');	
    		}
    	}else{
    		$facility = DB::table('m_lib_health_facility')->where('doh_class_id', $admins['facility_code'])->first();
	    	$city = DB::table('cities')->where('id', $admins['psgc_citymuncode'])->first();
	    	$admins['psgc_citymuncode'] = $city->code;
	    	$admins['facility_name'] = $facility->facility_name;
            if(strlen($admins['password']) > 0){
                $admins['password'] = Hash::make($admins['password']);
            }else{
                unset($admins['password']);
            }
	    	
	    	DB::table('admins')
		    		->where('id', $id)
		    		->update($admins);

            $request->session()->put('edit', 'You have successfully edited an admin account.');        
		   	return redirect('accounts');
    	}

    	$data['provinces'] = DB::table('provinces')->orderBy('name','asc')->get();
    	$values = DB::table('admins')->where('id', $id)->first();
    	$code = '0' . $values->psgc_citymuncode;
    	$get_city = DB::table('cities')->where('code', $code)->first();
    	$get_province = DB::table('provinces')
				            ->join('province_cities','province_cities.province_fk','=','provinces.id')
				            ->select('provinces.*')
				            ->where('city_fk', $get_city->id)
				            ->first();

		$data['cities'] = DB::table('cities')
    						->join('province_cities', 'province_cities.city_fk','=','cities.id')
    						->select('cities.*')
    						->where('province_fk', $get_province->id)				            
    						->get();

    	$data['facilities'] = DB::table('m_lib_health_facility')
    							->where('psgc_citymuncode', $values->psgc_citymuncode)
    							->get();

    	$data['values'] = $values;
    	$data['prov'] = $get_province;
    	$data['cty'] = $get_city;
    	return view('users', $data);
    }

    public function confirm($id, Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') != 'admin'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}
    	$data['provinces'] = DB::table('provinces')->get();
    	$data['admins'] = DB::table('admins')->get();
    	$data['confirm'] = true;
    	return view('users', $data);
    }

    public function delete($id, Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') != 'admin'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}
    	
    	DB::table('admins')->where('id', $id)->delete();
        $request->session()->put('delete', 'You have successfully deleted an admin account.');
    	return redirect('accounts');
    }

    public function login(){
    	return view('login');
    }

    public function login_post(Request $request){
    	$data['error'] = null;
    	$admins = $request->input('admins');
    	$check_user = DB::table('admins')
    					->where('username', $admins['username'])
    					->count();

		if($check_user > 0){
			$check_user = DB::table('admins')
							->where('username', $admins['username'])
							->first();
			if(Hash::check($admins['password'], $check_user->password)){
				foreach($check_user as $key => $value){
					$request->session()->put($key, $value);
				}

				return redirect('home');
			}else{
				$data['error'] = 'The password you have entered is invalid.';
			}							
		}else{
			$data['error'] = 'The account you have entered doesn\'t exist in our database.';
		}

    	return view('login', $data);
    }

    public function logout(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	$request->session()->flush();
    	return redirect('login');
    }
}
