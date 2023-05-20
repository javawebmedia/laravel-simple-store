<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;// Load bawaan fungsi DB laravel
use App\Models\Produk_model; // Manggil model yg dibuat
use App\Models\Merek_model; // Manggil model yg dibuat
use App\Models\Kategori_model; // Manggil model yg dibuat
use Illuminate\Support\Str;
use Image;
use PDF;

class Produk extends Controller
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
        $m_produk       = new Produk_model();
        $m_kategori     = new Kategori_model();
        $produk         = $m_produk->listing();
        $kategori       = $m_kategori->listing();

        $data = [   'title'     => 'Produk ',
                    'produk'    => $produk,
                    'kategori'  => $kategori,
                    'content'   => 'admin/produk/index'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // unduh
    public function unduh()
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_produk       = new Produk_model();
        $m_kategori     = new Kategori_model();
        $produk         = $m_produk->listing();
        $kategori       = $m_kategori->listing();

        $data = [   'title'     => 'Pricelist produk tanggal '.date('d-m-Y'),
                    'produk'    => $produk,
                    'kategori'  => $kategori,
                    // 'content'   => 'admin/produk/index'
                ];
        // return view('admin/layout/wrapper',$data);
        $config = [
            'format' => 'A4-P', 
                  ];
        $pdf        = PDF::loadview('admin/produk/unduh', $data,[] ,$config);
        $nama_file  = 'Pricelist produk tanggal '.date('d-m-Y').'.pdf';
        // langsung download
        // return $pdf->download($nama_file, 'D');
        // preview
        return $pdf->stream($nama_file);
    }

    // status_produk
    public function status_produk($status_produk)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_produk       = new Produk_model();
        $m_kategori     = new Kategori_model();
        $produk         = $m_produk->status_produk($status_produk);
        $kategori       = $m_kategori->listing();

        $data = [   'title'     => 'Produk dengan status: '.$status_produk,
                    'produk'    => $produk,
                    'kategori'  => $kategori,
                    'content'   => 'admin/produk/index'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // kategori
    public function kategori($id_kategori)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_produk       = new Produk_model();
        $m_kategori     = new Kategori_model();
        $produk         = $m_produk->kategori($id_kategori);
        $kategori       = $m_kategori->listing();
        $kategori_detail= $m_kategori->detail($id_kategori);

        $data = [   'title'     => 'Kategori Produk: '.$kategori_detail->nama_kategori,
                    'produk'    => $produk,
                    'kategori'  => $kategori,
                    'content'   => 'admin/produk/index'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah()
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_merek    = new Merek_model();
        $m_kategori = new Kategori_model();

        $data = [   'title'     => 'Tambah ',
                    'merek'     => $m_merek->listing(),
                    'kategori'  => $m_kategori->listing(),
                    'content'   => 'admin/produk/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_produk)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_produk   = new Produk_model();
        $m_merek    = new Merek_model();
        $m_kategori = new Kategori_model();
        $produk     = $m_produk->detail($id_produk);
        $merek      = $m_merek->listing();
        $kategori   = $m_kategori->listing();

        $data = [   'title'     => 'Edit Produk',
                    'produk'    => $produk,
                    'merek'     => $merek,
                    'kategori'  => $kategori,
                    'content'   => 'admin/produk/edit'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // cetak
    public function cetak($id_produk)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_produk   = new Produk_model();
        $m_merek    = new Merek_model();
        $m_kategori = new Kategori_model();
        $produk     = $m_produk->detail($id_produk);
        $merek      = $m_merek->listing();
        $kategori   = $m_kategori->listing();

        $data = [   'title'     => $produk->nama_produk,
                    'produk'    => $produk,
                    'merek'     => $merek,
                    'kategori'  => $kategori
                ];
        // return view('admin/produk/cetak',$data);
        $config = [
            'format' => 'A4-P', 
                  ];
        $pdf        = PDF::loadview('admin/produk/cetak', $data,[] ,$config);
        $nama_file  = $produk->nama_produk.'.pdf';
        // langsung download
        // return $pdf->download($nama_file, 'D');
        // preview
        return $pdf->stream($nama_file);
    }

    // proses_tambah
    public function proses_tambah(Request $request)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        request()->validate([
            'nama_produk'    => 'required|unique:produk',
            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                          = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension      = $request->file('gambar')->getClientOriginalName();
            $filename                   = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['gambar']            = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath            = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'greyscale' => false
            ));
            $img->save($destinationPath.'/'.$input['gambar']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['gambar']);
        // END UPLOAD
            DB::table('produk')->insert([
                'id_user'           => Session()->get('id_user'),
                'id_kategori'       => $request->id_kategori,
                'id_merek'          => $request->id_merek,
                'slug_produk'       => Str::slug($request->nama_produk, '-'),
                'kode_produk'       => $request->kode_produk,
                'nama_produk'       => $request->nama_produk,
                'status_produk'     => $request->status_produk,
                'jenis_produk'      => $request->jenis_produk,
                'urutan'            => $request->urutan,
                'deskripsi'         => $request->deskripsi,
                'isi'               => $request->isi,
                'gambar'            => $input['gambar'],
                'keywords'          => $request->keywords,
                'harga'             => $request->harga,
                'harga_diskon'      => $request->harga_diskon,
                'tanggal_mulai'     => date('Y-m-d',strtotime($request->tanggal_mulai)),
                'tanggal_selesai'   => date('Y-m-d',strtotime($request->tanggal_selesai)),
                'tanggal_post'      => date('Y-m-d H:i:s')  
            ]);
        }else{
            DB::table('produk')->insert([
                'id_user'           => Session()->get('id_user'),
                'id_kategori'       => $request->id_kategori,
                'id_merek'          => $request->id_merek,
                'slug_produk'       => Str::slug($request->nama_produk, '-'),
                'kode_produk'       => $request->kode_produk,
                'nama_produk'       => $request->nama_produk,
                'status_produk'     => $request->status_produk,
                'jenis_produk'      => $request->jenis_produk,
                'urutan'            => $request->urutan,
                'deskripsi'         => $request->deskripsi,
                'isi'               => $request->isi,
                // 'gambar'            => $input['gambar'],
                'keywords'          => $request->keywords,
                'harga'             => $request->harga,
                'harga_diskon'      => $request->harga_diskon,
                'tanggal_mulai'     => date('Y-m-d',strtotime($request->tanggal_mulai)),
                'tanggal_selesai'   => date('Y-m-d',strtotime($request->tanggal_selesai)),
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // proses_edit
    public function proses_edit(Request $request)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        request()->validate([
            'nama_produk'    => 'required',
            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                          = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension      = $request->file('gambar')->getClientOriginalName();
            $filename                   = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['gambar']            = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath            = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'greyscale' => false
            ));
            $img->save($destinationPath.'/'.$input['gambar']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['gambar']);
        // END UPLOAD
            DB::table('produk')->where('id_produk',$request->id_produk)->update([
                'id_user'           => Session()->get('id_user'),
                'id_kategori'       => $request->id_kategori,
                'id_merek'          => $request->id_merek,
                'slug_produk'       => Str::slug($request->nama_produk, '-'),
                'kode_produk'       => $request->kode_produk,
                'nama_produk'       => $request->nama_produk,
                'status_produk'     => $request->status_produk,
                'jenis_produk'      => $request->jenis_produk,
                'urutan'            => $request->urutan,
                'deskripsi'         => $request->deskripsi,
                'isi'               => $request->isi,
                'gambar'            => $input['gambar'],
                'keywords'          => $request->keywords,
                'harga'             => $request->harga,
                'harga_diskon'      => $request->harga_diskon,
                'tanggal_mulai'     => date('Y-m-d',strtotime($request->tanggal_mulai)),
                'tanggal_selesai'   => date('Y-m-d',strtotime($request->tanggal_selesai)),
            ]);
        }else{
            DB::table('produk')->where('id_produk',$request->id_produk)->update([
                'id_user'           => Session()->get('id_user'),
                'id_kategori'       => $request->id_kategori,
                'id_merek'          => $request->id_merek,
                'slug_produk'       => Str::slug($request->nama_produk, '-'),
                'kode_produk'       => $request->kode_produk,
                'nama_produk'       => $request->nama_produk,
                'status_produk'     => $request->status_produk,
                'jenis_produk'      => $request->jenis_produk,
                'urutan'            => $request->urutan,
                'deskripsi'         => $request->deskripsi,
                'isi'               => $request->isi,
                // 'gambar'            => $input['gambar'],
                'keywords'          => $request->keywords,
                'harga'             => $request->harga,
                'harga_diskon'      => $request->harga_diskon,
                'tanggal_mulai'     => date('Y-m-d',strtotime($request->tanggal_mulai)),
                'tanggal_selesai'   => date('Y-m-d',strtotime($request->tanggal_selesai)),
            ]);
        }
        return redirect('admin/produk')->with(['sukses' => 'Data telah ditambah']);
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
        $id_produk    = $request->id_produk;
        // check klo belum milih data
        if(empty($id_produk)) {
            return redirect('admin/produk')->with(['warning' => 'Anda belum memilih produk']);
        }
        // proses
        if(isset($_POST['hapus'])) {
            // proses hapus produk
            for($i=0; $i < sizeof($id_produk);$i++) {
                DB::table('produk')->where('id_produk',$id_produk[$i])->delete();
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah dihapus']);
        }elseif(isset($_POST['update'])) {
            // proses update akses level produk
            for($i=0; $i < sizeof($id_produk);$i++) {
                DB::table('produk')->where('id_produk',$id_produk[$i])->update([
                    'id_kategori'   => $request->id_kategori
                ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diupdate']);
        }elseif(isset($_POST['draft'])) {
            // proses update akses level produk
            for($i=0; $i < sizeof($id_produk);$i++) {
                DB::table('produk')->where('id_produk',$id_produk[$i])->update([
                    'status_produk'   => 'Draft'
                ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diupdate']);
        }elseif(isset($_POST['publish'])) {
            // proses update akses level produk
            for($i=0; $i < sizeof($id_produk);$i++) {
                DB::table('produk')->where('id_produk',$id_produk[$i])->update([
                    'status_produk'   => 'Publish'
                ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diupdate']);
        }
        // end proses
    }

    // delele
    public function delete($id_produk)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        DB::table('produk')->where('id_produk',$id_produk)->delete();
        return redirect('admin/produk')->with(['sukses' => 'Data produk telah dihapus']);
    }
}
