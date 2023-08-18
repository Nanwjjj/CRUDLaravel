<?php

namespace App\Http\Controllers;

use App\Models\mentee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class menteeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = mentee::where('nim','like',"%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%")
            ->orWhere('prodi','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = mentee::orderBy('nim','desc')->paginate($jumlahbaris);
        }
        return view('mentee.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('mentee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Session::flash('nim',$request->nim);
        Session::flash('nama',$request->nama);
        Session::flash('prodi',$request->prodi);

        $request->validate([
            'nim'=>'required|numeric|unique:mentee,nim',
            'nama'=>'required',
            'prodi'=>'required',
        ], [
            'nim.required'=>'NIM harus diisi!',
            'nim.numeric'=>'NIM harus brupa angka!',
            'nim.unique'=>'NIM sudah ada!',
            'nama.required'=>'Nama harus diisi!',
            'prodi.required'=>'Prodi harus diisi!',
        ]);
        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
        ];
        mentee::create($data);
        return redirect()->to('mentee')->with('success', 'Berhasil menambahkan data baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Query builder
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mentee::where('nim',$id)->first();
        return view('mentee.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'prodi'=>'required',
        ], [
            'nama.required'=>'Nama harus diisi!',
            'prodi.required'=>'Prodi harus diisi!',
        ]);
        $data = [
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
        ];
        mentee::where('nim',$id)->update($data);
        return redirect()->to('mentee')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mentee::where('nim', $id)->delete();
        return redirect()->to('mentee')->with('success','Berhasil melakukan delete data');
    }
}
