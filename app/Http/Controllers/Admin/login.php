<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\login_model;
use App\Admin\loginDetails;

// use DB;

class login extends Controller
{
    public function login_check(Request $req)
    {
    	$id = $req->post('email');
    	$pwd = $req->post('password');

    	$salt = login_model::select('salt')->where(['login_id' => $id, 'active_status' => '1'])->first();
    	if(isset($salt))
    	{
    		$salt_value = $salt->toArray();
    		$mod_pass = sha1($pwd.$salt_value['salt']);

    		$get_details = login_model::select('admin_id','admin_type','first_name','last_name')->where(['login_id' => $id, 'pass' => $mod_pass, 'active_status' => '1']);
    		$num_row = $get_details->count();
    		if($num_row == 1)
    		{
    			$admin_detl = $get_details ->first()->toArray();
    			$admin_id = $admin_detl['admin_id'];
                $admin_type = $admin_detl['admin_type'];
                $admin_name = $admin_detl['first_name']." ".$admin_detl['last_name'];
    			$ip = request()->getClientIp();
    			$browser = $_SERVER['HTTP_USER_AGENT'];

    			$admin_log_detl = new loginDetails;
    			$admin_log_detl->admin_id = $admin_id;
    			$admin_log_detl->machine_ip = $ip;
    			$admin_log_detl->browser_details = $browser;
    			$admin_log_detl->save();
    			echo json_encode($num_row);

    			//Cookie::queue('admin_id', $admin_id, 24*60);      // 24*60 = 1Days
    			// $req->session()->push('admin_id', 'developers'); // session into array
    			// $data = $req->session()->all();
    			$req->session()->put('admin_id',$admin_id);
                $req->session()->put('admin_type',$admin_type);
                $req->session()->put('admin_name',$admin_name);
    		}
    		else
    			print_r(json_encode("Sorry! Invalide details given"));
    		/*if($num_row == 1)
    		{
    			$get_details = 
    		}*/
    	}
    	else
    	{
    		print_r(json_encode("Invalide user Id"));
    	}

    	// $r = DB::table('admin_details')->get();
    	/*$r = login_model::select('*')->get()->toArray();
    	print_r($r);*/
    }

    public function dash()
    {
    	// Cookie::get('user_first_name');
    	// dd(url('super-admin/dashboard'));
    	$admin_id = session('admin_id');

    	return view('AdminView/DashBoard');
    }
}
