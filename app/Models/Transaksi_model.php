<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('transaksi')
            ->select('*')
            ->orderBy('transaksi.id_transaksi', 'DESC')
            ->get();
        return $query;
    }

    //kode_transaksi
    public function kode_transaksi($kode_transaksi)
    {
        $query = DB::table('transaksi')
            ->select('*')
            ->where('kode_transaksi', $kode_transaksi)
            ->orderBy('transaksi.id_transaksi', 'DESC')
            ->get(); //untuk menampilkan 1 data
        return $query;
    }

    //detail
    public function detail($id_transaksi)
    {
        $query = DB::table('transaksi')
            ->select('*')
            ->where('id_transaksi', $id_transaksi)
            ->orderBy('transaksi.id_transaksi', 'DESC')
            ->first(); //untuk menampilkan 1 data
        return $query;
    }

    //read
    public function read($slug_transaksi)
    {
        $query = DB::table('transaksi')
            ->select('*')
            ->where('slug_transaksi', $slug_transaksi)
            ->orderBy('transaksi.id_transaksi', 'DESC')
            ->first(); //untuk menampilkan 1 data
        return $query;
    }
}