<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
        public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }


    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request){

		//dd($request->all())
		
		$data['first_name'] = $request->first_name;
		$data['last_name'] = $request->last_name;
		$data['birthday'] = $request->birthday;
		$data['gender'] = $request->gender;
		$data['email'] = $request->email;
		$data['phone'] = $request->phone;
		
		Pelanggan::create($data);
		
		return redirect()->route('pelanggan.index')->with('success','Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update($request->only([
            'first_name', 'last_name', 'birthday', 'gender', 'email', 'phone',
        ]));

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Pelanggan::findOrFail($id)->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Dihapus!');
    }
}