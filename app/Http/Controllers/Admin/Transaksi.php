<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Header_transaksi_model;
use App\Models\Transaksi_model;
use App\Models\Client_model;
use Illuminate\Support\Facades\DB;// Load bawaan fungsi DB laravel
use PDF;

class Transaksi extends Controller
{
    // index
    public function index()
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_header_transaksi     = new Header_transaksi_model();
        $header_transaksi       = $m_header_transaksi->listing();

        $data = [   'title'             => 'Data Transaksi',
                    'header_transaksi'  => $header_transaksi,
                    'content'           => 'admin/transaksi/index'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // detail
    public function detail($id_header_transaksi)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_header_transaksi     = new Header_transaksi_model();
        $m_transaksi            = new Transaksi_model();
        $m_client               = new Client_model();
        $header_transaksi       = $m_header_transaksi->detail($id_header_transaksi);
        $transaksi              = $m_transaksi->kode_transaksi($header_transaksi->kode_transaksi);
        $client                 = $m_client->detail($header_transaksi->id_client);

        $data = [   'title'             => 'Detail Transaksi: '.$header_transaksi->kode_transaksi,
                    'header_transaksi'  => $header_transaksi,
                    'transaksi'         => $transaksi,
                    'client'            => $client,
                    'content'           => 'admin/transaksi/detail'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_header_transaksi)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_header_transaksi     = new Header_transaksi_model();
        $m_transaksi            = new Transaksi_model();
        $m_client               = new Client_model();
        $header_transaksi       = $m_header_transaksi->detail($id_header_transaksi);
        $transaksi              = $m_transaksi->kode_transaksi($header_transaksi->kode_transaksi);
        $client                 = $m_client->detail($header_transaksi->id_client);

        $data = [   'title'             => 'Edit Transaksi: '.$header_transaksi->kode_transaksi,
                    'header_transaksi'  => $header_transaksi,
                    'transaksi'         => $transaksi,
                    'client'            => $client,
                    'content'           => 'admin/transaksi/edit'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // proses 
    public function proses_edit(Request $request)
    {
        DB::table('header_transaksi')->where('id_header_transaksi',$request->id_header_transaksi)->update([
                            'id_user'           => Session()->get('id_user'),
                            'nama_pelanggan'    => $request->nama_pelanggan,
                            'telepon'           => $request->telepon,
                            'email'             => $request->email,
                            'alamat'            => $request->alamat,
                            'status_bayar'      => $request->status_bayar
                ]);
        return redirect('admin/transaksi')->with(['sukses' => 'Data telah diupdate']);
    }

    // cetak
     public function cetak($id_header_transaksi)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_header_transaksi     = new Header_transaksi_model();
        $m_transaksi            = new Transaksi_model();
        $m_client               = new Client_model();
        $header_transaksi       = $m_header_transaksi->detail($id_header_transaksi);
        $transaksi              = $m_transaksi->kode_transaksi($header_transaksi->kode_transaksi);
        $client                 = $m_client->detail($header_transaksi->id_client);

        $data = [   'title'             => 'Detail Transaksi: '.$header_transaksi->kode_transaksi,
                    'header_transaksi'  => $header_transaksi,
                    'transaksi'         => $transaksi,
                    'client'            => $client,
                ];
        // setting pdf
        $config = [
            'format' => 'A4-P', 
                  ];
        $pdf        = PDF::loadview('admin/transaksi/cetak', $data,[] ,$config);
        $nama_file  = 'transaksi '.$header_transaksi->kode_transaksi.' '.date('d-m-Y').'.pdf';
        // langsung download
        // return $pdf->download($nama_file, 'D');
        // preview
        return $pdf->stream($nama_file);
    }

    // proses
    public function proses(Request $request)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $id_header_transaksi    = $request->id_header_transaksi;
        // check klo belum milih data
        if(empty($id_header_transaksi)) {
            return redirect('admin/transaksi')->with(['warning' => 'Anda belum memilih produk']);
        }
        // proses
        if(isset($_POST['hapus'])) {
            // proses hapus produk
            for($i=0; $i < sizeof($id_header_transaksi);$i++) {
                DB::table('header_transaksi')->where('id_header_transaksi',$id_header_transaksi[$i])->delete();
            }
            return redirect('admin/transaksi')->with(['sukses' => 'Data telah dihapus']);
        }elseif(isset($_POST['update'])) {
            // proses update akses level produk
            for($i=0; $i < sizeof($id_header_transaksi);$i++) {
                DB::table('header_transaksi')->where('id_header_transaksi',$id_header_transaksi[$i])->update([
                            'id_user'           => Session()->get('id_user'),
                            'status_bayar'      => $request->status_bayar
                ]);
            }
            return redirect('admin/transaksi')->with(['sukses' => 'Data telah diupdate']);
        }
    }

    // delele
    public function delete($id_header_transaksi)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        DB::table('header_transaksi')->where('id_header_transaksi',$id_header_transaksi)->delete();
        return redirect('admin/transaksi')->with(['sukses' => 'Data transaksi telah dihapus']);
    }
}
