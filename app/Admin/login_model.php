<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class login_model extends Model
{
    protected $table = 'admin_details';
    protected $primaryKey = 'admin_id';
    /*public $timestmps = false;*/
    /*protected $fillable = ['user_name', 'password'];*/
}
