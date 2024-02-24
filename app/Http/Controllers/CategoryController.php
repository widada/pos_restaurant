<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function abc(Request $request)
    {
        $pencarian = $request->pencarian;
        $jumlahBaris = 4;
        $data = Category::when($pencarian, function($query) use ($pencarian) {
                return $query->where('name','like',"%$pencarian%");
            })
            ->orderBy('id', 'desc')
            ->paginate($jumlahBaris);

        return view('Kategori.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('kategori', $request->name);

        $request->validate([
            'name'=>'required'
        ]);

        $data = [
            'name'=>$request->name,
        ];
        Category::create($data);
        return redirect()->to('user/kategori')->with('success','Berhasil Menambahkan Kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = kategori::where('id', $id)->first();
        $data = Category::find($id);
        return view('kategori.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $data = [
            'name'=>$request->name,
        ];
        Category::find($id)->update($data);
        return redirect()->to('user/kategori')->with('success','Berhasil Melakukan Update Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->to('user/kategori')->with('success', 'Berhasil Menghapus Kategori');
    }
}
