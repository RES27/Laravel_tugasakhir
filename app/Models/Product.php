<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'product';
    public $fillable = ['user_id','profil_id','Nama', 'Harga', 'stock', 'Berat', 'Gambar', 'Kondisi', 'Deskripsi'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
