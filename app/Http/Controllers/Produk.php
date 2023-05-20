<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konfigurasi_model;
use App\Models\Produk_model;
use App\Models\Kategori_model;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class Produk extends Controller
{
    // index
    public function index()
    {
        $m_site     = new Konfigurasi_model();
        $m_produk   = new Produk_model();
        $site       = $m_site->listing();
        // produk
        $status_produk  = 'Publish';
        $paginate       = 12;
        $produk         = $m_produk->home($paginate,$status_produk);

        $data = [   'title'         => 'Our Products',
                    'keywords'      => 'Our Products',
                    'description'   => 'Our Products',
                    'produk'        => $produk,
                    'produks'       => $produk,
                    'content'       => 'produk/index'
                ];
        return view('layout/wrapper',$data);
    }

    // kategori
    public function kategori($slug_kategori)
    {
        $m_site         = new Konfigurasi_model();
        $m_produk       = new Produk_model();
        $m_kategori     = new Kategori_model();
        $site           = $m_site->listing();
        // produk
        $kategori       = $m_kategori->read($slug_kategori);
        $id_kategori    = $kategori->id_kategori;
        $status_produk  = 'Publish';
        $paginate       = 12;
        $produk         = $m_produk->home_kategori($paginate,$status_produk,$id_kategori);

        $data = [   'title'         => $kategori->nama_kategori,
                    'keywords'      => $kategori->nama_kategori,
                    'description'   => $kategori->nama_kategori,
                    'produk'        => $produk,
                    'produks'       => $produk,
                    'content'       => 'produk/index'
                ];
        return view('layout/wrapper',$data);
    }

    // detail
    public function detail($slug_produk)
    {
        $m_site     = new Konfigurasi_model();
        $m_produk   = new Produk_model();
        $site       = $m_site->listing();
        $produk     = $m_produk->read('Publish',$slug_produk);

        $data = [   'title'         => $produk->nama_produk,
                    'keywords'      => $produk->nama_produk,
                    'description'   => $produk->nama_produk,
                    'produk'        => $produk,
                    'content'       => 'produk/detail'
                ];
        return view('layout/wrapper',$data);
    }

    // ad
    public function add(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        $pengalihan     = $request->pengalihan;
        return redirect($pengalihan)->with(['sukses' => 'Data telah ditambah ke keranjang']);
    }

}
