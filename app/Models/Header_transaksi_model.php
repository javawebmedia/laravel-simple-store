<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Header_transaksi_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('header_transaksi')
            ->select('*')
            ->orderBy('header_transaksi.id_header_transaksi','DESC')
            ->get();
        return $query;
    }

    // client
    public function client($id_client)
    {
        $query = DB::table('header_transaksi')
            ->select('*')
            ->where('id_client',$id_client)
            ->orderBy('header_transaksi.id_header_transaksi','DESC')
            ->get();
        return $query;
    }

    // kode_transaksi
    public function kode_transaksi($kode_transaksi)
    {
        $query = DB::table('header_transaksi')
            ->select('*')
            ->where('kode_transaksi',$kode_transaksi)
            ->orderBy('header_transaksi.id_header_transaksi','DESC')
            ->first();
        return $query;
    }

    // detail
    public function detail($id_header_transaksi)
    {
        $query = DB::table('header_transaksi')
            ->select('*')
            ->where('id_header_transaksi',$id_header_transaksi)
            ->orderBy('header_transaksi.id_header_transaksi','DESC')
            ->first();
        return $query;
    }

    // notifikasi
    public function notifikasi()
    {
        $query = DB::table('header_transaksi')
            ->select(DB::raw('COUNT(id_header_transaksi) as total'))
            ->where('status_bayar','!=','Sudah')
            ->orderBy('header_transaksi.id_header_transaksi','DESC')
            ->first();
        return $query;
    }

    // login
    public function read($slug_header_transaksi)
    {
        $query = DB::table('header_transaksi')
            ->select('*')
            ->where('slug_header_transaksi',$slug_header_transaksi)
            ->orderBy('header_transaksi.id_header_transaksi','DESC')
            ->first();
        return $query;
    }
}
