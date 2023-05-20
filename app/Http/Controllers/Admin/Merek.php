<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;// Load bawaan fungsi DB laravel
use App\Models\Merek_model; // Manggil model yg dibuat
use Illuminate\Support\Str;
use Image;

class Merek extends Controller
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
        $m_merek     = new Merek_model();
        $merek       = $m_merek->listing();

        $data = [   'title'     => 'Merek ',
                    'merek'      => $merek,
                    'content'   => 'admin/merek/index'
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
                    'content'   => 'admin/merek/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_merek)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        $m_merek     = new Merek_model();
        $merek       = $m_merek->detail($id_merek);

        $data = [   'title'     => 'Edit ',
                    'merek'      => $merek,
                    'content'   => 'admin/merek/edit'
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
            'nama_merek'    => 'required|unique:merek',
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
            DB::table('merek')->insert([
                'id_user'       => Session()->get('id_user'),
                'nama_merek'    => $request->nama_merek,
                'slug_merek'    => Str::slug($request->nama_merek, '-'),
                'keterangan'    => $request->keterangan,
                'urutan'        => $request->urutan,
                'gambar'        => $input['gambar']
            ]);
        }else{
            DB::table('merek')->insert([
                'id_user'       => Session()->get('id_user'),
                'nama_merek'    => $request->nama_merek,
                'slug_merek'    => Str::slug($request->nama_merek, '-'),
                'keterangan'    => $request->keterangan,
                'urutan'        => $request->urutan,
            ]);
        }
        return redirect('admin/merek')->with(['sukses' => 'Data telah ditambah']);
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
            'nama_merek'    => 'required',
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
            DB::table('merek')->where('id_merek',$request->id_merek)->update([
                'id_user'       => Session()->get('id_user'),
                'nama_merek'    => $request->nama_merek,
                'slug_merek'    => Str::slug($request->nama_merek, '-'),
                'keterangan'    => $request->keterangan,
                'urutan'        => $request->urutan,
                'gambar'        => $input['gambar']
            ]);
        }else{
            DB::table('merek')->where('id_merek',$request->id_merek)->update([
                'id_user'       => Session()->get('id_user'),
                'nama_merek'    => $request->nama_merek,
                'slug_merek'    => Str::slug($request->nama_merek, '-'),
                'keterangan'    => $request->keterangan,
                'urutan'        => $request->urutan,
            ]);
        }
        return redirect('admin/merek')->with(['sukses' => 'Data telah ditambah']);
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
        $id_merek    = $request->id_merek;
        // check klo belum milih data
        if(empty($id_merek)) {
            return redirect('admin/merek')->with(['warning' => 'Anda belum memilih merek']);
        }
        // proses
        if(isset($_POST['hapus'])) {
            // proses hapus merek
            for($i=0; $i < sizeof($id_merek);$i++) {
                DB::table('merek')->where('id_merek',$id_merek[$i])->delete();
            }
            return redirect('admin/merek')->with(['sukses' => 'Data telah dihapus']);
        }elseif(isset($_POST['update'])) {
            // proses update akses level merek
            for($i=0; $i < sizeof($id_merek);$i++) {
                DB::table('merek')->where('id_merek',$id_merek[$i])->update([
                    'akses_level'   => $request->akses_level
                ]);
            }
            return redirect('admin/merek')->with(['sukses' => 'Data telah diupdate']);
        }
        // end proses
    }

    // delele
    public function delete($id_merek)
    {
        // proteksi halaman
        if(Session()->get('username')=="") { 
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        // end proteksi halaman
        DB::table('merek')->where('id_merek',$id_merek)->delete();
        return redirect('admin/merek')->with(['sukses' => 'Data merek telah dihapus']);
    }
}
