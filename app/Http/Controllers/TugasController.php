<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Jenistugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::latest()->paginate(5);

        return view('tugas.index',compact('tugas'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $jenistugas = Jenistugas::all(); 
        return view('tugas.create',compact('jenistugas', $jenistugas));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namatugas'=>'required',
            'tipetugas'=>'required',
            'keterangan'=>'required',
            'deadline'=>'required'
        ]);

        Tugas::create($request->all());
        return redirect()->route('tugas.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        $jenistugas = Jenistugas::all();
        return view('tugas.edit', compact('tugas', 'jenistugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tuga)
    {
        $request->validate([
            'namatugas'=>'required',
            'jenistugas'=>'required',
            'keterangan'=>'required',
            'deadline'=>'required'
        ]);

        Tugas::update($request->all());
        return redirect()->route('tugas.index')
                        ->with('success','Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tuga)
    {
        $tuga->delete();

        return redirect()->route('tugas.index')
                        ->with('success','Selamat karna sudah menyelesaikan Tugas <3');
    }
}