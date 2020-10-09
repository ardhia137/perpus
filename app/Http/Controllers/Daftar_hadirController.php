<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\daftar_hadir;
use App\siswa;
use Session;
use Illuminate\Support\Facades\DB;
class Daftar_hadirController extends Controller
{
    //
    public function index(){
        return view('daftar_hadir');
    }
    public function action_dh(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'numeric' => ':attribute harus angka cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
        ];
        $this->validate($request,[
    		'nip' => 'required|numeric',
    	],$messages);
        $cek =  $request->nip;
        $cek_siswa = DB::table('siswa')->where('nip','=',$cek);
        if($cek_siswa->first() != null){
            $tgl = Carbon::today()->toDateString();
            $cek_tgl = DB::table('daftar_hadirs')->where('nip','=',$cek)->where('tanggal_masuk', $tgl);
            if ($cek_tgl->first()==null) {
                Daftar_hadir::create([
                    'nip' => $request->nip,
                    'tanggal_masuk' => $tgl,
                    ]);
                Session::flash('sukses','Ini notifikasi suksess');
		        return redirect('/');
            } else {
                Session::flash('peringatan','Ini notifikasi peringatan');
                return redirect('/');
                // echo('g');
            }
		    // return redirect('/');
        }else{
            Session::flash('gagal','Ini notifikasi gagal');
		    return redirect('/');
        }
    }
}
