<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client_model;
use App\Models\Transaksi_model;
use App\Models\Header_transaksi_model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;// Load bawaan fungsi DB laravel
use Image;

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

    // konfirmasi
    public function konfirmasi()
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

        $data = [   'title'                 => 'Konfirmasi Pembayaran',
                    'keywords'              => 'Konfirmasi Pembayaran',
                    'description'           => 'Konfirmasi Pembayaran',
                    'header_transaksi'      => $header_transaksi,
                    'content'               => 'dasbor/konfirmasi'
                ];
        return view('layout/wrapper',$data);
    }

    // proses konfirmasi
    public function proses_konfirmasi(Request $request)
    {
        // proteksi halaman
        if(Session()->get('username_client')=="") { 
            $last_page = url()->full();
            return redirect('signin?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_transaksi            = new Transaksi_model();
        $m_header_transaksi     = new Header_transaksi_model();

        // end proteksi halaman
        request()->validate([
            'jumlah_bayar'  => 'required',
            'bukti_bayar'   => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                          = $request->file('bukti_bayar');
        if(!empty($image)) {
            $filenamewithextension      = $request->file('bukti_bayar')->getClientOriginalName();
            $filename                   = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['bukti_bayar']       = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath            = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'greyscale' => false
            ));
            $img->save($destinationPath.'/'.$input['bukti_bayar']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['bukti_bayar']);
        // END UPLOAD
            DB::table('header_transaksi')->where('id_header_transaksi',$request->id_header_transaksi)->update([
                'cara_bayar'        => 'Transfer',
                'status_bayar'      => 'Konfirmasi',
                'jumlah_bayar'      => $request->jumlah_bayar,
                'bukti_bayar'       => $input['bukti_bayar'],
                'tanggal_bayar'     => date('Y-m-d',strtotime($request->tanggal_bayar))
            ]);
        }else{
            DB::table('header_transaksi')->where('id_header_transaksi',$request->id_header_transaksi)->update([
                'cara_bayar'        => 'Transfer',
                'status_bayar'      => 'Konfirmasi',
                'jumlah_bayar'      => $request->jumlah_bayar,
                // 'bukti_bayar'       => $input['bukti_bayar'],
                'tanggal_bayar'     => date('Y-m-d',strtotime($request->tanggal_bayar))
            ]);
        }
        return redirect('dasbor')->with(['sukses' => 'Data konfirmasi telah diupdate']);
    }
}
