<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;
use File;

use App\Admin\site_settings_model;
use App\Admin\website_extra_page_model;
use App\Admin\website_extra_page_content;

class WebsiteManage extends Controller
{
    public function basic_settings()
    {
    	$prev_data = site_settings_model::select("site_title","site_logo_path","social_link","email","phone_no","address")
    		->where('id','1')
    		->get()
    		->toArray();

    	return view('AdminView/website_settings', compact('prev_data'));
    }

    public function basic_settings_update(Request $req)
	{
		$title = $req->post('site_title');
		$img_name = "";
		$destination = "";

		$admin_max = $this->admin_max_id();

		if($req->file('site_logo') != "")
		{
			$img = $req->file('site_logo');
			$this->validate($req, [
	            'site_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        ]);
	        $ext = $img->getClientOriginalExtension();
	        $img_name = time()."-site-logo.".$ext;
	        $destination = 'site_image/logo/';
	        // $destination = public_path('site_image/logo');

	        if(!File::isDirectory($destination))
	        {
	        	File::makeDirectory($destination,0777, true, true);
	        }
	        $img->move($destination, $img_name);

	        $resp = site_settings_model::where('id',$admin_max['max_id'])->update(['site_title' => $title, 'site_logo_path' => $destination.$img_name]);
		}
		else
		{
			$resp = site_settings_model::where('id',$admin_max['max_id'])->update(['site_title' => $title]);
		}

        return back()->with('status','Site Basic Settings updated');
	}

	public function social_settings_update(Request $req)
	{
		$fb_link = $req->post('fb_link');
		$linkin_link = $req->post('linkin_link');
		$whats_nub = $req->post('wa_link');

		$array = array("facebook" => $req->post('fb_link'), "linkedin" => $req->post('linkin_link'), "whatsapp" => $req->post('wa_link'));
		$encode = json_encode($array);
		$edited = $this->admin_max_id();

		$resp = site_settings_model::where('id',$edited['max_id'])->update(['social_link' => $encode, 'edited_by' => $edited['admin_id']]);

		return back()->with('status','Site Basic Settings updated');
	}

	public function contact_settings_update(Request $req)
	{
		$cont_email = $req->post('conct_email');
		$cont_phone = $req->post('conct_phno');
		$address = $req->post('address');

		/*$email_array = array("email" => $cont_email);
		$phone_array = array("phone" => $cont_phone);*/

		$email_encode = json_encode($cont_email);
		$phone_encode = json_encode($cont_phone);

		$edited = $this->admin_max_id();

		$resp = site_settings_model::where('id',$edited['max_id'])->update(['email' => $email_encode, 'phone_no' => $phone_encode, 'address' => $address, 'edited_by' => $edited['admin_id']]);

		return back()->with('status','Site Basic Settings updated');
	}

	public function admin_max_id()
	{
		$max_id_sql = site_settings_model::select('id')->get()->toArray();
		$max_id = $max_id_sql[0]['id'];
		$admin_id = session('admin_id');
		$return = array("max_id" => $max_id, "admin_id" => $admin_id);
		return $return;
	}

/*******************************Extra page***********************************************************/
	public function extra_page()
	{
		$extra_page_prev_data = website_extra_page_model::select("id","page_title","page_status","admin_details.first_name","admin_details.last_name","login_id")
			->join('admin_details', 'admin_details.admin_id', '=', 'extra_page.edited_by')
    		->get();
		return view('AdminView/website_extrapage', compact('extra_page_prev_data'));
	}

	public function extra_page_name_check(Request $req)
	{
		$name = $req->post('page_name');
		$page_name = website_extra_page_model::where("page_title",$name)
					->get();
		$count = $page_name->count();
		
		if($count == 0)
		{
			$this->add_page_name($name);
		}
		else
		{
			echo $count;
		}
	}

	public function add_page_name($page_name)
	{
		$edited = $this->admin_max_id();
		$seo_url = $this->seo_url($page_name);

		$extra_page = new website_extra_page_model;
    	$extra_page->page_title = $page_name;
    	$extra_page->edited_by = $edited['admin_id'];
    	$extra_page->seo_url = $seo_url;
    	$extra_page->save();
	}

	public function seo_url($page_name)
    {
        $title_low = strtolower($page_name);
        $str_pttn = "/[0-9_@&()|* ]/";
        $convert_str = preg_replace($str_pttn, "-", $title_low);
        $seo = preg_replace("/--/", '-', $convert_str);
        $last_char = substr($seo, -1);
        if($last_char == "-" || $last_char == "_")
        {
        	$seo = substr($seo, 0, -1);
        }

        $tmp_seo = $seo."%";
        $page_url_count = website_extra_page_model:: select ("seo_url")
        			->where("seo_url","like","$tmp_seo")
					->get();
		$count = $page_url_count->count();
		if($count > 0)
		{
			// $count++;
			$seo = $seo."-".$count;
		}
        return $seo;
    }


    public function extra_page_details($req)
    {
    	$extra_page_prev_data = website_extra_page_model::select("id","page_title","page_image_path","page_content")
			->where("page_title",$req)
    		->get()
    		->toArray();

    	return view('AdminView/website_extrapage_details', compact('extra_page_prev_data'));
    }

    public function extra_page_details_update(Request $req)
    {
    	$page_content = $req->post('page_content');
    	$page_id = $req->post('page_id');
    	$page_title = $req->post('page_title');
    	$edited = $this->admin_max_id();

    	$extra_page_content = new website_extra_page_content;
    	$extra_page_content->page_content = $page_content;
    	$extra_page_content->page_id = $page_id;
    	$extra_page_content->edited_by = $edited['admin_id'];
    	$extra_page_content->save();

    	// return redirect('/super-admin/language/'.$lang_title)->with('status', 'New chapter added');
    	return redirect()->back()->with('status', 'Page content updated');
    }
}
