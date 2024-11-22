<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\barang;  

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the fo)
     * creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'type' => 'required|in:Makanan,Minuman',
        //     'harga' => 'required|numeric|min:0',
        //     'stock' => 'required|integer|min:0',
        // ]);
    
        // Simpan data ke database
        Barang::create([
            'name' => $request->nama,
            'type' => $request->type,
            'harga' => $request->harga,
            'stock' => $request->stock,
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Pembelian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang=Barang::where('id', $id)->delete();  
        if ($barang){
            return redirect()->back()->with('success', 'Pembelian berhasil dihapus!');
        }else{
            return redirect()->back()->with('failed', 'Gagal menghapus data!');
        }
        
    }
}