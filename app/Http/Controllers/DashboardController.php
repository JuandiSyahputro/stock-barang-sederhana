<?php

namespace App\Http\Controllers;

use App\Models\Stock_barang;
use Illuminate\Routing\Controller;
use App\Exports\Stock_barangExport;
use App\Models\Outlet;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class DashboardController extends Controller
{
    public function index() {
        $stock_barang = Stock_barang::where('user_id', auth()->user()->id)->paginate(5);

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'stocks' => $stock_barang
        ]);
    }

    public function stock_barangexport() {
        return Excel::download(new Stock_barangExport,'stock-barang.xlsx');
    }
    
    public function exportpdf(){
        $data = Stock_barang::all();
        view()->share('data',$data);
        $pdf = PDF::loadView('dashboard.datastock-pdf');
        return $pdf->download('Stock Barang.pdf');
    }
    
}
