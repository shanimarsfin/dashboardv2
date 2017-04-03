<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Http\Response;

class MiscController extends Controller
{
    public function upload(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') == 'municipality_user'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}
    	$csv = $_FILES['csv'];
    	$data['error'] = null;
    	$data['success'] = null;
    	$data['delete'] = null;
    	$data['programs'] = DB::table('programs')->get();
    	$whitelist = array('application/vnd.ms-excel', 'text/csv');

    	if($csv['size'] > 0){
    		if(in_array($csv['type'],$whitelist)){
    			$facility_id = '';
    			$file = $csv['tmp_name'];
				$handle = fopen($file, "r");
				$handle2 = fopen($file, "r");
				$name = explode('_', $csv['name']);
    			$new_name = explode('-', $name[1]);
    			$check_program = DB::table('programs')->where('program_code', $name[2]);
    			
    			if($check_program->count() > 0){
    				$check_program = $check_program->first();
    				
	    			while(($data = fgetcsv($handle2,0, ",")) !== false){
						$facility_id = str_replace("'", "", $data[0]);
					}


					if(session('user_type') == 'admin'){
    					$check_file_submission = DB::table('file_submissions')
		    										->where('month', $new_name[0])
		    										->where('year', $new_name[1])
		    										->where('program_fk', $check_program->id)
		    										->where('facility_id', $facility_id)
		    										->count();
    				}else{
    					$check_file_submission = DB::table('file_submissions')
    												->where('month', $new_name[0])
    												->where('year', $new_name[1])
    												->where('program_fk', $check_program->id)
    												->where('facility_id', session('facility_code'))
    												->count();
    				}
					if($check_file_submission == 0){
						while(($data = fgetcsv($handle,0, ",")) !== false){
							$facility_id = str_replace("'", "", $data[0]);
							if($check_program->tbl_name == 'prog_child_care'){
								$sql  = "INSERT INTO " . $check_program->tbl_name . " VALUES(";
								$sql .= "'".str_replace("'", "", $data[0])."', '" . str_replace("'", "", $data[1]) . "', '" . str_replace("'", "", $data[2]) . "',";
								$sql .= "'".str_replace("'", "", $data[3])."', '" . str_replace("'", "", $data[4]) . "', '" . str_replace("'", "", $data[5]) . "',";
								$sql .= "'".str_replace("'", "", $data[6])."', '" . str_replace("'", "", $data[7]) . "', '" . str_replace("'", "", $data[8]) . "',";
								$sql .= "'".str_replace("'", "", $data[9])."', '" . str_replace("'", "", $data[10]). "', '" . str_replace("'", "", $data[11]). "',";
								$sql .= "'".str_replace("'", "", $data[12])."', '" . str_replace("'", "", $data[13]). "', '" . str_replace("'", "", $data[14]) . "',";
								$sql .= "'".str_replace("'", "", $data[15])."', '" . str_replace("'", "", $data[16]). "', '" . str_replace("'", "", $data[17]) . "',";
								$sql .= "'".str_replace("'", "", $data[18])."', '" . str_replace("'", "", $data[19]). "', '" . str_replace("'", "", $data[20]) . "',";
								$sql .= "'".str_replace("'", "", $data[21])."', '" . str_replace("'", "", $data[22]). "', '" . str_replace("'", "", $data[23]) . "',";
								$sql .= "'".str_replace("'", "", $data[24])."', '" . str_replace("'", "", $data[25]). "', '" . str_replace("'", "", $data[26]) . "',";
								$sql .= "'".str_replace("'", "", $data[27])."', '" . str_replace("'", "", $data[28]). "', '" . str_replace("'", "", $data[29]) . "',";
								$sql .= "'".str_replace("'", "", $data[30])."', '" . str_replace("'", "", $data[31]). "', '" . str_replace("'", "", $data[32]) . "',";
								$sql .= "'".str_replace("'", "", $data[33])."', '" . str_replace("'", "", $data[34]). "', '" . str_replace("'", "", $data[35]) . "',";
								$sql .= "'".str_replace("'", "", $data[36])."', '" . str_replace("'", "", $data[37]). "', '" . str_replace("'", "", $data[38]) . "',";
								$sql .= "'".str_replace("'", "", $data[39])."', '" . str_replace("'", "", $data[40]). "', '" . str_replace("'", "", $data[41]) . "',";
								$sql .= "'".str_replace("'", "", $data[42])."', '" . str_replace("'", "", $data[43]). "', '" . str_replace("'", "", $data[44]) . "',";
								$sql .= "'".str_replace("'", "", $data[45])."', '" . str_replace("'", "", $data[46]). "', '" . str_replace("'", "", $data[47]) . "',";
								$sql .= "'".str_replace("'", "", $data[48])."', '" . str_replace("'", "", $data[49]). "', '" . str_replace("'", "", $data[50]) . "',";
								$sql .= "'".str_replace("'", "", $data[51])."', '" . str_replace("'", "", $data[52]). "', '" . str_replace("'", "", $data[53]) . "',";
								$sql .= "'".str_replace("'", "", $data[54])."', '" . str_replace("'", "", $data[55]). "', '" . str_replace("'", "", $data[56]) . "',";
								$sql .= "'".str_replace("'", "", $data[57])."', '" . str_replace("'", "", $data[58]). "', '" . str_replace("'", "", $data[59]) . "',";
								$sql .= "'".str_replace("'", "", $data[60])."', '" . str_replace("'", "", $data[61]). "', '" . str_replace("'", "", $data[62]) . "',";
								$sql .= "'".str_replace("'", "", $data[63])."', '" . str_replace("'", "", $data[64]). "', '" . str_replace("'", "", $data[65]) . "',";
								$sql .= "'".str_replace("'", "", $data[66])."', '" . str_replace("'", "", $data[67]). "', '" . str_replace("'", "", $data[68]) . "',";
								$sql .= "'".str_replace("'", "", $data[69])."', '" . str_replace("'", "", $data[70]). "', '" . str_replace("'", "", $data[71]) . "',";
								$sql .= "'".str_replace("'", "", $data[72])."', '" . str_replace("'", "", $data[73]). "', '" . str_replace("'", "", $data[74]) . "',";
								$sql .= "'".str_replace("'", "", $data[75])."', '" . str_replace("'", "", $data[76]). "', '" . str_replace("'", "", $data[77]) . "',";
								$sql .= "'".str_replace("'", "", $data[78])."', '" . str_replace("'", "", $data[79]). "', '" . str_replace("'", "", $data[80]) . "',";
								$sql .= "'".str_replace("'", "", $data[81])."', '" . str_replace("'", "", $data[82]). "', '" . str_replace("'", "", $data[83]) . "',";
								$sql .= "'".str_replace("'", "", $data[84])."', '" . str_replace("'", "", $data[85]). "', '" . str_replace("'", "", $data[86]) . "',";
								$sql .= "'".str_replace("'", "", $data[87])."', '" . str_replace("'", "", $data[88]). "', '" . str_replace("'", "", $data[89]) . "',";
								$sql .= "'".str_replace("'", "", $data[90])."', '" . str_replace("'", "", $data[91]). "', '" . str_replace("'", "", $data[92]) . "',";
								$sql .= "'".str_replace("'", "", $data[93])."', '" . str_replace("'", "", $data[94]). "', '" . str_replace("'", "", $data[95]) . "',";
								$sql .= "'".str_replace("'", "", $data[96])."', '" . str_replace("'", "", $data[97]). "', '" . str_replace("'", "", $data[98]) . "',";
								$sql .= "'".str_replace("'", "", $data[99])."', '" . str_replace("'", "", $data[100]). "', '" . str_replace("'", "", $data[101]) . "',";
								$sql .= "'".str_replace("'", "", $data[102])."', '" . str_replace("'", "", $data[103]). "', '" . str_replace("'", "", $data[104]) . "',";
								$sql .= "'".str_replace("'", "", $data[105])."', '" . str_replace("'", "", $data[106]). "', '" . str_replace("'", "", $data[107]) . "',";
								$sql .= "'".str_replace("'", "", $data[108])."', '" . str_replace("'", "", $data[109]). "', '" . str_replace("'", "", $data[110]) . "',";
								$sql .= "'".str_replace("'", "", $data[111])."', '" . str_replace("'", "", $data[112]). "', '" . str_replace("'", "", $data[113]) . "',";
								$sql .= "'".str_replace("'", "", $data[114])."', '" . str_replace("'", "", $data[115]). "', '" . str_replace("'", "", $data[116]) . "',";
								$sql .= "'".str_replace("'", "", $data[117])."', '" . str_replace("'", "", $data[118]). "', '" . str_replace("'", "", $data[119]) . "',";
								$sql .= "'".str_replace("'", "", $data[120])."', '" . str_replace("'", "", $data[121]). "', '" . str_replace("'", "", $data[122]) . "',";
								$sql .= "'".str_replace("'", "", $data[123])."', '" . str_replace("'", "", $data[124]). "', '" . str_replace("'", "", $data[125]) . "',";
								$sql .= "'".str_replace("'", "", $data[126])."', '" . str_replace("'", "", $data[127]). "', '" . str_replace("'", "", $data[128]) . "',";
								$sql .= "'".str_replace("'", "", $data[129])."', '" . str_replace("'", "", $data[130]). "', '" . str_replace("'", "", $data[131]) . "',";
								$sql .= "'".str_replace("'", "", $data[132])."', '" . str_replace("'", "", $data[133]). "', '" . str_replace("'", "", $data[134]) . "',";
								$sql .= "'".str_replace("'", "", $data[135])."', '" . str_replace("'", "", $data[136]). "', '" . str_replace("'", "", $data[137]) . "',";
								$sql .= "'".str_replace("'", "", $data[138])."', '" . str_replace("'", "", $data[139]). "', '" . str_replace("'", "", $data[140]) . "',";
								$sql .= "'".str_replace("'", "", $data[141])."', '" . str_replace("'", "", $data[142]). "', '" . str_replace("'", "", $data[143]) ."')";
								
							}else if($check_program->tbl_name == 'prog_family_planning'){
								$sql  = "INSERT INTO " . $check_program->tbl_name . " VALUES(";
								$sql .= "'".str_replace("'", "", $data[0])."', '" . str_replace("'", "", $data[1]) . "', '" . str_replace("'", "", $data[2]) . "',";
								$sql .= "'".str_replace("'", "", $data[3])."', '" . str_replace("'", "", $data[4]) . "', '" . str_replace("'", "", $data[5]) . "',";
								$sql .= "'".str_replace("'", "", $data[6])."', '" . str_replace("'", "", $data[7]) . "', '" . str_replace("'", "", $data[8]) . "',";
								$sql .= "'".str_replace("'", "", $data[9])."', '" . str_replace("'", "", $data[10]). "', '" . str_replace("'", "", $data[11]). "',";
								$sql .= "'".str_replace("'", "", $data[12])."', '" . str_replace("'", "", $data[13]). "', '" . str_replace("'", "", $data[14]) . "',";
								$sql .= "'".str_replace("'", "", $data[15])."', '" . str_replace("'", "", $data[16]). "', '" . str_replace("'", "", $data[17]) . "',";
								$sql .= "'".str_replace("'", "", $data[18])."', '" . str_replace("'", "", $data[19]). "', '" . str_replace("'", "", $data[20]) . "',";
								$sql .= "'".str_replace("'", "", $data[21])."', '" . str_replace("'", "", $data[22]). "', '" . str_replace("'", "", $data[23]) . "',";
								$sql .= "'".str_replace("'", "", $data[24])."', '" . str_replace("'", "", $data[25]). "', '" . str_replace("'", "", $data[26]) . "',";
								$sql .= "'".str_replace("'", "", $data[27])."', '" . str_replace("'", "", $data[28]). "', '" . str_replace("'", "", $data[29]) . "',";
								$sql .= "'".str_replace("'", "", $data[30])."', '" . str_replace("'", "", $data[31]). "', '" . str_replace("'", "", $data[32]) . "',";
								$sql .= "'".str_replace("'", "", $data[33])."', '" . str_replace("'", "", $data[34]). "', '" . str_replace("'", "", $data[35]) . "',";
								$sql .= "'".str_replace("'", "", $data[36])."', '" . str_replace("'", "", $data[37]). "', '" . str_replace("'", "", $data[38]) . "',";
								$sql .= "'".str_replace("'", "", $data[39])."', '" . str_replace("'", "", $data[40]). "', '" . str_replace("'", "", $data[41]) . "',";
								$sql .= "'".str_replace("'", "", $data[42])."', '" . str_replace("'", "", $data[43]). "', '" . str_replace("'", "", $data[44]) . "',";
								$sql .= "'".str_replace("'", "", $data[45])."', '" . str_replace("'", "", $data[46]). "', '" . str_replace("'", "", $data[47]) . "',";
								$sql .= "'".str_replace("'", "", $data[48])."', '" . str_replace("'", "", $data[49]). "', '" . str_replace("'", "", $data[50]) . "',";
								$sql .= "'".str_replace("'", "", $data[51])."', '" . str_replace("'", "", $data[52]). "', '" . str_replace("'", "", $data[53]) . "',";
								$sql .= "'".str_replace("'", "", $data[54])."', '" . str_replace("'", "", $data[55]). "', '" . str_replace("'", "", $data[56]) . "',";
								$sql .= "'".str_replace("'", "", $data[57])."', '" . str_replace("'", "", $data[58]). "', '" . str_replace("'", "", $data[59]) . "',";
								$sql .= "'".str_replace("'", "", $data[60])."', '" . str_replace("'", "", $data[61]). "', '" . str_replace("'", "", $data[62]) . "',";
								$sql .= "'".str_replace("'", "", $data[63])."', '" . str_replace("'", "", $data[64]). "', '" . str_replace("'", "", $data[65]) . "',";
								$sql .= "'".str_replace("'", "", $data[66])."', '" . str_replace("'", "", $data[67]). "', '" . str_replace("'", "", $data[68]) . "',";
								$sql .= "'".str_replace("'", "", $data[69])."', '" . str_replace("'", "", $data[70]). "', '" . str_replace("'", "", $data[71]) . "',";
								$sql .= "'".str_replace("'", "", $data[72])."', '" . str_replace("'", "", $data[73]). "', '" . str_replace("'", "", $data[74]) . "',";
								$sql .= "'".str_replace("'", "", $data[75])."', '" . str_replace("'", "", $data[76]). "', '" . str_replace("'", "", $data[77]) . "',";
								$sql .= "'".str_replace("'", "", $data[78])."', '" . str_replace("'", "", $data[79]). "')";
							}else if($check_program->tbl_name == 'prog_maternal_care'){
								$sql  = "INSERT INTO " . $check_program->tbl_name . " VALUES(";
								$sql .= "'".str_replace("'", "", $data[0])."', '" . str_replace("'", "", $data[1]) . "', '" . str_replace("'", "", $data[2]) . "',";
								$sql .= "'".str_replace("'", "", $data[3])."', '" . str_replace("'", "", $data[4]) . "', '" . str_replace("'", "", $data[5]) . "',";
								$sql .= "'".str_replace("'", "", $data[6])."', '" . str_replace("'", "", $data[7]) . "', '" . str_replace("'", "", $data[8]) . "',";
								$sql .= "'".str_replace("'", "", $data[9])."', '" . str_replace("'", "", $data[10]). "', '" . str_replace("'", "", $data[11]). "',";
								$sql .= "'".str_replace("'", "", $data[12])."', '" . str_replace("'", "", $data[13]). "', '" . str_replace("'", "", $data[14]) . "',";
								$sql .= "'".str_replace("'", "", $data[15])."', '" . str_replace("'", "", $data[16]). "', '" . str_replace("'", "", $data[17]) . "',";
								$sql .= "'".str_replace("'", "", $data[18])."', '" . str_replace("'", "", $data[19]). "', '" . str_replace("'", "", $data[20]) . "',";
								$sql .= "'".str_replace("'", "", $data[21])."', '" . str_replace("'", "", $data[22]) . "')";
							}else if($check_program->tbl_name == 'prog_m2_bhs'){
								$sql  = "INSERT INTO " . $check_program->tbl_name . " VALUES(";
								$sql .= "'".str_replace("'", "", $data[0])."', '" . str_replace("'", "", $data[1]) . "', '" . str_replace("'", "", $data[2]) . "',";
								$sql .= "'".str_replace("'", "", $data[3])."', '" . str_replace("'", "", $data[4]) . "', '" . str_replace("'", "", $data[5]) . "',";
								$sql .= "'".str_replace("'", "", $data[6])."', '" . str_replace("'", "", $data[7]) . "', '" . str_replace("'", "", $data[8]) . "',";
								$sql .= "'".str_replace("'", "", $data[9])."', '" . str_replace("'", "", $data[10]). "', '" . str_replace("'", "", $data[11]). "',";
								$sql .= "'".str_replace("'", "", $data[12])."', '" . str_replace("'", "", $data[13]). "', '" . str_replace("'", "", $data[14]) . "',";
								$sql .= "'".str_replace("'", "", $data[15])."', '" . str_replace("'", "", $data[16]). "', '" . str_replace("'", "", $data[17]) . "',";
								$sql .= "'".str_replace("'", "", $data[18])."', '" . str_replace("'", "", $data[19]). "', '" . str_replace("'", "", $data[20]) . "',";
								$sql .= "'".str_replace("'", "", $data[21])."', '" . str_replace("'", "", $data[22]). "', '" . str_replace("'", "", $data[23]) . "',";
								$sql .= "'".str_replace("'", "", $data[24])."', '" . str_replace("'", "", $data[25]). "', '" . str_replace("'", "", $data[26]) . "',";
								$sql .= "'".str_replace("'", "", $data[27])."', '" . str_replace("'", "", $data[28]). "', '" . str_replace("'", "", $data[29]) . "',";
								$sql .= "'".str_replace("'", "", $data[30])."', '" . str_replace("'", "", $data[31]). "', '" . str_replace("'", "", $data[32]) . "',";
								$sql .= "'".str_replace("'", "", $data[33])."', '" . str_replace("'", "", $data[34]). "', '" . str_replace("'", "", $data[35]) . "',";
								$sql .= "'".str_replace("'", "", $data[36])."', '" . str_replace("'", "", $data[37]). "', '" . str_replace("'", "", $data[38]) . "',";
								$sql .= "'".str_replace("'", "", $data[39])."', '" . str_replace("'", "", $data[40]). "', '" . str_replace("'", "", $data[41]) . "',";
								$sql .= "'".str_replace("'", "", $data[42])."')";
							}
							DB::insert($sql);
						}

		    			$insert = array('facility_id' => $facility_id,
		    							'month' => $new_name[0],
		    							'year' => $new_name[1],
		    							'program_fk' => $check_program->id,
		    							'file_name' => $csv['name'],
		    							'user_fk' => session('id'),
		    							'date_submitted' => date('Y-m-d'));

		    			DB::table('file_submissions')->insert($insert);
		    			$uploads = storage_path() . '/uploads';
		    			move_uploaded_file($csv['tmp_name'],$uploads . '/' . $csv['name']);
		    			$request->session()->put('message', 'You have successfully uploaded a report.');
		    			return redirect('upload');
					}else{
						$data['error'] = 'A csv file has already been uploaded in the past for this date.';
					}
    			}else{
    				$data['error'] = 'Please check the filename. It seems that the program is invalid.';	
    			}
    		}else{
    			$data['error'] = 'Invalid file! Only csv is allowed to be uploaded.';
    		}
    	}else{
    		$data['error'] = 'You need to select a csv file before uploading!';
    	}

    	if(session('user_type') != 'admin'){
    		$data['results'] = DB::table('file_submissions')
						            ->join('months', 'months.id', '=', 'file_submissions.month')
						            ->join('programs', 'programs.id', '=', 'file_submissions.program_fk')
						            ->join('m_lib_health_facility','m_lib_health_facility.doh_class_id','=','file_submissions.facility_id')
						            ->join('admins','admins.id','=','file_submissions.user_fk')
						            ->select('file_submissions.*', 'months.name as month_name', 'programs.name AS program_name', 'm_lib_health_facility.facility_name','admins.first_name','admins.last_name')
						            ->where('file_submissions.facility_id', session('facility_code'))
						            ->orderBy('file_submissions.date_submitted','desc')
						            ->get();
    	}else{
    		$data['results'] = DB::table('file_submissions')
				            ->join('months', 'months.id', '=', 'file_submissions.month')
				            ->join('programs', 'programs.id', '=', 'file_submissions.program_fk')
				            ->join('m_lib_health_facility','m_lib_health_facility.doh_class_id','=','file_submissions.facility_id')
				            ->join('admins','admins.id','=','file_submissions.user_fk')
				            ->select('file_submissions.*', 'months.name as month_name', 'programs.name AS program_name', 'm_lib_health_facility.facility_name','admins.first_name','admins.last_name')
				            ->orderBy('file_submissions.date_submitted','desc')
				            ->get();
    	}

    	return view('upload', $data);
    }

    public function show_upload_page(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}
    	
    	if(session('user_type') == 'municipality_user'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}
    	$data['error'] = null;
    	$data['success'] = session('message') != null ? session('message') : null;
    	$request->session()->forget('message');
    	$data['delete'] = session('successful_delete') != null ? session('successful_delete') : null;
    	$request->session()->forget('successful_delete');
    	$data['programs'] = DB::table('programs')->get();

    	if(session('user_type') != 'admin'){
    		$data['results'] = DB::table('file_submissions')
						            ->join('months', 'months.id', '=', 'file_submissions.month')
						            ->join('programs', 'programs.id', '=', 'file_submissions.program_fk')
						            ->join('m_lib_health_facility','m_lib_health_facility.doh_class_id','=','file_submissions.facility_id')
						            ->join('admins','admins.id','=','file_submissions.user_fk')
						            ->select('file_submissions.*', 'months.name as month_name', 'programs.name AS program_name', 'm_lib_health_facility.facility_name','admins.first_name','admins.last_name')
						            ->where('file_submissions.facility_id', session('facility_code'))
						            ->orderBy('file_submissions.date_submitted','desc')
						            ->get();
    	}else{
    		$data['results'] = DB::table('file_submissions')
				            ->join('months', 'months.id', '=', 'file_submissions.month')
				            ->join('programs', 'programs.id', '=', 'file_submissions.program_fk')
				            ->join('m_lib_health_facility','m_lib_health_facility.doh_class_id','=','file_submissions.facility_id')
				            ->join('admins','admins.id','=','file_submissions.user_fk')
				            ->select('file_submissions.*', 'months.name as month_name', 'programs.name AS program_name', 'm_lib_health_facility.facility_name','admins.first_name','admins.last_name')
				            ->orderBy('file_submissions.date_submitted','desc')
				            ->get();
    	}

    	//var_dump($data['results']);
    	//exit;
    	return view('upload', $data);
    }

    public function download(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	if(session('user_type') == 'municipality_user'){
    		echo "<br><br><br><center><h2>You are not allowed to view this page.</h2></center>";
    		exit;
    	}

    	if(session('user_type') != 'admin'){
    		$data['results'] = DB::table('file_submissions')
						            ->join('months', 'months.id', '=', 'file_submissions.month')
						            ->join('programs', 'programs.id', '=', 'file_submissions.program_fk')
						            ->join('m_lib_health_facility','m_lib_health_facility.doh_class_id','=','file_submissions.facility_id')
						            ->select('file_submissions.*', 'months.name as month_name', 'programs.name AS program_name', 'm_lib_health_facility.facility_name')
						            ->where('file_submissions.facility_id', session('facility_code'))
						            ->get();
    	}else{
    		$data['results'] = DB::table('file_submissions')
				            ->join('months', 'months.id', '=', 'file_submissions.month')
				            ->join('programs', 'programs.id', '=', 'file_submissions.program_fk')
				            ->join('m_lib_health_facility','m_lib_health_facility.doh_class_id','=','file_submissions.facility_id')
				            ->join('admins','admins.id','=','file_submissions.user_fk')
				            ->select('file_submissions.*', 'months.name as month_name', 'programs.name AS program_name', 'm_lib_health_facility.facility_name','admins.first_name','admins.last_name')
				            ->get();
    	}
    	
    	return view('download', $data);
    }

    public function get_download($id){
    	$file_submission = DB::table('file_submissions')
    							->where('id', $id)
					            ->first();

        $file = storage_path() . "/uploads/" . $file_submission->file_name;
        return response()->download($file);

    }

    public function show_search_page(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}
    	$data['post'] = false;
    	$data['programs'] = DB::table('programs')
    							->get();
    	$data['provinces'] = DB::table('provinces')
    							->orderBy("name", 'asc')
    							->get();
		$data['cities'] = DB::table('cities')
								->get();
		$data['months'] = DB::table('months')
								->get();
		$data['years']	= DB::table('file_submissions')
								->groupBy('year')
								->get();

		return view('statistics', $data);
    }

    public function show_table(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	ini_set('max_execution_time', 259200);
    	$data['post'] = true;
    	$data['programs'] = DB::table('programs')
    							->get();
    	$data['provinces'] = DB::table('provinces')
    							->get();
		/*$data['cities'] = DB::table('cities')
								->get();*/
		$data['months'] = DB::table('months')
								->get();
		$data['years']	= DB::table('file_submissions')
								->groupBy('year')
								->get();

    	$program = $request->input('program');
    	$year = $request->input('year');
    	$month1 = $request->input('month1');
    	$month2 = $request->input('month2');
    	//$province = $request->input('province');
    	//$city = $request->input('municipality');
    	$level_of_comparison = $request->input('level_of_comparison');

    	$get_program = DB::table('programs')
							->where('id', $program)
							->first();

		$data['labels']['program']	= $get_program->name;
		$data['labels']['year'] = $year;
		$m_1 = DB::table('months')
					->where('id', $month1)
					->first();
		$m_2 = DB::table('months')
					->where('id', $month2)
					->first();
		$data['labels']['month1'] = $m_1->name;
		$data['labels']['month2'] = $m_2->name;

		$data['indicators'] = DB::table('lib_indicator')
								 ->where('prog_id', $get_program->program_code)
								 ->get();					

		$result = array();
		$link = array();						 
		$data['province_filters'] = null;
		$data['city_filters'] = null;

		//Child Care
		$prog_child_care  = 'SUM(IMM_BCG_M) as IMM_BCG_M, SUM(IMM_BCG_F) as IMM_BCG_F, ';
		$prog_child_care .= 'SUM(IMM_DPT1_M) as IMM_DPT1_M, SUM(IMM_DPT1_F) as IMM_DPT1_F,';
		$prog_child_care .= 'SUM(IMM_DPT2_M) as IMM_DPT2_M, SUM(IMM_DPT2_F) as IMM_DPT2_F,';
		$prog_child_care .= 'SUM(IMM_DPT3_M) as IMM_DPT3_M, SUM(IMM_DPT3_F) as IMM_DPT3_F,';
		$prog_child_care .= 'SUM(IMM_OPV1_M) as IMM_OPV1_M, SUM(IMM_OPV1_F) as IMM_OPV1_F,';
		$prog_child_care .= 'SUM(IMM_OPV2_M) as IMM_OPV2_M, SUM(IMM_OPV2_F) as IMM_OPV2_F,';
		$prog_child_care .= 'SUM(IMM_OPV3_M) as IMM_OPV3_M, SUM(IMM_OPV3_F) as IMM_OPV3_F,';
		$prog_child_care .= 'SUM(IMM_HEPAB1WIN24_M) as IMM_HEPAB1WIN24_M, SUM(IMM_HEPAB1WIN24_F) as IMM_HEPAB1WIN24_F,';
		$prog_child_care .= 'SUM(IMM_HEPAB124_M) as IMM_HEPAB124_M, SUM(IMM_HEPAB124_F) as IMM_HEPAB124_F,';
		$prog_child_care .= 'SUM(IMM_HEPAB2_M) as IMM_HEPAB2_M, SUM(IMM_HEPAB2_F) as IMM_HEPAB2_F,';
		$prog_child_care .= 'SUM(IMM_HEPAB3_M) as IMM_HEPAB3_M, SUM(IMM_HEPAB3_F) as IMM_HEPAB3_F,';
		$prog_child_care .= 'SUM(IMM_MEAS_M) as IMM_MEAS_M, SUM(IMM_MEAS_F) as IMM_MEAS_F,';
		$prog_child_care .= 'SUM(FIC_M) as FIC_M, SUM(FIC_F) as FIC_F,';
		$prog_child_care .= 'SUM(CIC_M) as CIC_M, SUM(CIC_F) as CIC_F,';
		$prog_child_care .= 'SUM(CPB_M) as CPB_M, SUM(CPB_F) as CPB_F,';
		$prog_child_care .= 'SUM(INF_AGE_M) as INF_AGE_M, SUM(INF_AGE_F) as INF_AGE_F,';
		$prog_child_care .= 'SUM(INF_BREAST_M) as INF_BREAST_M, SUM(INF_BREAST_F) as INF_BREAST_F,';
		$prog_child_care .= 'SUM(INF_NEWBS_M) as INF_NEWBS_M, SUM(INF_NEWBS_F) as INF_NEWBS_F,';
		$prog_child_care .= 'SUM(INF_VITA611_M) as INF_VITA611_M, SUM(INF_VITA611_F) as INF_VITA611_F,';
		$prog_child_care .= 'SUM(INF_VITA1259_M) as INF_VITA1259_M, SUM(INF_VITA1259_F) as INF_VITA1259_F,';
		$prog_child_care .= 'SUM(INF_VITA6071_M) as INF_VITA6071_M, SUM(INF_VITA6071_F) as INF_VITA6071_F,';
		$prog_child_care .= 'SUM(SICK_611_M) as SICK_611_M, SUM(SICK_611_F) as SICK_611_F,';
		$prog_child_care .= 'SUM(SICK_1259_M) as SICK_1259_M, SUM(SICK_1259_F) as SICK_1259_F,';
		$prog_child_care .= 'SUM(SICK_6071_M) as SICK_6071_M, SUM(SICK_6071_F) as SICK_6071_F,';
		$prog_child_care .= 'SUM(SICKVITA_611_M) as SICKVITA_611_M, SUM(SICKVITA_611_F) as SICKVITA_611_F,';
		$prog_child_care .= 'SUM(SICKVITA_1259_M) as SICKVITA_1259_M, SUM(SICKVITA_1259_F) as SICKVITA_1259_F,';
		$prog_child_care .= 'SUM(SICKVITA_6071_M) as SICKVITA_6071_M, SUM(SICKVITA_6071_F) as SICKVITA_6071_F,';
		$prog_child_care .= 'SUM(INF26LBWNS_M) as INF26LBWNS_M, SUM(INF26LBWNS_F) as INF26LBWNS_F,';
		$prog_child_care .= 'SUM(INF26FE_M) as INF26FE_M, SUM(INF26FE_F) as INF26FE_F,';
		$prog_child_care .= 'SUM(ANECHILDNS_M) as ANECHILDNS_M, SUM(ANECHILDNS_F) as ANECHILDNS_F,';
		$prog_child_care .= 'SUM(ANECHILDFE_M) as ANECHILDFE_M, SUM(ANECHILDFE_F) as ANECHILDFE_F,';
		$prog_child_care .= 'SUM(DIARRNC_M) as DIARRNC_M, SUM(DIARRNC_F) as DIARRNC_F,';
		$prog_child_care .= 'SUM(DIARRORT_M) as DIARRORT_M, SUM(DIARRORT_F) as DIARRORT_F,';
		$prog_child_care .= 'SUM(DIARRORS_M) as DIARRORS_M, SUM(DIARRORS_F) as DIARRORS_F,';
		$prog_child_care .= 'SUM(DIARRORSZ_M) as DIARRORSZ_M, SUM(DIARRORSZ_F) as DIARRORSZ_F,';
		$prog_child_care .= 'SUM(PNEUNC_M) as PNEUNC_M, SUM(PNEUNC_F) as PNEUNC_F,';
		$prog_child_care .= 'SUM(PNEUGT_M) as PNEUGT_M, SUM(PNEUGT_F) as PNEUGT_F,';
		$prog_child_care .= 'SUM(IMM_PENTA1_M) as IMM_PENTA1_M, SUM(IMM_PENTA1_F) as IMM_PENTA1_F,';
		$prog_child_care .= 'SUM(IMM_PENTA2_M) as IMM_PENTA2_M, SUM(IMM_PENTA2_F) as IMM_PENTA2_F,';
		$prog_child_care .= 'SUM(IMM_PENTA3_M) as IMM_PENTA3_M, SUM(IMM_PENTA3_F) as IMM_PENTA3_F,';
		$prog_child_care .= 'SUM(IMM_MCV1_M) as IMM_MCV1_M, SUM(IMM_MCV1_F) as IMM_MCV1_F,';
		$prog_child_care .= 'SUM(IMM_MCV2_M) as IMM_MCV2_M, SUM(IMM_MCV2_F) as IMM_MCV2_F,';
		$prog_child_care .= 'SUM(IMM_ROTA1_M) as IMM_ROTA1_M, SUM(IMM_ROTA1_F) as IMM_ROTA1_F,';
		$prog_child_care .= 'SUM(IMM_ROTA2_M) as IMM_ROTA2_M, SUM(IMM_ROTA2_F) as IMM_ROTA2_F,';
		$prog_child_care .= 'SUM(IMM_ROTA3_M) as IMM_ROTA3_M, SUM(IMM_ROTA3_F) as IMM_ROTA3_F,';
		$prog_child_care .= 'SUM(IMM_PCV1_M) as IMM_PCV1_M, SUM(IMM_PCV1_F) as IMM_PCV1_F,';
		$prog_child_care .= 'SUM(IMM_PCV2_M) as IMM_PCV2_M, SUM(IMM_PCV2_F) as IMM_PCV2_F,';
		$prog_child_care .= 'SUM(IMM_PCV3_M) as IMM_PCV3_M, SUM(IMM_PCV3_F) as IMM_PCV3_F,';
		$prog_child_care .= 'SUM(LBTOT_M) as LBTOT_M, SUM(LBTOT_F) as LBTOT_F,';
		$prog_child_care .= 'SUM(INF_FOOD_M) as INF_FOOD_M, SUM(INF_FOOD_F) as INF_FOOD_F,';
		$prog_child_care .= 'SUM(INF_VITA1223_M) as INF_VITA1223_M, SUM(INF_VITA1223_F) as INF_VITA1223_F,';
		$prog_child_care .= 'SUM(INF_VITA2435_M) as INF_VITA2435_M, SUM(INF_VITA2435_F) as INF_VITA2435_F,';
		$prog_child_care .= 'SUM(INF_VITA3647_M) as INF_VITA3647_M, SUM(INF_VITA3647_F) as INF_VITA3647_F,';
		$prog_child_care .= 'SUM(INF_VITA4859_M) as INF_VITA4859_M, SUM(INF_VITA4859_F) as INF_VITA4859_F,';
		$prog_child_care .= 'SUM(INF25FE_M) as INF25FE_M, SUM(INF25FE_F) as INF25FE_F,';
		$prog_child_care .= 'SUM(INF611FE_M) as INF611FE_M, SUM(INF611FE_F) as INF611FE_F,';
		$prog_child_care .= 'SUM(INF1223FE_M) as INF1223FE_M, SUM(INF1223FE_F) as INF1223FE_F,';
		$prog_child_care .= 'SUM(INF2435FE_M) as INF2435FE_M, SUM(INF2435FE_F) as INF2435FE_F,';
		$prog_child_care .= 'SUM(INF3647FE_M) as INF3647FE_M, SUM(INF3647FE_F) as INF3647FE_F,';
		$prog_child_care .= 'SUM(INF4859FE_M) as INF4859FE_M, SUM(INF4859FE_F) as INF4859FE_F,';
		$prog_child_care .= 'SUM(INF611MNP_M) as INF611MNP_M, SUM(INF611MNP_F) as INF611MNP_F,';
		$prog_child_care .= 'SUM(INF1223MNP_M) as INF1223MNP_M, SUM(INF1223MNP_F) as INF1223MNP_F,';
		$prog_child_care .= 'SUM(CHILD_1259DW_M) as CHILD_1259DW_M, SUM(CHILD_1259DW_F) as CHILD_1259DW_F,';
		$prog_child_care .= 'SUM(INF26LBWFE_M) as INF26LBWFE_M, SUM(INF26LBWFE_F) as INF26LBWFE_F,';
		$prog_child_care .= 'SUM(ANECHILD611_M) as ANECHILD611_M, SUM(ANECHILD611_F) as ANECHILD611_F,';
		$prog_child_care .= 'SUM(ANECHILD611FE_M) as ANECHILD611FE_M, SUM(ANECHILD611FE_F) as ANECHILD611FE_F,';
		$prog_child_care .= 'SUM(ANECHILD1259_M) as ANECHILD1259_M, SUM(ANECHILD1259_F) as ANECHILD1259_F,';
		$prog_child_care .= 'SUM(ANECHILD1259FE_M) as ANECHILD1259FE_M, SUM(ANECHILD1259FE_F) as ANECHILD1259FE_F, ';
		$prog_child_care .= '(SUM(IMM_BCG_M) + SUM(IMM_BCG_F) +';
		$prog_child_care .= 'SUM(IMM_DPT1_M) + SUM(IMM_DPT1_F) +';
		$prog_child_care .= 'SUM(IMM_DPT2_M) + SUM(IMM_DPT2_F) +';
		$prog_child_care .= 'SUM(IMM_DPT3_M) + SUM(IMM_DPT3_F) +';
		$prog_child_care .= 'SUM(IMM_OPV1_M) + SUM(IMM_OPV1_F) +';
		$prog_child_care .= 'SUM(IMM_OPV2_M) + SUM(IMM_OPV2_F) +';
		$prog_child_care .= 'SUM(IMM_OPV3_M) + SUM(IMM_OPV3_F) +';
		$prog_child_care .= 'SUM(IMM_HEPAB1WIN24_M) + SUM(IMM_HEPAB1WIN24_F) +';
		$prog_child_care .= 'SUM(IMM_HEPAB124_M) + SUM(IMM_HEPAB124_F) +';
		$prog_child_care .= 'SUM(IMM_HEPAB2_M) + SUM(IMM_HEPAB2_F) +';
		$prog_child_care .= 'SUM(IMM_HEPAB3_M) + SUM(IMM_HEPAB3_F) +';
		$prog_child_care .= 'SUM(IMM_MEAS_M) + SUM(IMM_MEAS_F) +';
		$prog_child_care .= 'SUM(FIC_M) + SUM(FIC_F) +';
		$prog_child_care .= 'SUM(CIC_M) + SUM(CIC_F) +';
		$prog_child_care .= 'SUM(CPB_M) + SUM(CPB_F) +';
		$prog_child_care .= 'SUM(INF_AGE_M) + SUM(INF_AGE_F) +';
		$prog_child_care .= 'SUM(INF_BREAST_M) + SUM(INF_BREAST_F) +';
		$prog_child_care .= 'SUM(INF_NEWBS_M) + SUM(INF_NEWBS_F) +';
		$prog_child_care .= 'SUM(INF_VITA611_M) + SUM(INF_VITA611_F) +';
		$prog_child_care .= 'SUM(INF_VITA1259_M) + SUM(INF_VITA1259_F) +';
		$prog_child_care .= 'SUM(INF_VITA6071_M) + SUM(INF_VITA6071_F) +';
		$prog_child_care .= 'SUM(SICK_611_M) + SUM(SICK_611_F) +';
		$prog_child_care .= 'SUM(SICK_1259_M) + SUM(SICK_1259_F) +';
		$prog_child_care .= 'SUM(SICK_6071_M) + SUM(SICK_6071_F) +';
		$prog_child_care .= 'SUM(SICKVITA_611_M) + SUM(SICKVITA_611_F) +';
		$prog_child_care .= 'SUM(SICKVITA_1259_M) + SUM(SICKVITA_1259_F) +';
		$prog_child_care .= 'SUM(SICKVITA_6071_M) + SUM(SICKVITA_6071_F) +';
		$prog_child_care .= 'SUM(INF26LBWNS_M) + SUM(INF26LBWNS_F) +';
		$prog_child_care .= 'SUM(INF26FE_M) + SUM(INF26FE_F) +';
		$prog_child_care .= 'SUM(ANECHILDNS_M) + SUM(ANECHILDNS_F) +';
		$prog_child_care .= 'SUM(ANECHILDFE_M) + SUM(ANECHILDFE_F) +';
		$prog_child_care .= 'SUM(DIARRNC_M) + SUM(DIARRNC_F) +';
		$prog_child_care .= 'SUM(DIARRORT_M) + SUM(DIARRORT_F) +';
		$prog_child_care .= 'SUM(DIARRORS_M) + SUM(DIARRORS_F) +';
		$prog_child_care .= 'SUM(DIARRORSZ_M) + SUM(DIARRORSZ_F) +';
		$prog_child_care .= 'SUM(PNEUNC_M) + SUM(PNEUNC_F) +';
		$prog_child_care .= 'SUM(PNEUGT_M) + SUM(PNEUGT_F) +';
		$prog_child_care .= 'SUM(IMM_PENTA1_M) + SUM(IMM_PENTA1_F) +';
		$prog_child_care .= 'SUM(IMM_PENTA2_M) + SUM(IMM_PENTA2_F) +';
		$prog_child_care .= 'SUM(IMM_PENTA3_M) + SUM(IMM_PENTA3_F) +';
		$prog_child_care .= 'SUM(IMM_MCV1_M) + SUM(IMM_MCV1_F) +';
		$prog_child_care .= 'SUM(IMM_MCV2_M) + SUM(IMM_MCV2_F) +';
		$prog_child_care .= 'SUM(IMM_ROTA1_M) + SUM(IMM_ROTA1_F) +';
		$prog_child_care .= 'SUM(IMM_ROTA2_M) + SUM(IMM_ROTA2_F) +';
		$prog_child_care .= 'SUM(IMM_ROTA3_M) + SUM(IMM_ROTA3_F) +';
		$prog_child_care .= 'SUM(IMM_PCV1_M) + SUM(IMM_PCV1_F) +';
		$prog_child_care .= 'SUM(IMM_PCV2_M) + SUM(IMM_PCV2_F) +';
		$prog_child_care .= 'SUM(IMM_PCV3_M) + SUM(IMM_PCV3_F) +';
		$prog_child_care .= 'SUM(LBTOT_M) + SUM(LBTOT_F) +';
		$prog_child_care .= 'SUM(INF_FOOD_M) + SUM(INF_FOOD_F) +';
		$prog_child_care .= 'SUM(INF_VITA1223_M) + SUM(INF_VITA1223_F) +';
		$prog_child_care .= 'SUM(INF_VITA2435_M) + SUM(INF_VITA2435_F) +';
		$prog_child_care .= 'SUM(INF_VITA3647_M) + SUM(INF_VITA3647_F) +';
		$prog_child_care .= 'SUM(INF_VITA4859_M) + SUM(INF_VITA4859_F) +';
		$prog_child_care .= 'SUM(INF25FE_M) + SUM(INF25FE_F) +';
		$prog_child_care .= 'SUM(INF611FE_M) + SUM(INF611FE_F) +';
		$prog_child_care .= 'SUM(INF1223FE_M) + SUM(INF1223FE_F) +';
		$prog_child_care .= 'SUM(INF2435FE_M) + SUM(INF2435FE_F) +';
		$prog_child_care .= 'SUM(INF3647FE_M) + SUM(INF3647FE_F) +';
		$prog_child_care .= 'SUM(INF4859FE_M) + SUM(INF4859FE_F) +';
		$prog_child_care .= 'SUM(INF611MNP_M) + SUM(INF611MNP_F) +';
		$prog_child_care .= 'SUM(INF1223MNP_M) + SUM(INF1223MNP_F) +';
		$prog_child_care .= 'SUM(CHILD_1259DW_M) + SUM(CHILD_1259DW_F) +';
		$prog_child_care .= 'SUM(INF26LBWFE_M) + SUM(INF26LBWFE_F) +';
		$prog_child_care .= 'SUM(ANECHILD611_M) + SUM(ANECHILD611_F) +';
		$prog_child_care .= 'SUM(ANECHILD611FE_M) + SUM(ANECHILD611FE_F) +';
		$prog_child_care .= 'SUM(ANECHILD1259_M) + SUM(ANECHILD1259_F) +';
		$prog_child_care .= 'SUM(ANECHILD1259FE_M) + SUM(ANECHILD1259FE_F)) as grand_total ';
		$prog_child_care .= 'FROM prog_child_care ';

		//prog_m2_bhs
		$prog_m2_bhs  = 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
		$prog_m2_bhs .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
		$prog_m2_bhs .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
		$prog_m2_bhs .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
		$prog_m2_bhs .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
		$prog_m2_bhs .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
		$prog_m2_bhs .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
		$prog_m2_bhs .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
		$prog_m2_bhs .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
		$prog_m2_bhs .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
		$prog_m2_bhs .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
		$prog_m2_bhs .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
		$prog_m2_bhs .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
		$prog_m2_bhs .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
		$prog_m2_bhs .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
		$prog_m2_bhs .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
		$prog_m2_bhs .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F';

		//prog_maternal_care
		$prog_maternal_care  = 'SUM(PC1) as PC1, SUM(PC2) as PC2,';
		$prog_maternal_care .= 'SUM(PC3) as PC3, SUM(PC4) as PC4,';
		$prog_maternal_care .= 'SUM(PC5) as PC5, SUM(PP1) as PP1,';
		$prog_maternal_care .= 'SUM(PP2) as PP2, SUM(PP3) as PP3,';
		$prog_maternal_care .= 'SUM(PP4) as PP4, SUM(W1049_VITA) as W1049_VITA,';
		$prog_maternal_care .= 'SUM(DELIV) as DELIV, SUM(PREG) as PREG,';
		$prog_maternal_care .= 'SUM(PREG_SYP_TEST) as PREG_SYP_TEST, SUM(PREG_SYP_POSITIVE) as PREG_SYP_POSITIVE,';
		$prog_maternal_care .= 'SUM(PREG_PENICILLIN) as PREG_PENICILLIN, ';
		$prog_maternal_care .= '(SUM(PC1) + SUM(PC2) + SUM(PC3) + SUM(PC4) + ';
		$prog_maternal_care .= 'SUM(PC5) + SUM(PP1) + SUM(PP2) + SUM(PP3) + ';
		$prog_maternal_care .= 'SUM(PP4) + SUM(W1049_VITA) + SUM(DELIV) + SUM(PREG) + ';
		$prog_maternal_care .= 'SUM(PREG_SYP_TEST) + SUM(PREG_SYP_POSITIVE) + SUM(PREG_PENICILLIN)) as grand_total ';
		$prog_maternal_care .= 'FROM prog_maternal_care ';

		//prog_family_planning
		$prog_family_planning  = 'SUM(PREV_FS) as PREV_FS, SUM(PREV_MS) as PREV_MS,';
		$prog_family_planning .= 'SUM(PREV_PILLS) as PREV_PILLS, SUM(PREV_IUD) as PREV_IUD,';
		$prog_family_planning .= 'SUM(PREV_DMPA) as PREV_DMPA, SUM(PREV_NFPCM) as PREV_NFPCM,';
		$prog_family_planning .= 'SUM(PREV_NFPBBT) as PREV_NFPBBT, SUM(PREV_NFPLAM) as PREV_NFPLAM,';
		$prog_family_planning .= 'SUM(PREV_NFPSDM) as PREV_NFPSDM, SUM(PREV_NFPSTM) as PREV_NFPSTM,';
		$prog_family_planning .= 'SUM(PREV_CONDOM) as PREV_CONDOM, SUM(PREV_IMPLANT) as PREV_IMPLANT,';
		$prog_family_planning .= 'SUM(TNA_FS) as TNA_FS, SUM(TNA_MS) as TNA_MS,';
		$prog_family_planning .= 'SUM(TNA_PILLS) as TNA_PILLS, SUM(TNA_IUD) as TNA_IUD,';
		$prog_family_planning .= 'SUM(TNA_DMPA) as TNA_DMPA, SUM(TNA_NFPCM) as TNA_NFPCM,';
		$prog_family_planning .= 'SUM(TNA_NFPBBT) as TNA_NFPBBT, SUM(TNA_NFPLAM) as TNA_NFPLAM,';
		$prog_family_planning .= 'SUM(TNA_NFPSDM) as TNA_NFPSDM, SUM(TNA_NFPSTM) as TNA_NFPSTM,';
		$prog_family_planning .= 'SUM(TNA_CONDOM) as TNA_CONDOM, SUM(TNA_IMPLANT) as TNA_IMPLANT,';
		$prog_family_planning .= 'SUM(TOA_FS) as TOA_FS, SUM(TOA_MS) as TOA_MS,';
		$prog_family_planning .= 'SUM(TOA_PILLS) as TOA_PILLS, SUM(TOA_IUD) as TOA_IUD,';
		$prog_family_planning .= 'SUM(TOA_DMPA) as TOA_DMPA, SUM(TOA_NFPCM) as TOA_NFPCM,';
		$prog_family_planning .= 'SUM(TOA_NFPBBT) as TOA_NFPBBT, SUM(TOA_NFPLAM) as TOA_NFPLAM,';
		$prog_family_planning .= 'SUM(TOA_NFPSDM) as TOA_NFPSDM, SUM(TOA_NFPSTM) as TOA_NFPSTM,';
		$prog_family_planning .= 'SUM(TOA_CONDOM) as TOA_CONDOM, SUM(TOA_IMPLANT) as TOA_IMPLANT,';
		$prog_family_planning .= 'SUM(TDO_FS) as TDO_FS, SUM(TDO_MS) as TDO_MS,';
		$prog_family_planning .= 'SUM(TDO_PILLS) as TDO_PILLS, SUM(TDO_IUD) as TDO_IUD,';
		$prog_family_planning .= 'SUM(TDO_DMPA) as TDO_DMPA, SUM(TDO_NFPCM) as TDO_NFPCM,';
		$prog_family_planning .= 'SUM(TDO_NFPBBT) as TDO_NFPBBT, SUM(TDO_NFPLAM) as TDO_NFPLAM,';
		$prog_family_planning .= 'SUM(TDO_NFPSDM) as TDO_NFPSDM, SUM(TDO_NFPSTM) as TDO_NFPSTM,';
		$prog_family_planning .= 'SUM(TDO_CONDOM) as TDO_CONDOM, SUM(TDO_IMPLANT) as TDO_IMPLANT,';
		$prog_family_planning .= 'SUM(TCU_FS) as TCU_FS, SUM(TCU_MS) as TCU_MS,';
		$prog_family_planning .= 'SUM(TCU_PILLS) as TCU_PILLS, SUM(TCU_IUD) as TCU_IUD,';
		$prog_family_planning .= 'SUM(TCU_DMPA) as TCU_DMPA, SUM(TCU_NFPCM) as TCU_NFPCM,';
		$prog_family_planning .= 'SUM(TCU_NFPBBT) as TCU_NFPBBT, SUM(TCU_NFPLAM) as TCU_NFPLAM,';
		$prog_family_planning .= 'SUM(TCU_NFPSDM) as TCU_NFPSDM, SUM(TCU_NFPSTM) as TCU_NFPSTM,';
		$prog_family_planning .= 'SUM(TCU_CONDOM) as TCU_CONDOM, SUM(TCU_IMPLANT) as TCU_IMPLANT,';
		$prog_family_planning .= 'SUM(TEMP_FS) as TEMP_FS, SUM(TEMP_MS) as TEMP_MS,';
		$prog_family_planning .= 'SUM(TEMP_PILLS) as TEMP_PILLS, SUM(TEMP_IUD) as TEMP_IUD,';
		$prog_family_planning .= 'SUM(TEMP_DMPA) as TEMP_DMPA, SUM(TEMP_NFPCM) as TEMP_NFPCM,';
		$prog_family_planning .= 'SUM(TEMP_NFPBBT) as TEMP_NFPBBT, SUM(TEMP_NFPLAM) as TEMP_NFPLAM,';
		$prog_family_planning .= 'SUM(TEMP_NFPSDM) as TEMP_NFPSDM, SUM(TEMP_NFPSTM) as TEMP_NFPSTM,';
		$prog_family_planning .= 'SUM(TEMP_CONDOM) as TEMP_CONDOM, SUM(TEMP_IMPLANT) as TEMP_IMPLANT, ';
		$prog_family_planning .= '(SUM(PREV_FS) + SUM(PREV_MS) +';
		$prog_family_planning .= 'SUM(PREV_PILLS) + SUM(PREV_IUD) +';
		$prog_family_planning .= 'SUM(PREV_DMPA) + SUM(PREV_NFPCM) +';
		$prog_family_planning .= 'SUM(PREV_NFPBBT) + SUM(PREV_NFPLAM) +';
		$prog_family_planning .= 'SUM(PREV_NFPSDM) + SUM(PREV_NFPSTM) +';
		$prog_family_planning .= 'SUM(PREV_CONDOM) + SUM(PREV_IMPLANT) +';
		$prog_family_planning .= 'SUM(TNA_FS) + SUM(TNA_MS) +';
		$prog_family_planning .= 'SUM(TNA_PILLS) + SUM(TNA_IUD) +';
		$prog_family_planning .= 'SUM(TNA_DMPA) + SUM(TNA_NFPCM) +';
		$prog_family_planning .= 'SUM(TNA_NFPBBT) + SUM(TNA_NFPLAM) +';
		$prog_family_planning .= 'SUM(TNA_NFPSDM) + SUM(TNA_NFPSTM) +';
		$prog_family_planning .= 'SUM(TNA_CONDOM) + SUM(TNA_IMPLANT) +';
		$prog_family_planning .= 'SUM(TOA_FS) + SUM(TOA_MS) +';
		$prog_family_planning .= 'SUM(TOA_PILLS) + SUM(TOA_IUD) +';
		$prog_family_planning .= 'SUM(TOA_DMPA) + SUM(TOA_NFPCM) +';
		$prog_family_planning .= 'SUM(TOA_NFPBBT) + SUM(TOA_NFPLAM) +';
		$prog_family_planning .= 'SUM(TOA_NFPSDM) + SUM(TOA_NFPSTM) +';
		$prog_family_planning .= 'SUM(TOA_CONDOM) + SUM(TOA_IMPLANT) +';
		$prog_family_planning .= 'SUM(TDO_FS) + SUM(TDO_MS) +';
		$prog_family_planning .= 'SUM(TDO_PILLS) + SUM(TDO_IUD) +';
		$prog_family_planning .= 'SUM(TDO_DMPA) + SUM(TDO_NFPCM) +';
		$prog_family_planning .= 'SUM(TDO_NFPBBT) + SUM(TDO_NFPLAM) +';
		$prog_family_planning .= 'SUM(TDO_NFPSDM) + SUM(TDO_NFPSTM) +';
		$prog_family_planning .= 'SUM(TDO_CONDOM) + SUM(TDO_IMPLANT) +';
		$prog_family_planning .= 'SUM(TCU_FS) + SUM(TCU_MS) +';
		$prog_family_planning .= 'SUM(TCU_PILLS) + SUM(TCU_IUD) +';
		$prog_family_planning .= 'SUM(TCU_DMPA) + SUM(TCU_NFPCM) +';
		$prog_family_planning .= 'SUM(TCU_NFPBBT) + SUM(TCU_NFPLAM) +';
		$prog_family_planning .= 'SUM(TCU_NFPSDM) + SUM(TCU_NFPSTM) +';
		$prog_family_planning .= 'SUM(TCU_CONDOM) + SUM(TCU_IMPLANT) +';
		$prog_family_planning .= 'SUM(TEMP_FS) + SUM(TEMP_MS) +';
		$prog_family_planning .= 'SUM(TEMP_PILLS) + SUM(TEMP_IUD) +';
		$prog_family_planning .= 'SUM(TEMP_DMPA) + SUM(TEMP_NFPCM) +';
		$prog_family_planning .= 'SUM(TEMP_NFPBBT) + SUM(TEMP_NFPLAM) +';
		$prog_family_planning .= 'SUM(TEMP_NFPSDM) + SUM(TEMP_NFPSTM) +';
		$prog_family_planning .= 'SUM(TEMP_CONDOM) + SUM(TEMP_IMPLANT)) as grand_total ';
		$prog_family_planning .= 'FROM prog_family_planning ';

		$initial_query = '';
		$prog_id = '';
		if($get_program->tbl_name == 'prog_child_care'){
			$initial_query = $prog_child_care;
			$prog_id = 'childcare';
		}else if($get_program->tbl_name == 'prog_m2_bhs'){
			$initial_query = $prog_m2_bhs;
			$prog_id = 'morbidity';
		}else if($get_program->tbl_name == 'prog_maternal_care'){
			$initial_query = $prog_maternal_care;
			$prog_id = 'mc';
		}else if($get_program->tbl_name == 'prog_family_planning'){
			$initial_query = $prog_family_planning;
			$prog_id = 'fp';
		}

		$data['percent'] = '';
    	if($level_of_comparison == '1'){
    		$province_all = $request->input('province_all');
    		$provinces = array();
    		$cities = null;
    		$show_cities = false;

    		if(sizeof($province_all) > 1){
    			foreach($province_all as $pa){
	    			$provinces[] = DB::table('provinces')
	    							->where('code', $pa)
	    							->first();   
	    		}
    		}else if(sizeof($province_all) == 1){
    			/*$cities = DB::table('cities')
    						->where('prov_code', '=', $province_all[0])
    						->get();*/
    			$cities = DB::table('cities')
    						->select(DB::raw('cities.*'))
    						->distinct()
    						->join('m_lib_health_facility', 'm_lib_health_facility.psgc_citymuncode','=','cities.code')
    						->where("cities.prov_code", '=', $province_all[0])
    						->get();

				$show_cities = true;    						
    		}else{
    			$provinces = DB::table('provinces')
    							->get();
    		}
    		
    		$data['province_filters'] = $provinces;
    		$data['province_cities_filters'] = $cities;
    		$data['show_cities'] = $show_cities;
    		$pr_keys = array();
    		$pr_keys_percent = array();
    		$pr_link = array();
    		$pr_link_percent = array();
    		$pr_ct_keys = array();
    		$pr_ct_keys_percent = array();
    		$pr_ct_link = array();
    		$pr_ct_link_percent = array();
    		$str_provinces = array();
    		$str_cities = array();
    		$all_cities = array();
    		$all_provinces = array();
    		$is_morbidity = false;

    		if($show_cities){
    			foreach($cities as $city){
	    			$str_cities[$city->code] = $city->name;
	    			$all_cities[] = $city->code;
	    		}
	    		$city_counter = 0;
	    		
	    		if($get_program->tbl_name == 'prog_m2_bhs'){
	    			$data['morbidity_fields'] = array('UNDER1_M', 'UNDER1_F', '1_4_M', '1_4_F', '5_9_M', '5_9_F',
	    										      '10_14_M', '10_14_F', '15_19_M', '15_19_F', '20_24_M',
	    										      '20_24_F', '25_29_M', '25_29_F', '30_34_M', '30_34_F',
	    										      '35_39_M', '35_39_F', '40_44_M', '40_44_F', '45_49_M',
	    										      '45_49_F', '50_54_M', '50_54_F', '55_59_M', '55_59_F',
	    										      '60_64_M', '60_64_F', '65ABOVE_M', '65ABOVE_F', '65_69_M',
	    										      '65_69_F', '70_ABOVE_M', '70_ABOVE_F');
	    			$sql  = 'SELECT ICD10_code, ';
					$sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
					$sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
					$sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
					$sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
					$sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
					$sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
					$sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
					$sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
					$sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
					$sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
					$sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
					$sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
					$sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
					$sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
					$sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
					$sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
					$sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
					//Added
					$sql .= '(SUM(UNDER1_M) + SUM(UNDER1_F) + SUM(1_4_M) + SUM(1_4_F) + ';
					$sql .= 'SUM(5_9_M) + SUM(5_9_F) + SUM(10_14_M) + SUM(10_14_F) + ';
					$sql .= 'SUM(15_19_M) + SUM(15_19_F) + SUM(20_24_M) + SUM(20_24_F) + ';
					$sql .= 'SUM(25_29_M) + SUM(25_29_F) + SUM(30_34_M) + SUM(30_34_F) + ';
					$sql .= 'SUM(35_39_M) + SUM(35_39_F) + SUM(40_44_M) + SUM(40_44_F) + ';
					$sql .= 'SUM(45_49_M) + SUM(45_49_F) + SUM(50_54_M) + SUM(50_54_F) + ';
					$sql .= 'SUM(55_59_M) + SUM(55_59_F) + SUM(60_64_M) + SUM(60_64_F) + ';
					$sql .= 'SUM(65ABOVE_M) + SUM(65ABOVE_F) + SUM(65_69_M) + SUM(65_69_F) + ';
					$sql .= 'SUM(70_ABOVE_M) + SUM(70_ABOVE_F)) as grand_total ';
					$sql .= 'FROM prog_m2_bhs ';
					$sql .= 'WHERE (';

	    			foreach($cities as $city){
	    				if(strlen($city->code) <= 5){
	    					$citycode = '0' . $city->code;	
	    				}else{
	    					$citycode = $city->code;
	    				}

	    				if(sizeof($cities) == 1){
	    					$sql .= 'citycode = ' . $citycode;
	    				}else{
	    					if((sizeof($cities) - 1) == $city_counter){
		    					$sql .= 'citycode = ' . $citycode;
		    				}else{
		    					$sql .= 'citycode = ' . $citycode . ' OR ';
		    				}	
	    				}
	    				
				    	++$city_counter;
	    			}
	    			$sql .= ')';
	    			$sql .= ' AND year = "' . $year . '"';
	    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
	    			$sql .= ' GROUP BY ICD10_code';

	    			$get_program_result = DB::select($sql);

	    			$new_result_array = array();
	    			foreach($get_program_result as $key => $value){
	    				if(strpos($value->ICD10_code, '.') != FALSE){
	    					$query = DB::table('m_lib_icd10_en')
	    							->select('diagnosis_code','description')
	    							->where('diagnosis_code', $value->ICD10_code);
	    				}else{
	    					$query = DB::table('m_lib_icd10_en')
	    								->select('diagnosis_code','description')
	    								->where('diagnosis_code', $value->ICD10_code . '.-');
	    				}

	    				if($query->count() > 0){
	    					$query = $query->first();
	    					$value->description = $query->description;
	    					$value->diagnosis_code = $query->diagnosis_code;
	    					$new_result_array[$query->description] = $value;
	    				}
	    			}

	    			$is_morbidity = true;
	    			$data['morbidity_array'] = $new_result_array;
	    			$data['is_morbidity'] = $is_morbidity;
	    			$new_program_result = true;
	    		}else{
	    			$sql = "";
	    			$sql  = 'SELECT citycode,';
					$sql .= $initial_query;
					$all_cities = implode("*", $all_cities);
	    			
	    			$sql .= 'WHERE (';
	    			foreach($cities as $city){
	    				if(strlen($city->code) <= 5){
	    					$citycode = '0' . $city->code;	
	    				}else{
	    					$citycode = $city->code;
	    				}

	    				if(sizeof($cities) == 1){
	    					$sql .= 'citycode = ' . $citycode;
	    				}else{
	    					if((sizeof($cities) - 1) == $city_counter){
		    					$sql .= 'citycode = ' . $citycode;
		    				}else{
		    					$sql .= 'citycode = ' . $citycode . ' OR ';
		    				}	
	    				}
	    				
				    	++$city_counter;
	    			}

	    			$sql .= ')';
	    			$sql .= ' AND year = "' . $year . '"';
	    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
	    			$sql .= ' GROUP BY citycode';

	    			$get_program_result = DB::select($sql);
	    			$new_program_result = array();
	    			$new_result_prov = array();
	    			$indicators = DB::table('lib_indicator')
	    							->where('prog_id', '=', $prog_id)
	    							->get();
	    			$grand_total = array();
	    			foreach($get_program_result as $key => $res){
	    				if($res->citycode[0] == '0'){
	    					$citycode = substr($res->citycode, 1);
	    				}else{
	    					$citycode = $res->citycode;
	    				}

	    				foreach($res as $key => $value){
	    					$new_program_result[$citycode][$key] = $value;
	    				}
	    				
						$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
						$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.barangay_id = m_lib_psgc_code.barangay_id ";
						$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
						$result_sql .= "WHERE municipality_code = '".$citycode."' GROUP BY indicator_code";
						
						$result[$citycode] = DB::select($result_sql);
						
						if(sizeof($result[$citycode]) == 0){
							$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
							$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.area_code = m_lib_psgc_code.barangay_id ";
							$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
							$result_sql .= "WHERE municipality_code = '".$citycode."' GROUP BY indicator_code";
							
							$result[$citycode] = DB::select($result_sql);
						}

						foreach($result[$citycode] as $key => $obj){
							$new_result_prov[$citycode][$obj->indicator_code] = $obj->subtotal;
							$arguments  = $this->get_arguments_city($citycode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
							$arguments2 = $this->get_arguments_percent_city($citycode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
							$link1 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_cities[$citycode] . '/' . $arguments); 
							$link2 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_cities[$citycode] . '/' . $arguments2);
							$pr_link[$citycode][$obj->indicator_code] = $link1;
							$pr_link_percent[$citycode][$obj->indicator_code] = $link2;
						}
	    			}

	    			foreach($indicators as $i){
	    				$link3 = url('show_graph_all/' . $i->indicator_code . '/' . $month1 . '/' . $month2 . '/' . $year . '/' . $all_cities . '/' . $get_program->tbl_name .'/municipality');
						$grand_total[$i->indicator_code] = $link3;
	    			}

	    			$data['grand_total_link'] = $grand_total;
					$data['percent'] = $new_result_prov;
					$data['whole_link'] = $pr_link;
					$data['percent_link'] = $pr_link_percent;
					$data['is_morbidity'] = null;
	    		}
    		}else{
    			foreach($provinces as $province){
	    			$str_provinces[$province->code] = $province->name;
	    			$all_provinces[] = $province->code;
	    		}
	    		$prov_counter = 0;
	    		
	    		if($get_program->tbl_name == 'prog_m2_bhs'){
	    			$data['morbidity_fields'] = array('UNDER1_M', 'UNDER1_F', '1_4_M', '1_4_F', '5_9_M', '5_9_F',
	    										      '10_14_M', '10_14_F', '15_19_M', '15_19_F', '20_24_M',
	    										      '20_24_F', '25_29_M', '25_29_F', '30_34_M', '30_34_F',
	    										      '35_39_M', '35_39_F', '40_44_M', '40_44_F', '45_49_M',
	    										      '45_49_F', '50_54_M', '50_54_F', '55_59_M', '55_59_F',
	    										      '60_64_M', '60_64_F', '65ABOVE_M', '65ABOVE_F', '65_69_M',
	    										      '65_69_F', '70_ABOVE_M', '70_ABOVE_F');
	    			$sql  = 'SELECT ICD10_code, ';
					$sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
					$sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
					$sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
					$sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
					$sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
					$sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
					$sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
					$sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
					$sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
					$sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
					$sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
					$sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
					$sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
					$sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
					$sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
					$sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
					$sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
					//Added
					$sql .= '(SUM(UNDER1_M) + SUM(UNDER1_F) + SUM(1_4_M) + SUM(1_4_F) + ';
					$sql .= 'SUM(5_9_M) + SUM(5_9_F) + SUM(10_14_M) + SUM(10_14_F) + ';
					$sql .= 'SUM(15_19_M) + SUM(15_19_F) + SUM(20_24_M) + SUM(20_24_F) + ';
					$sql .= 'SUM(25_29_M) + SUM(25_29_F) + SUM(30_34_M) + SUM(30_34_F) + ';
					$sql .= 'SUM(35_39_M) + SUM(35_39_F) + SUM(40_44_M) + SUM(40_44_F) + ';
					$sql .= 'SUM(45_49_M) + SUM(45_49_F) + SUM(50_54_M) + SUM(50_54_F) + ';
					$sql .= 'SUM(55_59_M) + SUM(55_59_F) + SUM(60_64_M) + SUM(60_64_F) + ';
					$sql .= 'SUM(65ABOVE_M) + SUM(65ABOVE_F) + SUM(65_69_M) + SUM(65_69_F) + ';
					$sql .= 'SUM(70_ABOVE_M) + SUM(70_ABOVE_F)) as grand_total ';
					$sql .= 'FROM prog_m2_bhs ';
					$sql .= 'WHERE (';

	    			foreach($provinces as $prov){
	    				if(strlen($prov->code) <= 3){
	    					$provcode = '0' . $prov->code;	
	    				}else{
	    					$provcode = $prov->code;
	    				}

	    				if(sizeof($provinces) == 1){
	    					$sql .= 'provcode = ' . $provcode;
	    				}else{
	    					if((sizeof($provinces) - 1) == $prov_counter){
		    					$sql .= 'provcode = ' . $provcode;
		    				}else{
		    					$sql .= 'provcode = ' . $provcode . ' OR ';
		    				}	
	    				}
	    				
				    	++$prov_counter;
	    			}
	    			$sql .= ')';
	    			$sql .= ' AND year = "' . $year . '"';
	    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
	    			$sql .= ' GROUP BY ICD10_code';

	    			$get_program_result = DB::select($sql);

	    			$new_result_array = array();
	    			foreach($get_program_result as $key => $value){
	    				if(strpos($value->ICD10_code, '.') != FALSE){
	    					$query = DB::table('m_lib_icd10_en')
	    							->select('diagnosis_code','description')
	    							->where('diagnosis_code', $value->ICD10_code);
	    				}else{
	    					$query = DB::table('m_lib_icd10_en')
	    								->select('diagnosis_code','description')
	    								->where('diagnosis_code', $value->ICD10_code . '.-');
	    				}

	    				if($query->count() > 0){
	    					$query = $query->first();
	    					$value->description = $query->description;
	    					$value->diagnosis_code = $query->diagnosis_code;
	    					$new_result_array[$query->description] = $value;
	    				}
	    			}

	    			$is_morbidity = true;
	    			$data['morbidity_array'] = $new_result_array;
	    			$data['is_morbidity'] = $is_morbidity;
	    			$new_program_result = true;
	    		}else{
	    			$sql = "";
	    			$sql  = 'SELECT provcode,';
					$sql .= $initial_query;

	    			//$str_provinces = implode("*", $str_provinces);
	    			$all_provinces = implode("*", $all_provinces);
	    			$sql .= 'WHERE (';
	    			foreach($provinces as $prov){
	    				if(strlen($prov->code) <= 3){
	    					$provcode = '0' . $prov->code;	
	    				}else{
	    					$provcode = $prov->code;
	    				}

	    				if(sizeof($provinces) == 1){
	    					$sql .= 'provcode = ' . $provcode;
	    				}else{
	    					if((sizeof($provinces) - 1) == $prov_counter){
		    					$sql .= 'provcode = ' . $provcode;
		    				}else{
		    					$sql .= 'provcode = ' . $provcode . ' OR ';
		    				}	
	    				}
	    				
				    	++$prov_counter;
	    			}

	    			$sql .= ')';
	    			$sql .= ' AND year = "' . $year . '"';
	    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
	    			$sql .= ' GROUP BY provcode';

	    			$get_program_result = DB::select($sql);
	    			$new_program_result = array();
	    			$new_result_prov = array();
	    			$indicators = DB::table('lib_indicator')
	    							->where('prog_id', '=', $prog_id)
	    							->get();
	    			$grand_total = array();				
	    			foreach($get_program_result as $key => $res){
	    				if($res->provcode[0] == '0'){
	    					$provcode = substr($res->provcode, 1);
	    				}else{
	    					$provcode = $res->provcode;
	    				}

	    				foreach($res as $key => $value){
	    					$new_program_result[$provcode][$key] = $value;
	    				}
	    				
						$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
						$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.barangay_id = m_lib_psgc_code.barangay_id ";
						$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
						$result_sql .= "WHERE province_code = '".$provcode."' GROUP BY indicator_code";
						
						$result[$provcode] = DB::select($result_sql);
						
						if(sizeof($result[$provcode]) == 0){
							$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
							$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.area_code = m_lib_psgc_code.barangay_id ";
							$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
							$result_sql .= "WHERE province_code = '".$provcode."' GROUP BY indicator_code";
							
							$result[$provcode] = DB::select($result_sql);	
						}

						foreach($result[$provcode] as $key => $obj){
							$new_result_prov[$provcode][$obj->indicator_code] = $obj->subtotal;
							$arguments  = $this->get_arguments($provcode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
							$arguments2 = $this->get_arguments_percent($provcode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
							$link1 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_provinces[$provcode]. '/' . $arguments); 
							$link2 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_provinces[$provcode]. '/' . $arguments2);
							$pr_link[$provcode][$obj->indicator_code] = $link1;
							$pr_link_percent[$provcode][$obj->indicator_code] = $link2;

						}
	    			}

	    			foreach($indicators as $i){
	    				$link3 = url('show_graph_all/' . $i->indicator_code . '/' . $month1 . '/' . $month2 . '/' . $year . '/' . $all_provinces . '/' . $get_program->tbl_name .'/province');
						$grand_total[$i->indicator_code] = $link3;
	    			}

					$data['percent'] = $new_result_prov;
					$data['whole_link'] = $pr_link;
					$data['percent_link'] = $pr_link_percent;
					$data['grand_total_link'] = $grand_total;
					$data['is_morbidity'] = null;
	    		}
    		}
    	}else if($level_of_comparison == '2'){
    		$municipality_all = $request->input('municipalities');
    		$province_normal = $request->input('province_normal');

    		$cities = array();

    		if(sizeof($municipality_all) > 0){
    			foreach($municipality_all as $ma){
	    			$cities[] = DB::table('cities')
	    							->where('id', $ma)
	    							->first();
	    		}
    		}else{
    			$cities = DB::table('cities')
    							->where('prov_code', $province_normal)
    							->get();
    		}
    		
    		$data['city_filters'] = $cities;
    		$data['province_cities_filters'] = null;
    		$c_keys = array();
    		$c_keys_percent = array();
    		$c_link = array();
    		$c_link_percent = array();
    		$str_cities = array();
    		$all_cities = array();
    		$is_morbidity = false;

    		foreach($cities as $city){
    			$str_cities[$city->code] = $city->name;
    			$all_cities[] = $city->code;
    		}

    		$citycode = 0;
    		//$str_cities = implode("*", $str_cities);
    		$all_cities = implode("*", $all_cities);
    		$city_counter = 0;

    		if($get_program->tbl_name == 'prog_m2_bhs'){
    			$data['morbidity_fields'] = array('UNDER1_M', 'UNDER1_F', '1_4_M', '1_4_F', '5_9_M', '5_9_F',
    										      '10_14_M', '10_14_F', '15_19_M', '15_19_F', '20_24_M',
    										      '20_24_F', '25_29_M', '25_29_F', '30_34_M', '30_34_F',
    										      '35_39_M', '35_39_F', '40_44_M', '40_44_F', '45_49_M',
    										      '45_49_F', '50_54_M', '50_54_F', '55_59_M', '55_59_F',
    										      '60_64_M', '60_64_F', '65ABOVE_M', '65ABOVE_F', '65_69_M',
    										      '65_69_F', '70_ABOVE_M', '70_ABOVE_F');

    			$sql  = 'SELECT ICD10_code, ';
				$sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
				$sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
				$sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
				$sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
				$sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
				$sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
				$sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
				$sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
				$sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
				$sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
				$sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
				$sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
				$sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
				$sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
				$sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
				$sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
				$sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
				//Added
				$sql .= '(SUM(UNDER1_M) + SUM(UNDER1_F) + SUM(1_4_M) + SUM(1_4_F) + ';
				$sql .= 'SUM(5_9_M) + SUM(5_9_F) + SUM(10_14_M) + SUM(10_14_F) + ';
				$sql .= 'SUM(15_19_M) + SUM(15_19_F) + SUM(20_24_M) + SUM(20_24_F) + ';
				$sql .= 'SUM(25_29_M) + SUM(25_29_F) + SUM(30_34_M) + SUM(30_34_F) + ';
				$sql .= 'SUM(35_39_M) + SUM(35_39_F) + SUM(40_44_M) + SUM(40_44_F) + ';
				$sql .= 'SUM(45_49_M) + SUM(45_49_F) + SUM(50_54_M) + SUM(50_54_F) + ';
				$sql .= 'SUM(55_59_M) + SUM(55_59_F) + SUM(60_64_M) + SUM(60_64_F) + ';
				$sql .= 'SUM(65ABOVE_M) + SUM(65ABOVE_F) + SUM(65_69_M) + SUM(65_69_F) + ';
				$sql .= 'SUM(70_ABOVE_M) + SUM(70_ABOVE_F)) as grand_total ';
				$sql .= 'FROM prog_m2_bhs ';
				$sql .= 'WHERE (';
				
    			foreach($cities as $c){
    				if(strlen($c->code) <= 5){
    					$citycode = '0' . $c->code;	
    				}else{
    					$citycode = $c->code;
    				}

    				if(sizeof($cities) == 1){
    					$sql .= 'citycode = ' . $citycode;
    				}else{
    					if((sizeof($cities) - 1) == $city_counter){
	    					$sql .= 'citycode = ' . $citycode;
	    				}else{
	    					$sql .= 'citycode = ' . $citycode . ' OR ';
	    				}	
    				}
    				
			    	++$city_counter;
    			}
    			$sql .= ')';
    			$sql .= ' AND year = "' . $year . '"';
    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
    			$sql .= ' GROUP BY ICD10_code';

    			$get_program_result = DB::select($sql);
    			$new_result_array = array();
    			foreach($get_program_result as $key => $value){
    				if(strpos($value->ICD10_code, '.') != FALSE){
    					$query = DB::table('m_lib_icd10_en')
    							->select('diagnosis_code','description')
    							->where('diagnosis_code', $value->ICD10_code);
    				}else{
    					$query = DB::table('m_lib_icd10_en')
    								->select('diagnosis_code','description')
    								->where('diagnosis_code', $value->ICD10_code . '.-');
    				}

    				if($query->count() > 0){
    					$query = $query->first();
    					$value->description = $query->description;
    					$value->diagnosis_code = $query->diagnosis_code;
    					$new_result_array[$query->description] = $value;
    				}
    			}

    			$is_morbidity = true;
    			$data['morbidity_array'] = $new_result_array;
    			$data['is_morbidity'] = $is_morbidity;
    			$new_program_result = true;
    		}else{
    			$sql = "";
    			$sql  = 'SELECT citycode,';
				$sql .= $initial_query;

    			$sql .= 'WHERE (';
    			foreach($cities as $city){
    				if(strlen($city->code) <= 5){
    					$citycode = '0' . $city->code;	
    				}else{
    					$citycode = $city->code;
    				}

    				if(sizeof($cities) == 1){
    					$sql .= 'citycode = ' . $citycode;
    				}else{
    					if((sizeof($cities) - 1) == $city_counter){
	    					$sql .= 'citycode = ' . $citycode;
	    				}else{
	    					$sql .= 'citycode = ' . $citycode . ' OR ';
	    				}	
    				}
    				
			    	++$city_counter;
    			}

    			$sql .= ')';
    			$sql .= ' AND year = "' . $year . '"';
    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
    			$sql .= ' GROUP BY citycode';

    			$get_program_result = DB::select($sql);
    			$new_program_result = array();
    			$new_result_city = array();
    			$indicators = DB::table('lib_indicator')
    							->where('prog_id', '=', $prog_id)
    							->get();
    			$grand_total = array();
    			foreach($get_program_result as $key => $res){
    				if($res->citycode[0] == '0'){
    					$citycode = substr($res->citycode, 1);
    				}else{
    					$citycode = $res->citycode;
    				}

    				foreach($res as $key => $value){
    					$new_program_result[$citycode][$key] = $value;
    				}
    				
					$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
					$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.barangay_id = m_lib_psgc_code.barangay_id ";
					$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
					$result_sql .= "WHERE municipality_code = '".$citycode."' GROUP BY indicator_code";
					
					$result[$citycode] = DB::select($result_sql);
					
					if(sizeof($result[$citycode]) == 0){
						$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
						$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.area_code = m_lib_psgc_code.barangay_id ";
						$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
						$result_sql .= "WHERE municipality_code = '".$citycode."' GROUP BY indicator_code";
						
						$result[$citycode] = DB::select($result_sql);
					}

					foreach($result[$citycode] as $key => $obj){
						$new_result_city[$citycode][$obj->indicator_code] = $obj->subtotal;
						$arguments  = $this->get_arguments_city($citycode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
						$arguments2 = $this->get_arguments_percent_city($citycode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
						$link1 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_cities[$citycode] . '/' . $arguments); 
						$link2 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_cities[$citycode] . '/' . $arguments2);
						$c_link[$citycode][$obj->indicator_code] = $link1;
						$c_link_percent[$citycode][$obj->indicator_code] = $link2;
					}
    			}
    			
    			foreach($indicators as $i){
    				$link3 = url('show_graph_all/' . $i->indicator_code . '/' . $month1 . '/' . $month2 . '/' . $year . '/' . $all_cities . '/' . $get_program->tbl_name .'/municipality');
					$grand_total[$i->indicator_code] = $link3;
    			}
				$data['percent'] = $new_result_city;
				$data['whole_link'] = $c_link;
				$data['percent_link'] = $c_link_percent;
				$data['is_morbidity'] = null;
				$data['grand_total_link'] = $grand_total;
    		}
    	}else{
    		$health_facilities_all = $request->input('health_facilities');
    		$province_normal = $request->input('province_normal');
    		$health_facilities = array();

    		if(sizeof($health_facilities_all) > 0){
    			foreach($health_facilities_all as $hfa){
	    			$health_facilities[] = DB::table('m_lib_health_facility')
	    							->where('facility_id', $hfa)
	    							->first();
	    		}
    		}else{
    			$health_facilities = DB::table('m_lib_health_facility')
    									->where('psgc_provcode', $province_normal)
    									->get();
    		}

    		$data['health_facility_filters'] = $health_facilities;
    		$data['province_cities_filters'] = null;
			$sum = 0;
			$ccode = '';
			$icode = '';
			$hf = array();
			$hf_keys_percent = array();
    		$hf_link = array();
    		$hf_link_percent = array();
    		$str_health_facilities = array();
    		$all_health_facilities = array();
    		$is_morbidity = false;

    		foreach($health_facilities as $hf){
    			$str_health_facilities[$hf->doh_class_id] = $hf->facility_name;
    			$all_health_facilities[] = $hf->doh_class_id;
    		}

    		//$str_health_facilities = implode("*", $str_health_facilities);
    		$all_health_facilities = implode("*", $all_health_facilities);
    		$hfcounter = 0;

    		if($get_program->tbl_name == 'prog_m2_bhs'){
    			$data['morbidity_fields'] = array('UNDER1_M', 'UNDER1_F', '1_4_M', '1_4_F', '5_9_M', '5_9_F',
    										      '10_14_M', '10_14_F', '15_19_M', '15_19_F', '20_24_M',
    										      '20_24_F', '25_29_M', '25_29_F', '30_34_M', '30_34_F',
    										      '35_39_M', '35_39_F', '40_44_M', '40_44_F', '45_49_M',
    										      '45_49_F', '50_54_M', '50_54_F', '55_59_M', '55_59_F',
    										      '60_64_M', '60_64_F', '65ABOVE_M', '65ABOVE_F', '65_69_M',
    										      '65_69_F', '70_ABOVE_M', '70_ABOVE_F');
    			$sql  = 'SELECT ICD10_code, ';
				$sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
				$sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
				$sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
				$sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
				$sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
				$sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
				$sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
				$sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
				$sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
				$sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
				$sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
				$sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
				$sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
				$sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
				$sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
				$sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
				$sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
				//Added
				$sql .= '(SUM(UNDER1_M) + SUM(UNDER1_F) + SUM(1_4_M) + SUM(1_4_F) + ';
				$sql .= 'SUM(5_9_M) + SUM(5_9_F) + SUM(10_14_M) + SUM(10_14_F) + ';
				$sql .= 'SUM(15_19_M) + SUM(15_19_F) + SUM(20_24_M) + SUM(20_24_F) + ';
				$sql .= 'SUM(25_29_M) + SUM(25_29_F) + SUM(30_34_M) + SUM(30_34_F) + ';
				$sql .= 'SUM(35_39_M) + SUM(35_39_F) + SUM(40_44_M) + SUM(40_44_F) + ';
				$sql .= 'SUM(45_49_M) + SUM(45_49_F) + SUM(50_54_M) + SUM(50_54_F) + ';
				$sql .= 'SUM(55_59_M) + SUM(55_59_F) + SUM(60_64_M) + SUM(60_64_F) + ';
				$sql .= 'SUM(65ABOVE_M) + SUM(65ABOVE_F) + SUM(65_69_M) + SUM(65_69_F) + ';
				$sql .= 'SUM(70_ABOVE_M) + SUM(70_ABOVE_F)) as grand_total ';
				$sql .= 'FROM prog_m2_bhs ';
				$sql .= 'WHERE (';

    			foreach($health_facilities as $hf){
    				if(sizeof($health_facilities) == 1){
    					$sql .= 'HFHUDCODE = "' . $hf->doh_class_id . '"';
    				}else{
    					if((sizeof($health_facilities) - 1) == $hfcounter){
	    					$sql .= 'HFHUDCODE = "' . $hf->doh_class_id . '"';
	    				}else{
	    					$sql .= 'HFHUDCODE = "' . $hf->doh_class_id. '" OR ';
	    				}	
    				}
    				
			    	++$hfcounter;
    			}
    			$sql .= ')';
    			$sql .= ' AND year = "' . $year . '"';
    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
    			$sql .= ' GROUP BY ICD10_code';

    			$get_program_result = DB::select($sql);
    			$new_result_array = array();
    			foreach($get_program_result as $key => $value){
    				if(strpos($value->ICD10_code, '.') != FALSE){
    					$query = DB::table('m_lib_icd10_en')
    							->select('diagnosis_code','description')
    							->where('diagnosis_code', $value->ICD10_code);
    				}else{
    					$query = DB::table('m_lib_icd10_en')
    								->select('diagnosis_code','description')
    								->where('diagnosis_code', $value->ICD10_code . '.-');
    				}

    				if($query->count() > 0){
    					$query = $query->first();
    					$value->description = $query->description;
    					$value->diagnosis_code = $query->diagnosis_code;
    					$new_result_array[$query->description] = $value;
    				}
    			}

    			$is_morbidity = true;
    			$data['morbidity_array'] = $new_result_array;
    			$data['is_morbidity'] = $is_morbidity;
    			$new_program_result = true;
    		}else{
    			$sql = "";
    			$sql  = 'SELECT provcode,HFHUDCODE,';
				$sql .= $initial_query;

    			$sql .= 'WHERE (';
    			foreach($health_facilities as $hf){
    				if(strlen($hf->doh_class_id) <= 3){
    					$HFHUDCODE = '0' . $hf->doh_class_id;	
    				}else{
    					$HFHUDCODE = $hf->doh_class_id;
    				}

    				if(sizeof($health_facilities) == 1){
    					$sql .= 'HFHUDCODE = "' . $HFHUDCODE . '"';
    				}else{
    					if((sizeof($health_facilities) - 1) == $hfcounter){
	    					$sql .= 'HFHUDCODE = "' . $HFHUDCODE . '"';
	    				}else{
	    					$sql .= 'HFHUDCODE = "' . $HFHUDCODE . '" OR ';
	    				}	
    				}
    				
			    	++$hfcounter;
    			}

    			$sql .= ')';
    			$sql .= ' AND year = "' . $year . '"';
    			$sql .= ' AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
    			$sql .= ' GROUP BY HFHUDCODE';

    			$get_program_result = DB::select($sql);
    			$new_program_result = array();
    			$new_result_hf = array();
    			$indicators = DB::table('lib_indicator')
    							->where('prog_id', '=', $prog_id)
    							->get();
    			$grand_total = array();

    			foreach($get_program_result as $key => $res){
    				$HFHUDCODE = $res->HFHUDCODE;
    				$provcode = '';
    				if($res->provcode[0] == '0'){
    					$provcode = substr($res->provcode, 1);
    				}else{
    					$provcode = $res->provcode;
    				}

    				foreach($res as $key => $value){
    					$new_program_result[$HFHUDCODE][$key] = $value;
    				}
    				
					$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
					$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.barangay_id = m_lib_psgc_code.barangay_id ";
					$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
					$result_sql .= "WHERE province_code = '".$provcode."' GROUP BY indicator_code";
					
					$result[$HFHUDCODE] = DB::select($result_sql);
					
					if(sizeof($result[$HFHUDCODE]) == 0){
						$result_sql  = "SELECT indicator_code, (SUM(barangay_population) * (target_pop / 100)) as subtotal FROM m_lib_psgc_code ";
						$result_sql .= "JOIN m_lib_barangay ON m_lib_barangay.area_code = m_lib_psgc_code.barangay_id ";
						$result_sql .= "JOIN lib_indicator ON lib_indicator.prog_id = '" . $prog_id . "' ";
						$result_sql .= "WHERE province_code = '".$provcode."' GROUP BY indicator_code";
						$result[$HFHUDCODE] = DB::select($result_sql);
					}

					foreach($result[$HFHUDCODE] as $key => $obj){
						$new_result_hf[$HFHUDCODE][$obj->indicator_code] = $obj->subtotal;
						$arguments  = $this->get_arguments_hf($HFHUDCODE, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
						$arguments2 = $this->get_arguments_percent_hf($HFHUDCODE, $provcode, $obj->indicator_code, $month1, $month2, $year, $get_program->tbl_name);
						$link1 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_health_facilities[$HFHUDCODE] . '/' . $arguments); 
						$link2 = url('show_graph/' .$obj->indicator_code. '/' .$month1 . '/' . $month2 . '/' . $year . '/' . $str_health_facilities[$HFHUDCODE] . '/' . $arguments2);
						$hf_link[$HFHUDCODE][$obj->indicator_code] = $link1;
						$hf_link_percent[$HFHUDCODE][$obj->indicator_code] = $link2;
					}
    			}

    			foreach($indicators as $i){
    				$link3 = url('show_graph_all/' . $i->indicator_code . '/' . $month1 . '/' . $month2 . '/' . $year . '/' . $all_health_facilities . '/' . $get_program->tbl_name .'/health_facility');
					$grand_total[$i->indicator_code] = $link3;
    			}

				$data['percent'] = $new_result_hf;
				$data['whole_link'] = $hf_link;
				$data['percent_link'] = $hf_link_percent;
				$data['is_morbidity'] = null;
				$data['grand_total_link'] = $grand_total;
    		}
    	}
    	
    	$data['result'] = $new_program_result;
    	$data['link'] = $link;

		return view('statistics', $data);
    }

    private function get_target_population($indicator_code, $initial_population){
    	$get_target_pop = DB::table('lib_indicator')
    						->where('indicator_code', $indicator_code)
    						->first();
		return round($initial_population * ($get_target_pop->target_pop / 100));    						
    }
    
	private function get_arguments($province_code, $indicator, $month1, $month2, $year, $table){
		$arguments = array();
		$province_code = (strlen($province_code) <= 3) ? '0'.$province_code : $province_code;
		$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
	
		$arguments[$start_month] = 0.00;
	    while(($start_month + 1) <= $end_month){
	      $start_month = $start_month + 1;
	      $arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)] = 0.00;
	    }
	
		$sql = "";
		$sql  = "SELECT month, SUM(" . $indicator . ") as " . $indicator . " ";
		$sql .= "FROM " . $table . " WHERE provcode = '" . $province_code . "' ";
		$sql .= "AND year = '" . $year . "' ";
		$sql .= 'AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
		$sql .= "GROUP BY month";

		$result = DB::select($sql);

		foreach($result as $key => $value){
			$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = floatval($value->$indicator);
		}
		
		return implode("*", $arguments);
	}

	private function get_arguments_city($citycode, $indicator, $month1, $month2, $year, $table){
    	$arguments = array();
    	$citycode = (strlen($citycode) <= 5) ? '0'.$citycode : $citycode;
		$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
	
		$arguments[$start_month] = 0.00;
	    while(($start_month + 1) <= $end_month){
	      $start_month = $start_month + 1;
	      $arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)] = 0.00;
	    }
	
		$sql = "";
		$sql  = "SELECT month, SUM(" . $indicator . ") as " . $indicator . " ";
		$sql .= "FROM " . $table . " WHERE citycode = '" . $citycode . "' ";
		$sql .= "AND year = '" . $year . "' ";
		$sql .= 'AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
		$sql .= "GROUP BY month";

		$result = DB::select($sql);

		foreach($result as $key => $value){
			$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = floatval($value->$indicator);
		}
	
		return implode("*", $arguments);
    }

    private function get_arguments_hf($doh_class_id, $indicator, $month1, $month2, $year, $table){
    	$arguments = array();
    	
		$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
	
		$arguments[$start_month] = 0.00;
	    while(($start_month + 1) <= $end_month){
	      $start_month = $start_month + 1;
	      $arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)] = 0.00;
	    }
	
		$sql = "";
		$sql  = "SELECT month, SUM(" . $indicator . ") as " . $indicator . " ";
		$sql .= "FROM " . $table . " WHERE HFHUDCODE = '" . $doh_class_id . "' ";
		$sql .= "AND year = '" . $year . "' ";
		$sql .= 'AND month BETWEEN "' . str_pad($month1, 2, '0', STR_PAD_LEFT) . '" AND "' . str_pad($month2, 2, '0', STR_PAD_LEFT) . '"';
		$sql .= "GROUP BY month";

		$result = DB::select($sql);

		foreach($result as $key => $value){
			$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = floatval($value->$indicator);
		}
	
		return implode("*", $arguments);
    }
    
    private function get_arguments_percent($province_code, $indicator, $month1, $month2, $year, $table){
    	$arguments = array();
    	$province_code = (strlen($province_code) <= 3) ? '0'.$province_code : $province_code;
    	$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
	
		$arguments[$start_month] = 0.00;
	    while(($start_month + 1) <= $end_month){
	      $start_month = $start_month + 1;
	      $arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)] = 0.00;
	    }

		$where = array('year' => $year,
					   'provcode' => $province_code);    		
		$sql = "month, SUM(" . $indicator . ") as " . $indicator;
		$get_program_result = DB::table($table)
								->select(DB::raw($sql))	
    							->where($where)
    							->whereBetween('month', array(str_pad($month1, 2, '0', STR_PAD_LEFT),str_pad($month2, 2, '0', STR_PAD_LEFT)))
    							->groupBy('month')
    							->get();
    	
    	foreach($get_program_result as $key => $value){
    		$initial = ($value->$indicator == null) ? '0' : $value->$indicator;

    		
    		$get_population = DB::table('m_lib_psgc_code')
								 ->select(DB::raw('SUM(barangay_population) as population'))
								 ->join('m_lib_barangay', 'm_lib_barangay.barangay_id', '=' , 'm_lib_psgc_code.barangay_id')
								 ->where('province_code', substr($province_code, 1))
								 ->first();
			
			if($get_population->population == null){
				$get_population = DB::table('m_lib_psgc_code')
									 ->select(DB::raw('SUM(barangay_population) as population'))
									 ->join('m_lib_barangay', 'm_lib_barangay.area_code', '=' , 'm_lib_psgc_code.barangay_id')
									 ->where('province_code', substr($province_code, 1))
									 ->first();
			}

			$target_population = $this->get_target_population($indicator, $get_population->population);
    		
    		if($target_population == null || $target_population == 0){
				$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = 0.00;
			}else{
				$result = number_format((floatval($initial) / floatval($target_population)) * 100, 2);
				$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = ($result == 0) ? 0.00 : floatval($result);
			}
    	}
    	
    	return implode("*", $arguments);
    }

    private function get_arguments_percent_city($citycode, $indicator, $month1, $month2, $year, $table){
    	$arguments = array();
    	$citycode = (strlen($citycode) <= 5) ? '0'.$citycode : $citycode;
    	$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
	
		$arguments[$start_month] = 0.00;
	    while(($start_month + 1) <= $end_month){
	      $start_month = $start_month + 1;
	      $arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)] = 0.00;
	    }

		$where = array('year' => $year,
					   'citycode' => $citycode);    		
		$sql = "month, SUM(" . $indicator . ") as " . $indicator;
		$get_program_result = DB::table($table)
								->select(DB::raw($sql))	
    							->where($where)
    							->whereBetween('month', array(str_pad($month1, 2, '0', STR_PAD_LEFT),str_pad($month2, 2, '0', STR_PAD_LEFT)))
    							->groupBy('month')
    							->get();
    	
    	foreach($get_program_result as $key => $value){
    		$initial = ($value->$indicator == null) ? '0' : $value->$indicator;

    		
    		$get_population = DB::table('m_lib_psgc_code')
								 ->select(DB::raw('SUM(barangay_population) as population'))
								 ->join('m_lib_barangay', 'm_lib_barangay.barangay_id', '=' , 'm_lib_psgc_code.barangay_id')
								 ->where('municipality_code', substr($citycode, 1))
								 ->first();
			

			if($get_population->population == null){
				$get_population = DB::table('m_lib_psgc_code')
									 ->select(DB::raw('SUM(barangay_population) as population'))
									 ->join('m_lib_barangay', 'm_lib_barangay.area_code', '=' , 'm_lib_psgc_code.barangay_id')
									 ->where('municipality_code', substr($citycode, 1))
									 ->first();	
			}

			$target_population = $this->get_target_population($indicator, $get_population->population);
    		
    		if($target_population == null || $target_population == 0){
				$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = 0.00;
			}else{
				$result = number_format((floatval($initial) / floatval($target_population)) * 100, 2);
				$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = ($result == 0) ? 0.00 : floatval($result);
			}
    	}
    	
    	return implode("*", $arguments);
    }

    private function get_arguments_percent_hf($doh_class_id, $provcode, $indicator, $month1, $month2, $year, $table){
    	$arguments = array();
    	$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
	
		$arguments[$start_month] = 0.00;
	    while(($start_month + 1) <= $end_month){
	      $start_month = $start_month + 1;
	      $arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)] = 0.00;
	    }

		$where = array('year' => $year,
					   'HFHUDCODE' => $doh_class_id);    		
		$sql = "month, SUM(" . $indicator . ") as " . $indicator;
		$get_program_result = DB::table($table)
								->select(DB::raw($sql))	
    							->where($where)
    							->whereBetween('month', array(str_pad($month1, 2, '0', STR_PAD_LEFT),str_pad($month2, 2, '0', STR_PAD_LEFT)))
    							->groupBy('month')
    							->get();
    	
    	foreach($get_program_result as $key => $value){
    		$initial = ($value->$indicator == null) ? '0' : $value->$indicator;

    		
    		$get_population = DB::table('m_lib_psgc_code')
								 ->select(DB::raw('SUM(barangay_population) as population'))
								 ->join('m_lib_barangay', 'm_lib_barangay.barangay_id', '=' , 'm_lib_psgc_code.barangay_id')
								 ->where('province_code', $provcode)
								 ->first();

			if($get_population->population == null){
				$get_population = DB::table('m_lib_psgc_code')
									 ->select(DB::raw('SUM(barangay_population) as population'))
									 ->join('m_lib_barangay', 'm_lib_barangay.area_code', '=' , 'm_lib_psgc_code.barangay_id')
									 ->where('province_code', $provcode)
									 ->first();	
			}

			$target_population = $this->get_target_population($indicator, $get_population->population);
    		
    		if($target_population == null || $target_population == 0){
				$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = 0.00;
			}else{
				$result = number_format((floatval($initial) / floatval($target_population)) * 100, 2);
				$arguments[str_pad($value->month, 2, '0', STR_PAD_LEFT)] = ($result == 0) ? 0.00 : floatval($result);
			}
    	}
    	
    	return implode("*", $arguments);
    	/*foreach($health_facilities as $hf){
    		$where = array('year' => $year,
						   'HFHUDCODE' => $hf->doh_class_id);    		
			$sql = "SUM(" . $indicator . ") as " . $indicator;
			$get_program_result = DB::table($table)
									->select(DB::raw($sql))	
	    							->where($where)
	    							->whereBetween('month', array(str_pad($month1, 2, '0', STR_PAD_LEFT),str_pad($month2, 2, '0', STR_PAD_LEFT)))
	    							->first();
	    	$initial = ($get_program_result->$indicator == null) ? '0' : $get_program_result->$indicator; 

	    	$get_population = DB::table('m_lib_psgc_code')
									 ->select(DB::raw('SUM(barangay_population) as population'))
									 ->join('m_lib_barangay', 'm_lib_barangay.barangay_id', '=' , 'm_lib_psgc_code.barangay_id')
									 ->where('province_code', $hf->psgc_provcode)
									 ->first();

			$target_population = $this->get_target_population($indicator, $get_population->population);

			if($target_population == null || $target_population == 0){
				$arguments[] = 0.00;
			}else{
				$arguments[] = number_format((floatval($initial) / floatval($target_population)) * 100, 2);
			}
    	}

    	return implode("*", $arguments);*/
    }

   	public function show_graph($indicator, $month1, $month2, $year, $place, $values){
   		$data['indicator'] = DB::table('lib_indicator')
   								->where('indicator_code','=',$indicator)
   								->first();

		$data['month1'] = DB::table('months')
							->where('id','=', $month1)
							->first();

		$data['month2'] = DB::table('months')
							->where('id','=', $month2)
							->first();

		$data['year'] = $year;
		$data['place'] = $place;
		$data['values'] = explode("*", $values);

		return view('graph', $data);
   	}

   	public function show_graph_all($indicator, $month1, $month2, $year, $places, $table, $type){
   		$data['indicator'] = DB::table('lib_indicator')
   								->where('indicator_code','=',$indicator)
   								->first();

		$data['month1'] = DB::table('months')
							->where('id','=', $month1)
							->first();

		$data['month2'] = DB::table('months')
							->where('id','=', $month2)
							->first();

		$data['year'] = $year;

		$arguments = array();
    	$start_month = str_pad($month1, 2, '0', STR_PAD_LEFT);
		$end_month = str_pad($month2, 2, '0', STR_PAD_LEFT);
    	$months = array();
    	$months[] = $start_month;
		$counter = 0;

		$places = explode('*', $places);
		if($type == 'province'){
			$where = "WHERE (";
			$where2 = "WHERE (";
	    	foreach($places as $place){
	    		$place = (strlen($place) <= 3) ? '0'. $place : $place;	
	    		$arguments[$start_month][$place] = 0.00;
				if(sizeof($places) == 1){
					$where .= 'provcode = ' . $place;
					$where2 .= 'code = ' . $place;
				}else{
					if((sizeof($places) - 1) == $counter){
						$where .= 'provcode = ' . $place;
						$where2 .= 'code = ' . $place;
					}else{
						$where .= 'provcode = ' . $place . ' OR ';
						$where2 .= 'code = ' . $place . ' OR ';
					}	
				}
				
		    	++$counter;	
	    	}
	    	$where .= ') ';
	    	$where2 .= ')';
			
			while(($start_month + 1) <= $end_month){
		      $start_month = $start_month + 1;
		      $months[] = str_pad($start_month, 2, '0', STR_PAD_LEFT);
		      foreach($places as $place){
		      	$place = (strlen($place) <= 3) ? '0'.$place : $place;	
		      	$arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)][$place] = 0.00;
		      }
		    }

		    $provinces = DB::select('SELECT * FROM provinces ' . $where2);
		    $data['graph_data'] = array();
		    $data['graph_names'] = array();
		    foreach($provinces as $province){
		    	$province->code = (strlen($province->code) <= 3) ? '0'. $province->code : $province->code;	
		    	$data['graph_data'][$province->code] = $province->name;
		    	$data['graph_names'][] = $province->name;
		    }

		    foreach($months as $m){
		    	$sql  = "SELECT provcode, SUM(" . $indicator . ") as " . $indicator . " ";
				$sql .= "FROM " . $table . " ";
				$sql .= $where;
				$sql .= "AND year = '" . $year . "' ";
				$sql .= 'AND month = "' . $m . '" ';
				$sql .= "GROUP BY provcode";	

				$result = DB::select($sql);

				foreach($result as $key => $value){
					$arguments[$m][$value->provcode] = floatval($value->$indicator);
				}
		    }
		}else if($type == 'municipality'){
			$where = "WHERE (";
			$where2 = "WHERE (";
	    	foreach($places as $place){
	    		$place = (strlen($place) <= 5) ? '0'. $place : $place;	
	    		$arguments[$start_month][$place] = 0.00;
				if(sizeof($places) == 1){
					$where .= 'citycode = ' . $place;
					$where2 .= 'code = ' . $place;
				}else{
					if((sizeof($places) - 1) == $counter){
						$where .= 'citycode = ' . $place;
						$where2 .= 'code = ' . $place;
					}else{
						$where .= 'citycode = ' . $place . ' OR ';
						$where2 .= 'code = ' . $place . ' OR ';
					}	
				}
				
		    	++$counter;	
	    	}
	    	$where .= ') ';
	    	$where2 .= ')';
			
			while(($start_month + 1) <= $end_month){
		      $start_month = $start_month + 1;
		      $months[] = str_pad($start_month, 2, '0', STR_PAD_LEFT);
		      foreach($places as $place){
		      	$place = (strlen($place) <= 5) ? '0'.$place : $place;	
		      	$arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)][$place] = 0.00;
		      }
		    }

		    $cities = DB::select('SELECT * FROM cities ' . $where2);
		    $data['graph_data'] = array();
		    $data['graph_names'] = array();
		    foreach($cities as $city){
		    	$city->code = (strlen($city->code) <= 5) ? '0'. $city->code : $city->code;	
		    	$data['graph_data'][$city->code] = $city->name;
		    	$data['graph_names'][] = $city->name;
		    }

		    foreach($months as $m){
		    	$sql  = "SELECT citycode, SUM(" . $indicator . ") as " . $indicator . " ";
				$sql .= "FROM " . $table . " ";
				$sql .= $where;
				$sql .= "AND year = '" . $year . "' ";
				$sql .= 'AND month = "' . $m . '" ';
				$sql .= "GROUP BY citycode";	

				$result = DB::select($sql);

				foreach($result as $key => $value){
					$arguments[$m][$value->citycode] = floatval($value->$indicator);
				}
		    }
		}else if($type == 'health_facility'){
			$where = "WHERE (";
			$where2 = "WHERE (";
	    	foreach($places as $place){
	    		$arguments[$start_month][$place] = 0.00;
				if(sizeof($places) == 1){
					$where .= 'HFHUDCODE = "' . $place . '"';
					$where2 .= 'doh_class_id = "' . $place . '"';
				}else{
					if((sizeof($places) - 1) == $counter){
						$where .= 'HFHUDCODE = "' . $place . '"';
						$where2 .= 'doh_class_id = "' . $place . '"';
					}else{
						$where .= 'HFHUDCODE = "' . $place . '" OR ';
						$where2 .= 'doh_class_id = "' . $place . '" OR ';
					}	
				}
				
		    	++$counter;	
	    	}
	    	$where .= ') ';
	    	$where2 .= ')';
			
			while(($start_month + 1) <= $end_month){
		      $start_month = $start_month + 1;
		      $months[] = str_pad($start_month, 2, '0', STR_PAD_LEFT);
		      foreach($places as $place){
		      	$arguments[str_pad($start_month, 2, '0', STR_PAD_LEFT)][$place] = 0.00;
		      }
		    }

		    $health_facilities = DB::select('SELECT * FROM m_lib_health_facility ' . $where2);
		    $data['graph_data'] = array();
		    $data['graph_names'] = array();
		    foreach($health_facilities as $hf){
		    	$hf->doh_class_id = (strlen($hf->doh_class_id) <= 3) ? '0'. $hf->doh_class_id : $hf->doh_class_id;	
		    	$data['graph_data'][$hf->doh_class_id] = $hf->facility_name;
		    	$data['graph_names'][] = $hf->facility_name;
		    }

		    foreach($months as $m){
		    	$sql  = "SELECT HFHUDCODE, SUM(" . $indicator . ") as " . $indicator . " ";
				$sql .= "FROM " . $table . " ";
				$sql .= $where;
				$sql .= "AND year = '" . $year . "' ";
				$sql .= 'AND month = "' . $m . '" ';
				$sql .= "GROUP BY HFHUDCODE";	

				$result = DB::select($sql);

				foreach($result as $key => $value){
					$arguments[$m][$value->HFHUDCODE] = floatval($value->$indicator);
				}
		    }
		}

		$data['arguments'] = $arguments;
		return view('graph_all', $data);
   	}

    public function map(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	$data['years']	= DB::table('file_submissions')
								->groupBy('year')
								->get();
		$data['hf'] = DB::table('m_lib_health_facility')
								->get();
		
    	return view('map', $data);
    }

    public function process_map(Request $request){
    	if(!$request->session()->has('id')){
    		return redirect('login');
    	}

    	$data['years'] = DB::table('file_submissions')
    						->groupBy('year')
    						->get();
		
		$month = $request->input('month');
		$year = $request->input('year');
		$case = $request->input('case');
		$exploded_case = explode("_", $case);

		if($exploded_case[0] == 'morbidity'){
			$sql  = 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total';


			$facilities = DB::table('m_lib_health_facility')
								->get();
			
			$new_morbidity_array = array();
    		$new_morbidity_details = array();
    		$morbidity_type = $this->get_morbidity_type($exploded_case[1]);
    		$str = '';
    		$type_label = '';
    		if($morbidity_type == 'dengue'){
    			$type_label = ' Dengue';
    			$data['morbidity_type'] = 'morbidity_A90';
    			$str  = '<div style="text-align:center;"><strong>Dengue Cases</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> 0</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 1 to 15</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> 15 and above</div>';
    			
    		}else if($morbidity_type == 'auri'){
    			$type_label = ' Acute Upper Respiratory Infection';
    			$data['morbidity_type'] = 'morbidity_J06';
    			$str  = '<div style="text-align:center;font-size:0.8em;"><strong>Acute Upper Respiratory Infection Cases</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> Below 100</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 100 to 300</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> 300 and above</div>';
    		}else{
    			$type_label = 'Diarrhea';
    			$data['morbidity_type'] = 'morbidity_A09';
    			$str  = '<div style="text-align:center;"><strong>Diarrhea Cases</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> 31 and below</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 32 to 60</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> 61 and above</div>';
    		}

			foreach($facilities as $f){
				$where = array('year' => $year,
						   'ICD10_code' => $exploded_case[1],
						   'HFHUDCODE' => $f->doh_class_id);

				$get_result = DB::table('prog_m2_bhs')
								->select(DB::raw($sql))
								->where($where)
								->whereBetween('month', array('01', $month))
								->first();

				$total = ($get_result->total == null) ? 0 : $get_result->total;
				$new_morbidity_array[$f->doh_class_id] = $this->get_morbidity_condition($morbidity_type, $total);
    			$new_morbidity_details[$f->doh_class_id]['name'] = $f->facility_name;
    			$new_morbidity_details[$f->doh_class_id]['longitude'] = $f->longitude;
    			$new_morbidity_details[$f->doh_class_id]['latitude'] = $f->latitude;
    			$new_morbidity_details[$f->doh_class_id]['label']  = '<span>' . $f->facility_name . '</span><br>';
    			$new_morbidity_details[$f->doh_class_id]['label'] .= '<span>' . $type_label . '</span><br>';
    			$new_morbidity_details[$f->doh_class_id]['label'] .= '<span>' . $total . '</span><br>';//Dati may number_format to
			}

    		$data['result'] = $new_morbidity_array;
    		$data['details'] = $new_morbidity_details;
    		$data['error'] = (sizeof($data['result']) > 0) ? null : 'No results found.';
    		$data['d_year'] = $year;
    		$data['month'] = $month;
    		$data['legend'] = $str;
		}else if($exploded_case[0] == 'childcare'){
			$first_indicator  = str_replace('-', '_', $exploded_case[1]);
			$second_indicator = str_replace('-', '_', $exploded_case[2]);
			//$sql  = 'facility_id,facility_name, longitude, latitude, HFHUDCODE,';
			$facilities = DB::table('m_lib_health_facility')
							->get();

			$sql  = 'SUM('.$first_indicator.') as '.$first_indicator.', SUM('.$second_indicator.') as '.$second_indicator.',';			
			$sql .= 'SUM('.$first_indicator.' + '.$second_indicator.') as total';

			
			$prefix = explode('_', $first_indicator);
			$str = '';
			$type_label = '';
    		if($prefix[0] == 'FIC'){
    			$type_label = 'Fully Immunized Child';
    			$data['child_care_type'] = 'childcare_FIC-M_FIC-F';
    			$str  = '<div style="text-align:center;font-size:0.8em;"><strong>FIC Legend</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> 90% and above</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/green_box.png') . '" style="width:30px;height:30px;"/> 70% to 89%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 50% to 69%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> Below 50%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/black_box.png') . '" style="width:30px;height:30px;"/> No reports / Old Version</div>';
    		}else if($prefix[0] == 'CIC'){
    			$type_label = 'Completely Immunized Child';
    			$data['child_care_type'] = 'childcare_CIC-M_CIC-F';
    			$str  = '<div style="text-align:center;font-size:0.8em;"><strong>CIC Legend</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> 90% and above</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/green_box.png') . '" style="width:30px;height:30px;"/> 70% to 89%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 50% to 69%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> Below 50%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/black_box.png') . '" style="width:30px;height:30px;"/> No reports / Old Version</div>';
    		}else{
    			$type_label = 'Exclusively Breastfed';
    			$data['child_care_type'] = 'childcare_INF-BREAST-M_INF-BREAST-F';
    			$str  = '<div style="text-align:center;font-size:0.8em;"><strong>EBF Legend</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> 90% and above</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/green_box.png') . '" style="width:30px;height:30px;"/> 70% to 89%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 50% to 69%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> Below 50%</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/black_box.png') . '" style="width:30px;height:30px;"/> No reports / Old Version</div>';
    		}
    		$new_childcare_array = array();
    		$new_childcare_details = array();

    		//computation
    		$target = $month * 0.00225;

			foreach($facilities as $f){
				$where = array('year' => $year,
							   'HFHUDCODE' => $f->doh_class_id);

				$get_result = DB::table('prog_child_care')
									->select(DB::raw($sql))
	    							->where($where)
	    							->whereBetween('month', array('01', $month))
	    							->first();

	    		$get_target_population = DB::table('m_lib_barangay')
											 ->select(DB::raw('SUM(barangay_population) as population'))
											 ->join('m_lib_health_facility_barangay', 'm_lib_health_facility_barangay.barangay_id', '=' , 'm_lib_barangay.barangay_id')
											 ->where('facility_id', $f->facility_id)
											 ->first();

    			//SELECT SUM(b.barangay_population) AS total FROM m_lib_health_facility_barangay AS a JOIN m_lib_barangay AS b ON a.barangay_id=b.barangay_id WHERE a.facility_id = $facility_id
    			$population_target = $get_target_population->population * $target;
    			if($population_target == 0){
    				$total = 0;
    			}else{
    				if($get_result->total == null){
    					$total = 0;
    				}else{
    					$total = ($get_result->total / ($get_target_population->population	* $target)) * 100;
    				}
    			}

    			$new_childcare_array[$f->doh_class_id] = $this->get_child_care_condition($prefix[0], $total);
    			$new_childcare_details[$f->doh_class_id]['name'] = $f->facility_name;
    			$new_childcare_details[$f->doh_class_id]['longitude'] = $f->longitude;
    			$new_childcare_details[$f->doh_class_id]['latitude'] = $f->latitude;
    			$new_childcare_details[$f->doh_class_id]['label']  = '<span>' . $f->facility_name . '</span><br>';
    			$new_childcare_details[$f->doh_class_id]['label'] .= '<span>' . $type_label . '</span><br>';

    			if($get_result->total == null){
    				$new_childcare_details[$f->doh_class_id]['label'] .= '<span>No report</span>';
    			}else{
    				$new_childcare_details[$f->doh_class_id]['label'] .= '<span>' . number_format($total,4) . '%</span>';
    			}
			}

    		$data['result'] = $new_childcare_array;
    		$data['details'] = $new_childcare_details;
    		$data['error'] = (sizeof($data['result']) > 0) ? null : 'No results found.';
    		$data['d_year'] = $year;
    		$data['month'] = $month;
    		$data['legend'] = $str;
		}else if($exploded_case[0] == 'mc'){
			//$sql  = 'facility_id,facility_name, longitude, latitude, HFHUDCODE,';
			$sql  = 'SUM('.$exploded_case[1].') as '.$exploded_case[1].',';			
			$sql .= 'SUM('.$exploded_case[1].') as total';

			$facilities = DB::table('m_lib_health_facility')
							->get();

			$new_maternalcare_array = array();
    		$new_maternalcare_details = array();
    		//computation
    		$target = $month * 0.00225;

			foreach($facilities as $f){
				$where = array('year' => $year,
							   'HFHUDCODE' => $f->doh_class_id);

				$get_result = DB::table('prog_maternal_care')
									->select(DB::raw($sql))
	    							->where($where)
	    							->whereBetween('month', array('01', $month))
	    							->first();

	    		$get_target_population = DB::table('m_lib_barangay')
											 ->select(DB::raw('SUM(barangay_population) as population'))
											 ->join('m_lib_health_facility_barangay', 'm_lib_health_facility_barangay.barangay_id', '=' , 'm_lib_barangay.barangay_id')
											 ->where('facility_id', $f->facility_id)
											 ->first();

				$population_target = $get_target_population->population * $target;

				if($population_target == 0){
					$total = 0;
				}else{
					if($get_result->total == null){
						$total = 0;
					}else{
						$total = ($get_result->total / ($get_target_population->population * $target)) * 100;
					}
				}							 
    			$new_maternalcare_array[$f->doh_class_id] = $this->get_maternal_care_condition($exploded_case[1], $total);
    			$new_maternalcare_details[$f->doh_class_id]['name'] = $f->facility_name;
    			$new_maternalcare_details[$f->doh_class_id]['longitude'] = $f->longitude;
    			$new_maternalcare_details[$f->doh_class_id]['latitude'] = $f->latitude;
    			$new_maternalcare_details[$f->doh_class_id]['label']  = '<span>' . $f->facility_name . '</span><br>';
    			$new_maternalcare_details[$f->doh_class_id]['label'] .= '<span>Pregnant Women with 4 or more prenatal visits</span><br>';
    			if($get_result->total == null){
    				$new_maternalcare_details[$f->doh_class_id]['label'] .= '<span>No report</span><br />';
    			}else{
    				$new_maternalcare_details[$f->doh_class_id]['label'] .= '<span>' . number_format($total, 4) . '%</span><br />';
    			}
			}

    		$data['result'] = $new_maternalcare_array;
    		$data['details'] = $new_maternalcare_details;
    		$data['error'] = (sizeof($data['result']) > 0) ? null : 'No results found.';
    		$data['d_year'] = $year;
    		$data['month'] = $month;
    		$data['maternal_care_type'] = 'mc_PC1';
    		$str = '';
    		$str  = '<div style="text-align:center;font-size:0.8em;"><strong>PC1 Legend</strong></div>';
			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> 90% and above</div>';
			$str .= '<div><img src="' . asset('public_html/imgs/green_box.png') . '" style="width:30px;height:30px;"/> 70% to 89%</div>';
			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> 50% to 69%</div>';
			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> Below 50%</div>';
			$str .= '<div><img src="' . asset('public_html/imgs/black_box.png') . '" style="width:30px;height:30px;"/> No reports / Old Version</div>';
			$data['legend'] = $str;
		}else if($exploded_case[0] == 'wah'){
			//wah_completeness
			//wah_timeliness

			$facilities = DB::table('m_lib_health_facility')
							  ->get();
			$result = array();
			$result_details = array();

			if($exploded_case[1] == 'completeness'){
				foreach($facilities as $f){
					$month = ($month[0] == '0') ? substr($month, 1) : $month;
					$where2 = array('year' => $year,
									'month' => $month,
									'facility_id' => $f->doh_class_id);

					$get_result = DB::table('file_submissions')
	    							->where($where2);

	    			$result[$f->doh_class_id] = $this->get_completeness_condition($get_result->count(), $get_result->get(), $f->level);
	    			$result_details[$f->doh_class_id]['name'] = $f->facility_name;
	    			$result_details[$f->doh_class_id]['longitude'] = $f->longitude;
	    			$result_details[$f->doh_class_id]['latitude'] = $f->latitude;
	    			$result_details[$f->doh_class_id]['label'] = '<span>' . $f->facility_name . '</span><br>';
	    			//$result_details[$f->doh_class_id]['label'] .= '<span>Completeness</span><br>';
	    			$result_details[$f->doh_class_id]['label'] .= '<span>' . $this->get_completeness_condition_label($get_result->count(), $get_result->get(), $f->level) . '</span><br>';
				}
				
				$data['result'] = $result;
	    		$data['details'] = $result_details;
	    		$data['error'] = (sizeof($data['result']) > 0) ? null : 'No results found.';
	    		$data['d_year'] = $year;
	    		$data['month'] = $month;
				$data['wah_type'] = 'wah_completeness';
				$str = '';
				$str  = '<div style="text-align:center;font-size:0.8em;"><strong>Completeness of Reports Legend</strong></div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> Complete</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> Partially Complete</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> No Report</div>';
				$data['legend'] = $str;
			}else{
				foreach($facilities as $f){
					$month = ($month[0] == '0') ? substr($month, 1) : $month;
					$where2 = array('year' => $year,
									'month' => $month,
									'facility_id' => $f->doh_class_id);

					$on_time  = "SELECT * FROM file_submissions WHERE year = '" . $year . "' AND month = '" . $month . "' AND facility_id = '" . $f->doh_class_id . "' ";
					$get_result_on_time = DB::select($on_time);
					//$on_time .= "AND EXTRACT(DAY FROM date_submitted) BETWEEN '01' AND '07' AND EXTRACT(MONTH FROM date_submitted) = '" . $month . "' AND EXTRACT(YEAR FROM date_submitted) = '" . $year . "'";
					//$get_result_on_time = DB::select('SELECT * FROM file_submissions where year = :year AND month = :month AND facility_id = :facility_id AND EXTRACT(DAY FROM date_submitted) BETWEEN :day1 AND :day2', ['year' => $year, 'month' => $month, 'facility_id' => $f->doh_class_id, 'day1' => '01', 'day2' => '07']);
					//$late  = "SELECT * FROM file_submissions WHERE year = '" . $year . "' AND month = '" . $month . "' AND facility_id = '" . $f->doh_class_id . "' ";
					//$late .= "AND EXTRACT(DAY FROM date_submitted) BETWEEN '08' AND '31' AND EXTRACT(MONTH FROM date_submitted) = '" . $month . "' AND EXTRACT(YEAR FROM date_submitted) = '" . $year . "'";
					//$get_result_late = DB::select($late);
					//$get_result_late = DB::select('SELECT * FROM file_submissions where year = :year AND month = :month AND facility_id = :facility_id AND EXTRACT(DAY FROM date_submitted) BETWEEN :day1 AND :day2', ['year' => $year, 'month' => $month, 'facility_id' => $f->doh_class_id, 'day1' => '08', 'day2' => '31']);
					
					$count_on_time = 0;
					$count_late = 0;
					$on_time_reports = "";
					$late_reports = "";
					$list_programs = array(1 => 'Child Care', 2 => 'Morbidity Diseases', 3 => 'Maternal Care', 4 => 'Family Planning');
					if(sizeof($get_result_on_time) > 0){
						foreach($get_result_on_time as $grot){
							$f_month = date('m', strtotime($grot->date_submitted));
							$f_year = date('Y', strtotime($grot->date_submitted));
							$f_day = date('d', strtotime($grot->date_submitted));

							if($f_month == $month && $f_year == $year && ($f_day >= 01 OR $f_day <= 07)){
								++$count_on_time;
								$on_time_reports .= '<span>' . $list_programs[$grot->program_fk] . ' - ' . $grot->date_submitted . '</span><br>';
							}else{
								++$count_late;
								$late_reports .= '<span>' . $list_programs[$grot->program_fk] . ' - ' . $grot->date_submitted  .'</span><br>';
							}
						}
					}

					$result_type = '';
					if($count_on_time == 4){
						$result_type = 'ontime';
					}else if($count_on_time == 0 AND $count_late > 0){
						$result_type = 'late';
					}else if($count_late == 0 AND $count_on_time > 0){
						$result_type = 'ontime';
					}else if(($count_on_time > 0) && ($count_late > 0) && (($count_on_time >= $count_late) OR ($count_late >= $count_on_time))){
						$result_type = 'late';
					}else if($count_on_time == 0 AND $count_late == 0){
						$result_type = 'noresult';
					}
	    			
	    			$result[$f->doh_class_id] = $this->get_timeliness_condition($result_type);
	    			$result_details[$f->doh_class_id]['name'] = $f->facility_name;
	    			$result_details[$f->doh_class_id]['longitude'] = $f->longitude;
	    			$result_details[$f->doh_class_id]['latitude'] = $f->latitude;
	    			$result_details[$f->doh_class_id]['label'] = '<span>' . $f->facility_name . '</span><br>';
	    			///$result_details[$f->doh_class_id]['label'] .= '<span>Timeliness</span><br>';
	    			$result_details[$f->doh_class_id]['label'] .= '<span>' . $this->get_timeliness_condition_label($result_type, $on_time_reports,$late_reports, $count_on_time, $count_late) . '</span><br>';
				}
				
				$data['result'] = $result;
	    		$data['details'] = $result_details;
	    		$data['error'] = (sizeof($data['result']) > 0) ? null : 'No results found.';
	    		$data['d_year'] = $year;
	    		$data['month'] = $month;
				$data['wah_type'] = 'wah_timeliness';
				$str = '';
				$str  = '<div style="text-align:center;font-size:0.8em;"><strong>Timeliness of Reports Legend</strong></div>';
				$str .= '<div><img src="' . asset('public_html/imgs/blue_box.png') . '" style="width:30px;height:30px;"/> On Time</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/yellow_box.png') . '" style="width:30px;height:30px;"/> Late</div>';
    			$str .= '<div><img src="' . asset('public_html/imgs/red_box.png') . '" style="width:30px;height:30px;"/> No Report</div>';
    			$data['legend'] = $str;
			}
		}

		return view('map', $data);
    }

    public function get_morbidity_type($code){
    	$type = '';
    	switch($code){
    		case "A90":
    			$type = 'dengue';
    			break;

    		case "J06":
    			$type = 'auri';
    			break;

    		case "A09":
    			$type = 'diarrhea';
    			break;
    	}

    	return $type;
    }

    public function get_morbidity_condition($type, $total){
    	$color = '';
    	$total = floatval($total);

    	switch($type){
    		case "dengue":
    			if($total == 0){
    				$color = 'blue';
    			}else if($total >= 1 && $total <= 15){
    				$color = 'yellow';
    			}else if($total > 15){
    				$color = 'red';
    			}
    			break;

    		case "auri":
    			if($total < 100){
    				$color = 'blue';
    			}else if($total > 100 && $total < 300){
    				$color = 'yellow';
    			}else if($total > 300){
    				$color = 'red';
    			}
    			break;

    		case "diarrhea":
    			if($total <= 31){
    				$color = 'blue';
    			}else if($total >= 32 && $total <= 60){
    				$color = 'yellow';
    			}else if($total >= 61){
    				$color = 'red';
    			}
    			break;
    	}

    	return $color;
    }

    public function get_child_care_condition($type, $total){
    	$color = '';
    	$total = floatval($total);

    	switch($type){
    		case "FIC":
    			if($total >= 90){
    				$color = 'blue';
    			}else if($total >= 70 && $total <= 89){
    				$color = 'green';
    			}else if($total >= 50 && $total <= 69){
    				$color = 'yellow';
    			}else if($total < 50 && $total != 0){
    				$color = 'red';
    			}else if($total == 0){
    				$color = 'black';
    			}
    			break;

    		case "CIC":
    			if($total >= 90){
    				$color = 'blue';
    			}else if($total >= 70 && $total <= 89){
    				$color = 'green';
    			}else if($total >= 50 && $total <= 69){
    				$color = 'yellow';
    			}else if($total < 50 && $total != 0){
    				$color = 'red';
    			}else if($total == 0){
    				$color = 'black';
    			}
    			break;

    		case "INF":
    			if($total >= 90){
    				$color = 'blue';
    			}else if($total >= 70 && $total <= 89){
    				$color = 'green';
    			}else if($total >= 50 && $total <= 69){
    				$color = 'yellow';
    			}else if($total < 50 && $total != 0){
    				$color = 'red';
    			}else if($total == 0){
    				$color = 'black';
    			}
    			break;
    	}

    	return $color;
    }

    public function get_maternal_care_condition($type, $total){
    	$color = '';
    	$total = floatval($total);

    	switch($type){
    		case "PC1":
    			if($total >= 90){
    				$color = 'blue';
    			}else if($total >= 70 && $total <= 89){
    				$color = 'green';
    			}else if($total >= 50 && $total <= 69){
    				$color = 'yellow';
    			}else if($total < 50 && $total != 0){
    				$color = 'red';
    			}else if($total == 0){
    				$color = 'black';
    			}
    			break;
    	}

    	return $color;
    }

    public function get_completeness_condition($count, $result, $level){
    	$color = '';
    	$get_program_fks = array();

    	//0 == all
    	//1 == morbidity
    	foreach($result as $r){
			$get_program_fks[] = $r->program_fk;
		}
    	
    	if($level == 0){
    		if($count == 4){
				$color = 'blue';
			}else if($count < 4 && $count > 0){
				$color = 'yellow';
			}else{
				$color = 'red';
			}	
    	}else{
    		if(in_array(2, $get_program_fks)){
    			$color = 'blue';
    		}else{
    			if($count < 4 && $count > 0){
    				$color = 'yellow';
    			}else{
    				$color = 'red';
    			}
    		}
    	}
    	

		return $color; 	
    }

    public function get_completeness_condition_label($count, $result, $level){
    	$label = '';
    	$counter = 0;
    	$get_program_fks = array();
		$programs = array(1 => 'Child Care', 2 => 'Morbidity Diseases', 3 => 'Maternal Care', 4 => 'Family Planning');
		foreach($result as $r){
			$get_program_fks[] = $r->program_fk;
		}

		//0 = All
		//1 = Morbidity
		if($level == 0){
			if($count == 4){
				$label = '<span><b>Complete(4)</b></span><br>';
				$label .= '<span><b>Level 2</b></span><br>';
				$add_label = '';

				foreach($programs as $key => $value){
					$add_label .= '<span>' . $programs[$key] . '</span><br>';
				}

				$label .= $add_label;
			}else if($count < 4 && $count > 0){
				$add_label = '';
				$partial = '';

				foreach($programs as $key => $value){
					if(!in_array($key, $get_program_fks)){
						$add_label .= '<span>' . $programs[$key] . '</span><br>';
					}else{
						$partial .= '<span>' . $programs[$key] . '</span><br>';
						++$counter;
					}
				}

				$label  = '<span><b>Partially Complete('.$counter.')</b></span><br>';
				$label .= '<span><b>Level 2</b></span><br>';
				$label .= $partial;
				$label .= '<span><b>Missing Reports</b></span><br>';
				$label .= $add_label;
			}else{
				$label = '<span><b>No Report(0)</b></span><br>';
				$label .= '<span><b>Level 2</b></span><br>';
				$add_label  = '<span>Child Care</span><br>';
				$add_label .= '<span>Morbidity Diseases</span><br>';
				$add_label .= '<span>Maternal Care</span><br>';
				$add_label .= '<span>Family Planning</span><br>';
				$label .= $add_label;
			}
		}else{
			if($count > 0){
				//Extra checking for morbidity
				$counter = 0;
				$add_label = '';
				$partial = '';
				if(in_array(2, $get_program_fks)){
					foreach($programs as $key => $value){
						if(!in_array($key, $get_program_fks)){
							$add_label .= '<span>' . $programs[$key] . '</span><br>';
						}else{
							$partial .= '<span>' . $programs[$key] . '</span><br>';
							++$counter;
						}
					}

					$label  = '<span><b>Complete('.$counter.')</b></span><br>';
					$label .= '<span><b>Level 1</b></span><br>';
					$label .= $partial;
					$label .= '<span><b>Missing Reports</b></span><br>';
					$label .= $add_label;
					
				}else{
					foreach($programs as $key => $value){
						if(!in_array($key, $get_program_fks)){
							$add_label .= '<span>' . $programs[$key] . '</span><br>';
						}else{
							$partial .= '<span>' . $programs[$key] . '</span><br>';
							++$counter;
						}
					}
					$label  = '<span><b>Partially Complete('.$counter.')</b></span><br>';
					$label .= '<span><b>Level 1</b></span><br>';
					$label .= $partial;
					$label .= '<span><b>Missing Reports</b></span><br>';
					$label .= $add_label;
				}
			}else{
				$label  = '<span><b>No Report(0)</b></span><br>';
				$label .= '<span><b>Level 1</b></span><br>';
				$label .= '<span>Morbidity Diseases</span><br>';
				$label .= '<span>Child Care</span><br>';
				$label .= '<span>Maternal Care</span><br>';
				$label .= '<span>Family Planning</span><br>';
			}
		}

		return $label; 	
    }

    public function get_timeliness_condition($result_type){
    	$color = '';

    	switch($result_type){
    		case "ontime":
    			$color = 'blue';
    			break;

    		case "late":
				$color = 'yellow';
    			break;

    		case "noresult":
    			$color = 'red';
    			break;
    	}
    	return $color;
    }

    public function get_timeliness_condition_label($result_type, $on_time_reports, $late_reports, $count_on_time, $count_late){
    	$label = '';

    	switch($result_type){
    		case "ontime":
    			$label  = '<span><b>On Time</b></span><br>';
    			$label .= $on_time_reports;

    			if($count_late > 0){
    				$label .= '<span><b>Late Reports</b></span><br>';
    				$label .= $late_reports;
    			}
    			break;

    		case "late":
				$label = '';
				$label  = '<span><b>Late Reports</b></span><br>';
				$label .= $late_reports;

				if($count_on_time > 0){
					$label .= '<span><b>On Time</b></span><br>';
					$label .= $on_time_reports;
				}
    			break;

    		case "noresult":
    			$label = 'No Report';
    			break;
    	}
    	return $label;
    }

    public function delete(Request $request, $id){
    	$submission = DB::table('file_submissions')
    					->where('id','=',$id)
    					->first();
		$program = DB::table('programs')
						->where('id','=',$submission->program_fk)
						->first();

		DB::delete('DELETE FROM file_submissions WHERE id = "' . $id . '"');

		$table = '';
		if($program->program_code == 'childcare'){
			$table = 'prog_child_care';
		}else if($program->program_code == 'morbidity'){
			$table = 'prog_m2_bhs';
		}else if($program->program_code == 'mc'){
			$table = 'prog_maternal_care';
		}else{
			$table = 'prog_family_planning';
		}

		$request->session()->put('successful_delete', 'You have successfully deleted ' . $submission->file_name);
		DB::delete('DELETE FROM ' . $table . ' WHERE HFHUDCODE = "' . $submission->facility_id . '" AND year = "' . $submission->year . '" AND month = "' . str_pad($submission->month, 2, '0', STR_PAD_LEFT) . '"');
		return redirect('upload');
    }

    public function get_home(Request $request){
    	if($request->session()->has('id')){
			$data['years']	= DB::table('file_submissions')
									->groupBy('year')
									->orderBy('year', 'desc')
									->get();
			$month = date("m", strtotime("-1 month"));
			$data['y'] = date("Y");
			$where = array('month' => date("m", strtotime("-1 month")),
						   'year' => date("Y"));

			$fic_sql  = 'SELECT facility_name, (((FIC_M + FIC_F) / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_child_care ';
    		$fic_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_child_care.HFHUDCODE ';
    		$fic_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_child_care.BGYCODE ';
    		$fic_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "FIC_M" ';
    		$fic_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
    		$fic_sql .= 'GROUP BY facility_name ';
    		$fic_sql .= 'ORDER BY total DESC ';
    		$fic_sql .= 'LIMIT 10';

    		$cic_sql  = 'SELECT facility_name, (((CIC_M + CIC_F) / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_child_care ';
    		$cic_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_child_care.HFHUDCODE ';
    		$cic_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_child_care.BGYCODE ';
    		$cic_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "CIC_M" ';
    		$cic_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
    		$cic_sql .= 'GROUP BY facility_name ';
    		$cic_sql .= 'ORDER BY total DESC ';
    		$cic_sql .= 'LIMIT 10';

    		$inf_sql  = 'SELECT facility_name, (((INF_BREAST_M + INF_BREAST_F) / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_child_care ';
    		$inf_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_child_care.HFHUDCODE ';
    		$inf_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_child_care.BGYCODE ';
    		$inf_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "INF_BREAST_M" ';
    		$inf_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
    		$inf_sql .= 'GROUP BY facility_name ';
    		$inf_sql .= 'ORDER BY total DESC ';
    		$inf_sql .= 'LIMIT 10';

    		$pc1_sql  = 'SELECT facility_name,((PC1 / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_maternal_care ';
    		$pc1_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_maternal_care.HFHUDCODE ';
    		$pc1_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_maternal_care.BGYCODE ';
    		$pc1_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "PC1" ';
    		$pc1_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
    		$pc1_sql .= 'GROUP BY facility_name ';
    		$pc1_sql .= 'ORDER BY total DESC ';
    		$pc1_sql .= 'LIMIT 10';

    		$dengue_sql  = 'SELECT facility_name, ';
    		$dengue_sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$dengue_sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$dengue_sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$dengue_sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$dengue_sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$dengue_sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$dengue_sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$dengue_sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$dengue_sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$dengue_sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$dengue_sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$dengue_sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$dengue_sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$dengue_sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$dengue_sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$dengue_sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$dengue_sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$dengue_sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$dengue_sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$dengue_sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$dengue_sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$dengue_sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total ';
			$dengue_sql .= 'FROM prog_m2_bhs ';
			$dengue_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_m2_bhs.HFHUDCODE ';
			$dengue_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
			$dengue_sql .= 'AND ICD10_code = "A90" ';
			$dengue_sql .= 'GROUP BY facility_name ';
    		$dengue_sql .= 'ORDER BY total DESC ';
    		$dengue_sql .= 'LIMIT 10';

    		$auri_sql  = 'SELECT facility_name, ';
    		$auri_sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$auri_sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$auri_sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$auri_sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$auri_sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$auri_sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$auri_sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$auri_sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$auri_sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$auri_sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$auri_sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$auri_sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$auri_sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$auri_sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$auri_sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$auri_sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$auri_sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$auri_sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$auri_sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$auri_sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$auri_sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$auri_sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total ';
			$auri_sql .= 'FROM prog_m2_bhs ';
			$auri_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_m2_bhs.HFHUDCODE ';
			$auri_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
			$auri_sql .= 'AND ICD10_code = "J06" ';
			$auri_sql .= 'GROUP BY facility_name ';
    		$auri_sql .= 'ORDER BY total DESC ';
    		$auri_sql .= 'LIMIT 10';

    		$diarrhea_sql  = 'SELECT facility_name, ';
    		$diarrhea_sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$diarrhea_sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$diarrhea_sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$diarrhea_sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$diarrhea_sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$diarrhea_sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$diarrhea_sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$diarrhea_sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$diarrhea_sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$diarrhea_sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$diarrhea_sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$diarrhea_sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$diarrhea_sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$diarrhea_sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$diarrhea_sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$diarrhea_sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$diarrhea_sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$diarrhea_sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$diarrhea_sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$diarrhea_sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$diarrhea_sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$diarrhea_sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total ';
			$diarrhea_sql .= 'FROM prog_m2_bhs ';
			$diarrhea_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_m2_bhs.HFHUDCODE ';
			$diarrhea_sql .= 'WHERE month = "' . $month . '" AND year = "' . $data['y'] . '" ';
			$diarrhea_sql .= 'AND ICD10_code = "A09" ';
			$diarrhea_sql .= 'GROUP BY facility_name ';
    		$diarrhea_sql .= 'ORDER BY total DESC ';
    		$diarrhea_sql .= 'LIMIT 10';

    		$data['FIC'] = DB::select($fic_sql);
    		$data['CIC'] = DB::select($cic_sql);
    		$data['INF'] = DB::select($inf_sql);
    		$data['PC1'] = DB::select($pc1_sql);
    		$data['DENGUE'] = DB::select($dengue_sql);
    		$data['AURI'] = DB::select($auri_sql);
    		$data['DIARRHEA'] = DB::select($diarrhea_sql);

			$data['month'] = DB::table('months')
								->where('id', date("m", strtotime('-1 month')))
								->first();

			
			return view('home', $data);
		}else{
			return redirect('login');
		}
    }

    public function post_home(Request $request){
    	if($request->session()->has('id')){
			$data['years']	= DB::table('file_submissions')
								->groupBy('year')
								->orderBy('year', 'desc')
								->get();

			$year = $request->input('year');
    		$month = $request->input('month');

    		$data['y'] = $year;
    		$where = array('month' => $month,
						   'year' => $year);
    		$fic_sql  = 'SELECT facility_name, (((FIC_M + FIC_F) / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_child_care ';
    		$fic_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_child_care.HFHUDCODE ';
    		$fic_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_child_care.BGYCODE ';
    		$fic_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "FIC_M" ';
    		$fic_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
    		$fic_sql .= 'GROUP BY facility_name ';
    		$fic_sql .= 'ORDER BY total DESC ';
    		$fic_sql .= 'LIMIT 10';

    		$cic_sql  = 'SELECT facility_name, (((CIC_M + CIC_F) / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_child_care ';
    		$cic_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_child_care.HFHUDCODE ';
    		$cic_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_child_care.BGYCODE ';
    		$cic_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "CIC_M" ';
    		$cic_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
    		$cic_sql .= 'GROUP BY facility_name ';
    		$cic_sql .= 'ORDER BY total DESC ';
    		$cic_sql .= 'LIMIT 10';

    		$inf_sql  = 'SELECT facility_name, (((INF_BREAST_M + INF_BREAST_F) / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_child_care ';
    		$inf_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_child_care.HFHUDCODE ';
    		$inf_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_child_care.BGYCODE ';
    		$inf_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "INF_BREAST_M" ';
    		$inf_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
    		$inf_sql .= 'GROUP BY facility_name ';
    		$inf_sql .= 'ORDER BY total DESC ';
    		$inf_sql .= 'LIMIT 10';

    		$pc1_sql  = 'SELECT facility_name, ((PC1 / ROUND((barangay_population * (target_pop/100)), 2)) * 100) as total FROM prog_maternal_care ';
    		$pc1_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_maternal_care.HFHUDCODE ';
    		$pc1_sql .= 'JOIN m_lib_barangay ON m_lib_barangay.barangay_id = prog_maternal_care.BGYCODE ';
    		$pc1_sql .= 'JOIN lib_indicator ON lib_indicator.indicator_code = "PC1" ';
    		$pc1_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
    		$pc1_sql .= 'GROUP BY facility_name ';
    		$pc1_sql .= 'ORDER BY total DESC ';
    		$pc1_sql .= 'LIMIT 10';

    		$dengue_sql  = 'SELECT facility_name, ';
    		$dengue_sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$dengue_sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$dengue_sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$dengue_sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$dengue_sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$dengue_sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$dengue_sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$dengue_sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$dengue_sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$dengue_sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$dengue_sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$dengue_sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$dengue_sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$dengue_sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$dengue_sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$dengue_sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$dengue_sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$dengue_sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$dengue_sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$dengue_sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$dengue_sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$dengue_sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total ';
			$dengue_sql .= 'FROM prog_m2_bhs ';
			$dengue_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_m2_bhs.HFHUDCODE ';
			$dengue_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
			$dengue_sql .= 'AND ICD10_code = "A90" ';
			$dengue_sql .= 'GROUP BY facility_name ';
    		$dengue_sql .= 'ORDER BY total DESC ';
    		$dengue_sql .= 'LIMIT 10';

    		$auri_sql  = 'SELECT facility_name, ';
    		$auri_sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$auri_sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$auri_sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$auri_sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$auri_sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$auri_sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$auri_sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$auri_sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$auri_sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$auri_sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$auri_sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$auri_sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$auri_sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$auri_sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$auri_sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$auri_sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$auri_sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$auri_sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$auri_sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$auri_sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$auri_sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$auri_sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total ';
			$auri_sql .= 'FROM prog_m2_bhs ';
			$auri_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_m2_bhs.HFHUDCODE ';
			$auri_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
			$auri_sql .= 'AND ICD10_code = "J06" ';
			$auri_sql .= 'GROUP BY facility_name ';
    		$auri_sql .= 'ORDER BY total DESC ';
    		$auri_sql .= 'LIMIT 10';

    		$diarrhea_sql  = 'SELECT facility_name, ';
    		$diarrhea_sql .= 'SUM(UNDER1_M) as UNDER1_M, SUM(UNDER1_F) as UNDER1_F,';
			$diarrhea_sql .= 'SUM(1_4_M) as 1_4_M, SUM(1_4_F) as 1_4_F,';
			$diarrhea_sql .= 'SUM(5_9_M) as 5_9_M, SUM(5_9_F) as 5_9_F,';
			$diarrhea_sql .= 'SUM(10_14_M) as 10_14_M, SUM(10_14_F) as 10_14_F,';
			$diarrhea_sql .= 'SUM(15_19_M) as 15_19_M, SUM(15_19_F) as 15_19_F,';
			$diarrhea_sql .= 'SUM(20_24_M) as 20_24_M, SUM(20_24_F) as 20_24_F,';
			$diarrhea_sql .= 'SUM(25_29_M) as 25_29_M, SUM(25_29_F) as 25_29_F,';
			$diarrhea_sql .= 'SUM(30_34_M) as 30_34_M, SUM(30_34_F) as 30_34_F,';
			$diarrhea_sql .= 'SUM(35_39_M) as 35_39_M, SUM(35_39_F) as 35_39_F,';
			$diarrhea_sql .= 'SUM(40_44_M) as 40_44_M, SUM(40_44_F) as 40_44_F,';
			$diarrhea_sql .= 'SUM(45_49_M) as 45_49_M, SUM(45_49_F) as 45_49_F,';
			$diarrhea_sql .= 'SUM(50_54_M) as 50_54_M, SUM(50_54_F) as 50_54_F,';
			$diarrhea_sql .= 'SUM(55_59_M) as 55_59_M, SUM(55_59_F) as 55_59_F,';
			$diarrhea_sql .= 'SUM(60_64_M) as 60_64_M, SUM(60_64_F) as 60_64_F,';
			$diarrhea_sql .= 'SUM(65ABOVE_M) as 65ABOVE_M, SUM(65ABOVE_F) as 65ABOVE_F,';
			$diarrhea_sql .= 'SUM(65_69_M) as 65_69_M, SUM(65_69_F) as 65_69_F,';
			$diarrhea_sql .= 'SUM(70_ABOVE_M) as 70_ABOVE_M, SUM(70_ABOVE_F) as 70_ABOVE_F,';
			$diarrhea_sql .= 'SUM(UNDER1_M + UNDER1_F + 1_4_M + 1_4_F + 5_9_M + 5_9_F + 10_14_M + ';
			$diarrhea_sql .= '10_14_F + 15_19_M + 15_19_F + 20_24_M + 20_24_F + 25_29_M + 25_29_F + ';
			$diarrhea_sql .= '30_34_M + 30_34_F + 35_39_M + 35_39_F + 40_44_M + 40_44_F + 45_49_M + ';
			$diarrhea_sql .= '50_54_M + 50_54_F + 55_59_M + 55_59_F + 60_64_M + 60_64_F + 65ABOVE_M + ';
			$diarrhea_sql .= '65ABOVE_F + 65_69_M + 65_69_F + 65_69_M + 70_ABOVE_F) as total ';
			$diarrhea_sql .= 'FROM prog_m2_bhs ';
			$diarrhea_sql .= 'JOIN m_lib_health_facility ON m_lib_health_facility.doh_class_id = prog_m2_bhs.HFHUDCODE ';
			$diarrhea_sql .= 'WHERE month = "' . $month . '" AND year = "' . $year . '" ';
			$diarrhea_sql .= 'AND ICD10_code = "A09" ';
			$diarrhea_sql .= 'GROUP BY facility_name ';
    		$diarrhea_sql .= 'ORDER BY total DESC ';
    		$diarrhea_sql .= 'LIMIT 10';

    		$data['FIC'] = DB::select($fic_sql);
    		$data['CIC'] = DB::select($cic_sql);
    		$data['INF'] = DB::select($inf_sql);
    		$data['PC1'] = DB::select($pc1_sql);
			$data['DENGUE'] = DB::select($dengue_sql);
    		$data['AURI'] = DB::select($auri_sql);
    		$data['DIARRHEA'] = DB::select($diarrhea_sql);

			$data['month'] = DB::table('months')
								->where('id', $month)
								->first();

			return view('home', $data);	
		}else{
			return redirect('login');
		}
    }
}
