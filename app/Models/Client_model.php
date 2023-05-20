<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('client')
            ->select('*')
            ->orderBy('client.id_client','DESC')
            ->get();
        return $query;
    }

    // check
    public function check($email)
    {
        $query = DB::table('client')
            ->select('*')
            ->where('email',$email)
            ->orderBy('client.id_client','DESC')
            ->first();
        return $query;
    }

    // detail
    public function detail($id_client)
    {
        $query = DB::table('client')
            ->select('*')
            ->where('id_client',$id_client)
            ->orderBy('client.id_client','DESC')
            ->first();
        return $query;
    }

    // login
    public function login($username,$password)
    {
        $query = DB::table('client')
            ->select('*')
            ->where([   'email'     => $username,
                        'password'  => sha1($password)
                    ])
            ->orderBy('client.id_client','DESC')
            ->first();
        return $query;
    }
}
