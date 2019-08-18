<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\language_chapter_model;
use DB;

class language_chapter extends Controller
{
    public function add_language_details($req)
    {
    	/*echo $req;
    	print_r("Language details");*/
    	
    	$language['title'] = $req;
    	$get_language_id = DB::select( DB::raw("SELECT language_id FROM language WHERE title = '$req' ") );
    	// print_r($get_language_id);

    	$chapter_details = language_chapter_model::select('*')->where('language_id', $get_language_id[0]->language_id)->orderBy('serial_no', 'asc')->get()->toArray();
    	// print_r($chapter_details);
    	$chapter = $chapter_details;
    	$language['language_id'] = $get_language_id[0]->language_id;
    	return view('AdminView/language_details', compact('language', 'chapter'));
    }

    public function add_chapter_details(Request $req)
    {
    	// print_r($req->all());
    	$msg = [
    		'required' => 'All fields are required'
    	];
    	$this->validate($req, [
    		'chapter_title' => 'required',
    		'sl_no' => 'required',
    	], $msg);
    	$chapter_title = $req->post('chapter_title');
    	$chapter_sl_no = $req->post('sl_no');
    	$chapter_details = $req->post('chater_desc');
    	$lang_id = $req->post('language_id');
    	$admin_id = session('admin_id');
    	
    	$chapter = new language_chapter_model;
    	$chapter->chapter_title = $chapter_title;
    	$chapter->chapter_describe = $chapter_details;
    	$chapter->serial_no = $chapter_sl_no;
    	$chapter->language_id = $lang_id;
    	$chapter->chapter_added = $admin_id;
    	$chapter->save();

    	$lang_title = $req->post('language_title');
    	return redirect('/super-admin/language/'.$lang_title)->with('status', 'New chapter added');
    }

    /*Edit chapter name*/

    public function edit_chapter_name(Request $req)
    {
    	$new_name = $req->post('new_name');
    	$chapter_id = $req->post('chapter_id');

    	$status = language_chapter_model::where('chapter_id', $chapter_id)->update([
    		'chapter_title' => $new_name
    	]);
    	print_r($status);
    }

    public function edit_chapter_slno(Request $req)
    {
    	$chapter_id = $req->post('chapter_id');
    	$sl_no = $req->post('sl_no');

    	$status = language_chapter_model::where('chapter_id', $chapter_id)->update([
    		'serial_no' => $sl_no
    	]);
    	print_r($status);
    }

    public function edit_chapter_defination(Request $req)
    {
    	$def = $req->post('chap_def');
    	$chapter_id = $req->post('chapter_id');

    	$status = language_chapter_model::where('chapter_id', $chapter_id)->update([
    		'chapter_describe' => $def
    	]);
    	print_r($status);
    }

    /* /Edit chapter name*/
}
