<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pencarian = $request->pencarian;
        $jumlahBaris = 2;
        if(strlen($pencarian)){
            $data = pengguna::where('name','like',"%$pencarian%")
                    ->orWhere('email','like',"%$pencarian%")
                    ->orWhere('role','like',"%$pencarian%")
                    ->paginate($jumlahBaris);
        } else {
            $data = pengguna::orderBy('name', 'desc')->paginate($jumlahBaris);
        }
        return view('pengguna.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('role', $request->role);

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role,
        ];

        $data['password'] = bcrypt($data['password']);

        pengguna::create($data);
        return redirect()->to('user/pengguna')->with('success','Berhasil Menambahkan Data.');
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
        $data = pengguna::where('name', $id)->first();
        return view('pengguna.edit')->with('data', $data);
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
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        $data = [
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role,
        ];
        Pengguna::where('name', $id)->update($data);
        return redirect()->to('user/pengguna')->with('success','Berhasil Melakukan Update Data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengguna::where('name', $id)->delete();
        return redirect()->to('user/pengguna')->with('success', 'Berhasil Menghapus Data');
    }
}
