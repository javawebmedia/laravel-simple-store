<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;// Load bawaan fungsi DB laravel
use App\Models\Kategori_model; // Manggil model yg dibuat
use Illuminate\Support\Str;
use Image;

class Kategori extends Controller
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
        $m_kategori     = new Kategori_model();
        $kategori       = $m_kategori->listing();

        $data = [   'title'     => 'Kategori ',
                    'kategori'      => $kategori,
                    'content'   => 'admin/kategori/index'
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
        $data = [   'title'     => 'Tambah ',
                    'content'   => 'admin/kategori/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_kategori)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_kategori     = new Kategori_model();
        $kategori       = $m_kategori->detail($id_kategori);

        $data = [   'title'     => 'Edit ',
                    'kategori'      => $kategori,
                    'content'   => 'admin/kategori/edit'
                ];
        return view('admin/layout/wrapper',$data);
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
            'nama_kategori'    => 'required|unique:kategori',
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
            DB::table('kategori')->insert([
                'id_user'           => Session()->get('id_user'),
                'nama_kategori'     => $request->nama_kategori,
                'slug_kategori'     => Str::slug($request->nama_kategori, '-'),
                'keterangan'        => $request->keterangan,
                'status_kategori'   => $request->status_kategori,
                'urutan'            => $request->urutan,
                'gambar'            => $input['gambar'],
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            DB::table('kategori')->insert([
                'id_user'           => Session()->get('id_user'),
                'nama_kategori'     => $request->nama_kategori,
                'slug_kategori'     => Str::slug($request->nama_kategori, '-'),
                'keterangan'        => $request->keterangan,
                'status_kategori'   => $request->status_kategori,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/kategori')->with(['sukses' => 'Data telah ditambah']);
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
            'nama_kategori'    => 'required',
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
            DB::table('kategori')->where('id_kategori',$request->id_kategori)->update([
                'id_user'       => Session()->get('id_user'),
                'nama_kategori'    => $request->nama_kategori,
                'slug_kategori'    => Str::slug($request->nama_kategori, '-'),
                'keterangan'    => $request->keterangan,
                'status_kategori'   => $request->status_kategori,
                'urutan'        => $request->urutan,
                'gambar'        => $input['gambar'],
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            DB::table('kategori')->where('id_kategori',$request->id_kategori)->update([
                'id_user'       => Session()->get('id_user'),
                'nama_kategori'    => $request->nama_kategori,
                'slug_kategori'    => Str::slug($request->nama_kategori, '-'),
                'keterangan'    => $request->keterangan,
                'status_kategori'   => $request->status_kategori,
                'urutan'        => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/kategori')->with(['sukses' => 'Data telah ditambah']);
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
        $id_kategori    = $request->id_kategori;
        // check klo belum milih data
        if(empty($id_kategori)) {
            return redirect('admin/kategori')->with(['warning' => 'Anda belum memilih kategori']);
        }
        // proses
        if(isset($_POST['hapus'])) {
            // proses hapus kategori
            for($i=0; $i < sizeof($id_kategori);$i++) {
                DB::table('kategori')->where('id_kategori',$id_kategori[$i])->delete();
            }
            return redirect('admin/kategori')->with(['sukses' => 'Data telah dihapus']);
        }elseif(isset($_POST['update'])) {
            // proses update akses level kategori
            for($i=0; $i < sizeof($id_kategori);$i++) {
                DB::table('kategori')->where('id_kategori',$id_kategori[$i])->update([
                    'status_kategori'   => $request->status_kategori
                ]);
            }
            return redirect('admin/kategori')->with(['sukses' => 'Data telah diupdate']);
        }
        // end proses
    }

    // delele
    public function delete($id_kategori)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        DB::table('kategori')->where('id_kategori',$id_kategori)->delete();
        return redirect('admin/kategori')->with(['sukses' => 'Data kategori telah dihapus']);
    }
}
