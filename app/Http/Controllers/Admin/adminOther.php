<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \Illuminate\Database\QueryException;

use DB;


class adminOther extends Controller
{
    public function admin_permission()
    {
    	if((!empty(session('admin_id'))) && (session('admin_type') == 'superadmin'))
    	{
    		$admin = DB::table('admin_details')->select('admin_id', 'first_name', 'last_name', 'login_id', 'created_at')->get()->toArray();
    		print_r($admin);
    		return view('AdminView/admin_manage', compact('admin'));
    	}
    	else
    		return view('AdminView/NoPermission');
    }

    public function user_manage()
    {
    	if((!empty(session('admin_id'))) && (session('admin_type') == 'superadmin'))
    	{
    		$admin = DB::table('admin_details')->select('admin_id', 'first_name', 'last_name', 'login_id', 'created_at')->get()->toArray();
    		print_r($admin);
    		return view('AdminView/admin_manage', compact('admin'));
    	}
    	else
    		return view('AdminView/NoPermission');
    }

    public function show_project()
    {
    	return view('AdminView/project');
    }

    public function show_language()
    {
    	$language_details = DB::select( DB::raw("SELECT lang.*, admin.admin_id as admin_id, admin.first_name as admin_fname, admin.last_name as admin_lname, admin.login_id as login_id FROM language lang LEFT JOIN admin_details admin ON lang.language_added = admin.admin_id ORDER BY lang.language_id DESC") );
    	return view('AdminView/language', compact('language_details'));
    }

    public function seo_url($language_title)
    {
        $title_low = strtolower($language_title);
        $str_pttn = "/[0-9_@&()*]/";
        $convert_str = preg_replace($str_pttn, "-", $title_low);
        $seo = preg_replace("/--/", '-', $convert_str);
        return $seo;
    }

    public function add_language(Request $req)
    {
    	// print_r($req->input());
    	$language_title = $req->input('language_title');
    	try
    	{
            $seo_url = $this->seo_url($language_title);
    		$resp = DB::insert('INSERT INTO language(title,language_added,seo_slug) VALUES(?,?,?)', [$language_title,session('admin_id'),$seo_url]);
    		if($resp == 1)
    		{
    			return redirect('/super-admin/language/'.$language_title);
    		}
    	}
    	catch(QueryException $e)
    	{
    		// print_r($e->getMessage());
    		return redirect()->back()->withInput()->withErrors('Language name already inserted.');
    	}
    	/*catch(\Illuminate\Database\QueryException $e)
    	{
    		print_r($e->getMessage());
    	}*/
    }

    public function add_language_details($req)
    {
    	/*echo $req;
    	print_r("Language details");*/
    	
    	$language['title'] = $req;
    	return view('AdminView/language_details', compact('language'));
    }

    public function chng_status(Request $req)
    {
        $lang_id = $req->post('languageid');
        $status = $req->post('action');

        if($status == "deactive")
        {
            $status = DB::table('language')->where('language_id',$lang_id)->update(array("active_status"=>"0"));
            print_r(json_encode($status));
        }
        else if($status == "active")
        {
            $status = DB::table('language')->where('language_id',$lang_id)->update(array("active_status"=>"1"));
            print_r(json_encode($status));
        }
    }

    public function chng_sl_no(Request $req)
    {
        $langu_id = $req->post('language_id');
        $slno = $req->post('sl_no');
        $this->validate($req, [
            'sl_no' => 'unique:language,serial_no',
        ]);
        $chg_slno = DB::table('language')->where('language_id',$langu_id)->update(array("serial_no"=>$slno));
        print_r($chg_slno);
    }
}
