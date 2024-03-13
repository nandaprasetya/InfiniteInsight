<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $table = 'kategoribuku';

    public function buku(){
        return $this->belongsToMany(Buku::class, 'buku_relasi');
    }
}
