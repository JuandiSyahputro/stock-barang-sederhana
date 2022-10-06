<?php

namespace App\Models;

use App\Models\Stock_barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;
    protected $table = "outlets";
    protected $primaryKey = "id";
    protected $fillable = [ 
        'user_id', 'nama_outlet', 'lok_outlet'
    ];

    public function stock_barang() {
        return $this->hasMany(Stock_barang::class);
    }
}
