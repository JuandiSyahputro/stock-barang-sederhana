<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Stock_barang;
use Illuminate\Http\Request;

class DashboardStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_barang = Stock_barang::where('user_id', auth()->user()->id)->paginate(5);
        return view('tables.index', [
            'title' => 'Tables',
            'stocks' => $stock_barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.createData.index', [
            'title' => 'Tables | Create',
            'stocks' => Stock_barang::where('user_id', auth()->user()->id)->paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'nama_barang' => 'required',
            'qty' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => ''
        ]);
        Stock_barang::create($data);
        // dd($data);
        return redirect('/dashboard/tables')->with('success', 'Data added successfully');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock_barang  $stock_barangs
     * @return \Illuminate\Http\Response
     */
    public function show(Stock_barang $stock_barangs)
    {
        return view('tables.index', [
            'stocks' => Stock_barang::find($stock_barangs)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tables.edit.index', [
            'title' => 'Tables | Edit',
            'table' => Stock_barang::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock_barang = Stock_barang::findOrFail($id);
        $stock_barang->nama_barang = $request->nama_barang;
        $stock_barang->qty = $request->qty;
        $stock_barang->tgl_masuk = $request->tgl_masuk;
        $stock_barang->tgl_keluar = $request->tgl_keluar;

        $stock_barang->save();

        return redirect('/dashboard/tables')->with('success', 'Data has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock_barang  $stock_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock_barang::destroy($id);
        return redirect('/dashboard/tables')->with('success', 'Data has been deleted');
    }

}
