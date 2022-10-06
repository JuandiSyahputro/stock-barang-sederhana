<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_barang extends Model
{
    use HasFactory;
    protected $table = "stock_barangs";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id', 'nama_barang', 'qty', 'tgl_masuk', 'tgl_keluar'
    ];

    public function outlet() {
        return $this->BelongsTo(Outlet::class);
    }
}
