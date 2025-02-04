<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReport extends Model
{
    use HasFactory;
    

    protected $table = 'sales'; // Sesuaikan dengan tabel yang menyimpan data penjualan

    protected $fillable = ['date', 'total_sales'];
    
}
