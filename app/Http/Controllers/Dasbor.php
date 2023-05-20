<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client_model;
use App\Models\Transaksi_model;
use App\Models\Header_transaksi_model;

class Dasbor extends Controller
{
    // index
    public function index()
    {
        // proteksi halaman
        if(Session()->get('username_client')=="") { 
            $last_page = url()->full();
            return redirect('signin?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_transaksi            = new Transaksi_model();
        $m_header_transaksi     = new Header_transaksi_model();
        $header_transaksi       = $m_header_transaksi->client(Session()->get('id_client'));

        $data = [   'title'                 => 'Halaman Dashboard Client',
                    'keywords'              => 'Halaman Dashboard Client',
                    'description'           => 'Halaman Dashboard Client',
                    'header_transaksi'      => $header_transaksi,
                    'content'               => 'dasbor/index'
                ];
        return view('layout/wrapper',$data);
    }
}
