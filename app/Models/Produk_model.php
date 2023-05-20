<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori',
                    'merek.nama_merek',
                    'merek.slug_merek',
                    'users.nama'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->join('merek', 'merek.id_merek', '=', 'produk.id_merek','LEFT')
            ->join('users', 'users.id_user', '=', 'produk.id_user','LEFT')
            ->orderBy('produk.id_produk','DESC')
            ->get();
        return $query;
    }

    // status_produk
    public function status_produk($status_produk)
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori',
                    'merek.nama_merek',
                    'merek.slug_merek',
                    'users.nama'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->join('merek', 'merek.id_merek', '=', 'produk.id_merek','LEFT')
            ->join('users', 'users.id_user', '=', 'produk.id_user','LEFT')
            ->where('produk.status_produk',$status_produk)
            ->orderBy('produk.id_produk','DESC')
            ->get();
        return $query;
    }

    // read
    public function read($status_produk,$slug_produk)
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori',
                    'merek.nama_merek',
                    'merek.slug_merek',
                    'users.nama'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->join('merek', 'merek.id_merek', '=', 'produk.id_merek','LEFT')
            ->join('users', 'users.id_user', '=', 'produk.id_user','LEFT')
            ->where('produk.status_produk',$status_produk)
            ->where('produk.slug_produk',$slug_produk)
            ->orderBy('produk.id_produk','DESC')
            ->first();
        return $query;
    }

    // home
    public function home($paginate,$status_produk)
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori',
                    'merek.nama_merek',
                    'merek.slug_merek',
                    'users.nama'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->join('merek', 'merek.id_merek', '=', 'produk.id_merek','LEFT')
            ->join('users', 'users.id_user', '=', 'produk.id_user','LEFT')
            ->where('produk.status_produk',$status_produk)
            ->orderBy('produk.id_produk','DESC')
            ->paginate($paginate);
        return $query;
    }

    // home_kategori
    public function home_kategori($paginate,$status_produk,$id_kategori)
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori',
                    'merek.nama_merek',
                    'merek.slug_merek',
                    'users.nama'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->join('merek', 'merek.id_merek', '=', 'produk.id_merek','LEFT')
            ->join('users', 'users.id_user', '=', 'produk.id_user','LEFT')
            ->where('produk.status_produk',$status_produk)
            ->where('produk.id_kategori',$id_kategori)
            ->orderBy('produk.id_produk','DESC')
            ->paginate($paginate);
        return $query;
    }

    // nav_produk
    public function nav_produk($status_produk)
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->where('produk.status_produk',$status_produk)
            ->groupBy('produk.id_kategori')
            ->orderBy('kategori.urutan','ASC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori($id_kategori)
    {
        $query = DB::table('produk')
            ->select('produk.*',
                    'kategori.nama_kategori',
                    'kategori.slug_kategori',
                    'merek.nama_merek',
                    'merek.slug_merek',
                    'users.nama'
                )
            ->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori','LEFT')
            ->join('merek', 'merek.id_merek', '=', 'produk.id_merek','LEFT')
            ->join('users', 'users.id_user', '=', 'produk.id_user','LEFT')
            ->where('produk.id_kategori',$id_kategori)
            ->orderBy('produk.id_produk','DESC')
            ->get();
        return $query;
    }

    // detail
    public function detail($id_produk)
    {
        $query = DB::table('produk')
            ->select('*')
            ->where('id_produk',$id_produk)
            ->orderBy('produk.id_produk','DESC')
            ->first();
        return $query;
    }

    // login
    public function login($produkname,$password)
    {
        $query = DB::table('produk')
            ->select('*')
            ->where([   'produkname'  => $produkname,
                        'password'  => sha1($password)
                    ])
            ->orderBy('produk.id_produk','DESC')
            ->first();
        return $query;
    }
}
