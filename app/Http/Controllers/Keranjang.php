<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;// Load bawaan fungsi DB laravel
use App\Models\Konfigurasi_model;
use App\Models\Produk_model;
use App\Models\Kategori_model;
use App\Models\Client_model;
use App\Models\Header_transaksi_model;
use App\Models\Transaksi_model;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Support\Str;

class Keranjang extends Controller
{
    // index
    public function index()
    {
        $m_site     = new Konfigurasi_model();
        $m_produk   = new Produk_model();
        $site       = $m_site->listing();
        $keranjang  = \Cart::getContent();

        $data = [   'title'         => 'Keranjang Belanja',
                    'keywords'      => 'Keranjang Belanja',
                    'description'   => 'Keranjang Belanja',
                    'keranjang'     => $keranjang,
                    'content'       => 'keranjang/index'
                ];
        return view('layout/wrapper',$data);
    }

    // checkout
    public function checkout()
    {
        $m_site     = new Konfigurasi_model();
        $m_produk   = new Produk_model();
        $m_client   = new Client_model();

        $site       = $m_site->listing();
        $keranjang  = \Cart::getContent();
        // kode transaksi
        $kode_usaha     = 'TUBAGUS';
        $kode_random    = Str::random(4);
        $tanggal        = date('YmdHis');
        $kode_transaksi = strtoupper($kode_usaha.'-'.$kode_random.'-'.$tanggal);

        // check status login
        if(Session()->get('username_client') !='') {
            $client     = $m_client->detail(Session()->get('id_client'));
        }else{
            $client     = '';
        }
        // end status login

        $data = [   'title'         => 'Checkout',
                    'keywords'      => 'Checkout',
                    'description'   => 'Checkout',
                    'keranjang'     => $keranjang,
                    'kode_transaksi'=> $kode_transaksi,
                    'client'        => $client,
                    'content'       => 'keranjang/checkout'
                ];
        return view('layout/wrapper',$data);
    }

    // proses_checkout
    public function proses_checkout(Request $request)
    {
        $m_client = new Client_model();
        // end proteksi halaman
        if(Session()->get('username_client') !='') {
            request()->validate([
                'nama'  => 'required',
            ]);
        }else{
            request()->validate([
                'email' => 'required|unique:client',
                'nama'  => 'required',
            ]);
        }
        // UPLOAD START
        if(Session()->get('username_client') !='') {
            $check = $m_client->check(Session()->get('username_client'));
        }else{
             DB::table('client')->insert([
                    'jenis_client'  => 'Perorangan',
                    'nama'          => $request->nama,
                    'alamat'        => $request->alamat,
                    'telepon'       => $request->telepon,
                    'email'         => $request->email,
                    'password'      => sha1($request->password),
                ]);
            $check = $m_client->check($request->email);
        }
        // proses masuk header
        DB::table('header_transaksi')->insert([
                'id_client'         => $check->id_client,
                'nama_pelanggan'    => $request->nama,
                'email'             => $request->email,
                'telepon'           => $request->telepon,
                'alamat'            => $request->alamat,
                'kode_transaksi'    => $request->kode_transaksi,
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
                'jumlah_transaksi'  => \Cart::getTotal(),
                'status_bayar'      => 'Menunggu',
            ]);
        // proses masuk ke transaksi
        $keranjang  = \Cart::getContent();
        foreach($keranjang as $keranjang) { 
            $subtotal = $keranjang->price * $keranjang->quantity;
            DB::table('transaksi')->insert([
                'id_client'         => $check->id_client,
                'kode_transaksi'    => $request->kode_transaksi,
                'id_produk'         => $keranjang->id,
                'nama_produk'       => $keranjang->name,
                'harga'             => $keranjang->price,
                'jumlah'            => $keranjang->quantity,
                'total_harga'       => $subtotal,
                'tanggal_transaksi' => date('Y-m-d H:i:s')
            ]);
        }
        // setelah masuk, kosongkan keranjang
        \Cart::clear();
        // proses login dan registrasi client
        if(Session()->get('username_client') !='') {
            // do nothing, karena sudah login. Kalau belum login create session
        }else{
            // create login session
            $request->session()->put('id_client', $check->id_client);
            $request->session()->put('nama_client', $check->nama);
            $request->session()->put('username_client', $check->email);
            // end create login session
        }
        // redirect page
        session()->flash('sukses', 'Data transaksi berhasil');
        return redirect('keranjang/sukses/'.$request->kode_transaksi);
    }

    // sukses
    public function sukses($kode_transaksi)
    {
        $m_header_transaksi     = new Header_transaksi_model();
        $m_transaksi            = new Transaksi_model();
        $m_client               = new Client_model();
        
        $header_transaksi       = $m_header_transaksi->kode_transaksi($kode_transaksi);
        $transaksi              = $m_transaksi->kode_transaksi($kode_transaksi);
        $client                 = $m_client->detail($header_transaksi->id_client);

        $data = [   'title'                 => 'Transaksi Berhasil',
                    'keywords'              => 'Transaksi Berhasil',
                    'description'           => 'Transaksi Berhasil',
                    'header_transaksi'      => $header_transaksi,
                    'transaksi'             => $transaksi,
                    'client'                => $client,
                    'content'               => 'keranjang/sukses'
                ];
        return view('layout/wrapper',$data);
    }

    // kosongkan
    public function kosongkan()
    {
        \Cart::clear();
        session()->flash('sukses', 'Data keranjang telah dikosongkan');
        return redirect('keranjang');
    }

    // update
    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('sukses', 'Jumlah telah diupdate');
        return redirect('keranjang');
    }

}
