<?php

namespace App\Http\Controllers;

use App\Models\Jenistugas;
use Illuminate\Http\Request;

class JenistugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenistugas = Jenistugas::latest()->paginate(5);

        return view('jenistugas.index', compact('jenistugas'))
            ->with('i', (request()->input('page', 1) - 1) *5 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenistugas.create');
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
            'tipetugas' => 'required'
        ]);

        Jenistugas::create($request->all());

        return redirect()->route('jenistugas.index')
            ->with('success', 'Berhasil Menyimpan !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenistugas  $jenistugas
     * @return \Illuminate\Http\Response
     */
    public function show(Jenistugas $jenistugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenistugas  $jenistugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenistugas $jenistuga)
    {
        return view('jenistugas.edit',compact('jenistuga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenistugas  $jenistugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenistugas $jenistuga)
    {
        $request->validate([
            'tipetugas' => 'required'
        ]);

        $jenistuga -> update($request->all());

        return redirect()->route('jenistugas.index')
            ->with ('success', 'Berhasil Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenistugas  $jenistugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenistugas $jenistuga)
    {
        $jenistuga->delete();
        // $jenistuga::destroy($jenistuga->id);

        return redirect()->route('jenistugas.index')
            ->with('success', 'Berhasil Delete!!');
    }
}
