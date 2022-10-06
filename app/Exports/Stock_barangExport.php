<?php

namespace App\Exports;

use App\Models\Stock_barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class Stock_barangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Stock_barang::all();
    }
}
