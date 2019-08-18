<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class loginDetails extends Model
{
    protected $table = 'admin_login';
    protected $primaryKey = 'login_id';
    /*public $timestmps = false;*/
    /*protected $fillable = ['user_name', 'password'];*/
}
