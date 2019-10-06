<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class home extends Controller
{
    public function contact_details()
    {
        $site_details = DB::table('site_settings')->select('social_link','email','phone_no','address')->get()->toArray();
        return $site_details;
    }

    public function show_home()
    {
    	/* Show programming language */
    	$language_detl = DB::table('language')->select('language_id','title','seo_slug')->where('active_status','1')->orderBy('serial_no','asc')->take(5)->get()->toArray();
    	// print_r($language_detl);
    	$page = "home";
        $contact_details = $this->contact_details();
    	return view('UserView/index', compact('page','contact_details','language_detl'));
    	/* /Show programming language */
    }

    public function show_more_lang()
    {
    	/* Show programming language */
    	$language_detl = DB::table('language')->select('language_id','title','seo_slug')->where('active_status','1')->orderBy('serial_no','asc')->get()->toArray();
    	// print_r($language_detl);
    	$page = "language";
        $contact_details = $this->contact_details();
    	return view('UserView/learning', compact('page','contact_details','language_detl'));
    	/* /Show programming language */
    }

    public function show_lang_details($req)
    {
    	$seo_url_req = $req;

    	$language_detl = DB::table('language')->select('language_id','title')->where('seo_slug',$seo_url_req)->orderBy('serial_no','asc')->get()->toArray();
    	$lang_title = $language_detl[0]->title;
    	$lang_id = $language_detl[0]->language_id;

    	$language_chapter_detl = DB::table('language_chapter')->select('chapter_id','chapter_title','chapter_describe')->where([['language_id','=',$lang_id],['active_status','=','1']])->orderBy('serial_no','asc')->get()->toArray();

    	$page = "language";
        $contact_details = $this->contact_details();
    	return view('UserView/learning_details', compact('page','contact_details','lang_title','language_chapter_detl'));
    }

    public function login_reg()
    {
    	$page = "login";
        $contact_details = $this->contact_details();
    	return view('UserView/log_reg', compact('page','contact_details'));
    }
}
