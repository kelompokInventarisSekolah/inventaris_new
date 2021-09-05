<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisBarang extends Model
{
    use HasFactory;
    public $table = "inventaris_barangs";

    protected $fillable = ['ruang_id','barang_id','spesifikasi','jumlah','kondisi_baik','kondisi_rusak_ringan','kondisi_rusak_berat','keterangan'];
}
