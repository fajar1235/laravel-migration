<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
       //dd($request->all()); 
       $request->validate([
        'nama_lengkap' => 'required|unique:pertanyaan|max:255',
        'isi' => 'required|unique:pertanyaan|max:255'
    ]);
       $query= DB::table('pertanyaan')->insert([
           "nama_lengkap" => $request["nama_lengkap"],
           "isi" => $request["isi"]
       ]);
       return redirect('/pertanyaan')->with('success', 'pertanyaan berhasil di kirim');
    }

    public function index() {
        $pertanyaan = DB::table('pertanyaan')->get();
        //dd($pertanyaan);
        return view('posts.index', compact('pertanyaan'));
    }

    public function show($id) {
        $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();
        //dd($pertanyaan);
        return view('posts.show', compact('pertanyaan'));
    }

    public function edit($id) {
        $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();

        return view('posts.edit', compact('pertanyaan'));
    }

    public function update($id, Request $request) {
        $query = DB::table('pertanyaan')        
                -> where('id', $id)
                -> update([
                    'nama_lengkap' => $request['nama_lengkap'],
                    'isi' => $request['isi']
                ]);
                return redirect('/pertanyaan')->with('success','Berhasil update pertanyaan');    
    }   

    public function destroy($id) {
        $query = DB::table('pertanyaan')
                -> where('id', $id)
                -> delete();
                return redirect('/pertanyaan')->with('success', 'Peratanyaan berhasil dihapus');
    }
}
