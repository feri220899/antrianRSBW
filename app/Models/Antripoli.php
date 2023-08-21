<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antripoli extends Model
{
    use HasFactory;
    protected $table = "antripoli";
    public $timestamps = false;
    protected $fillable = [
        'kd_dokter',
        'kd_poli',
        'status',
        'no_rawat'
    ];

}
