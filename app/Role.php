<?php

namespace App;
use Illuminate\Database\DB;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "role";
    protected $fillable = [
        'name'
    ];

   
    public static function  getRolesListBackend () {
        return \DB::table('role')->pluck('name','id')->toArray();    
    }

    
}
