<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProdukImage;
use App\Models\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemorder = Order::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Order',
                    'itemorder' => $itemorder);
        return view('order.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemproduk = Produk::orderBy('nama_produk', 'asc')->get();
        $data = array('title' => 'Form Order Baru',
                    'itemproduk' => $itemproduk);
        return view('order.create', $data);
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
            'nama' => 'required',
            'alamat' => 'required',
            'total' => 'required|numeric',
        ]);
        $inputan = $request->all();
        $itemorder = Order::create($inputan);
        return redirect()->route('order.index')->with('success', 'Data berhasil disimpan');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemorder = Order::findOrFail($id);
        $data = array('title' => 'Detail Order',
                'itemorder' => $itemorder);
        return view('order.show', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemorder = Order::where('id',$id)->first();
        $itemproduk = Produk::orderBy('nama_produk', 'asc')->get();
        $data = array('title' => 'Form Edit Order',
                'itemorder' => $itemorder,
                'itemproduk' => $itemproduk);
        return view('order.edit', $data);
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
            'nama' => 'required',
            'alamat' => 'required',
            'total' => 'required|numeric',
        ]);
        $itemorder = Order::findOrFail($id);
            $inputan = $request->all();
            $itemorder->update($inputan);
            return redirect()->route('order.index')->with('success', 'Data berhasil diupdate');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemorder = Order::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
        if ($itemorder->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }    
}
