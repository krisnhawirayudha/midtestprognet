<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // kita ambil data kategori per halaman 20 data dan (paginate(20))
        // kita urutkan yang terakhir diiput yang paling atas (orderBy)
        $itemkategori = Kategori::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Kategori Produk',
                    'itemkategori' => $itemkategori);
        return view('kategori.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Kategori');
        return view('kategori.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori'=>'required',
        ]);
        $inputan = $request->all();
        $itemkategori = Kategori::create($inputan);
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil disimpan');
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
        $itemkategori = Kategori::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
        $data = array('title' => 'Form Edit Kategori',
                    'itemkategori' => $itemkategori);
        return view('kategori.edit', $data);
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
        $this->validate($request, [
            'nama_kategori'=>'required',
        ]);
        $itemkategori = Kategori::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
            $inputan = $request->all();
            $itemkategori->update($inputan);
            return redirect()->route('kategori.index')->with('success', 'Data berhasil diupdate');
        }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemkategori = Kategori::where('id',$id)->first();
        if ($itemkategori->delete())
            {
                return back()->with('success', 'Data berhasil dihapus');
        } else {
                return back()->with('error', 'Data gagal dihapus');
            }
        }
    }
