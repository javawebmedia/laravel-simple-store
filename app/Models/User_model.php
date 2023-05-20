<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('users')
            ->select('*')
            ->orderBy('users.id_user','DESC')
            ->get();
        return $query;
    }

    // detail
    public function detail($id_user)
    {
        $query = DB::table('users')
            ->select('*')
            ->where('id_user',$id_user)
            ->orderBy('users.id_user','DESC')
            ->first();
        return $query;
    }

    // login
    public function login($username,$password)
    {
        $query = DB::table('users')
            ->select('*')
            ->where([   'username'  => $username,
                        'password'  => sha1($password)
                    ])
            ->orderBy('users.id_user','DESC')
            ->first();
        return $query;
    }
}
